<?php
class LessonsController extends AppController {
	public $uses = array('Word', 'Answer', 'Result');

	public function user_view($id = null) {
		$words = $this->Word->findAllByCategoryId($id);
		$answers = $this->Answer->find('all', array('order' => 'id desc'));
		if (isset($words) && is_array($words) && !empty($words) && isset($answers) && is_array($answers) && !empty($answers)) {
			$this->set(compact('words', 'answers'));
		}
		if ($this->request->is('post')) {
			$wordIds = $this->request->data['word_ids'];
			$choose = $this->request->data['choose'];
			$userId = $this->Auth->user('id');
			if (!empty($wordIds) && !empty($answers)){
				foreach ($wordIds as $wordId) {
					foreach ($answers as $answer) {
						if ($wordId == $answer['Answer']['word_id']) {
							$this->Result->create();
							if ($choose[$wordId][0] == $answer['Answer']['answer_correct'] ) {
								$this->Result->saveAll(array('user_id' => $userId, 'word_id' => $wordId, 'answer' => 1));
							} else {
								$this->Result->saveAll(array('user_id' => $userId, 'word_id' => $wordId, 'answer' => 0));
							}
						}
						$word = array(
							'Word' => array(
								'id' => $wordId,
								'status' => 1
							)
						);
						$this->Word->create();
						$this->Word->save($word);
					}
				}
			}
		}
	}
}