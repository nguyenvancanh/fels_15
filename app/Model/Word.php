<?php
App::uses('AppModel', 'Model');

class Word extends AppModel {
	public $name = "Word";

	public $validate = array(
		'enlish' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter a English Word'
			)
		),
		'vietnamese' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Vietnamese of this Word'
			)
		),
		'category_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter id for category'
			)
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		)
	);

	public function getRadiobox() {
		return $options = array(
			1 => 'Learned',
			2 => 'Unlearned',
			3 => 'All'
		);
	}

	public function checkandFilter($category_id, $choose) {
		if (!empty($category) && !empty($choose)) {
			$conditions['Word.category_id'] = $category_id;
			switch ($choose) {
				case 1:
					$conditions['Word.status'] = 1;
					break;
				case 2:
					$conditions['Word.status'] = 0;
					break;
				case 3:
					break;
				default:
					break;
			}
			return ($this->find('all', array('conditions' => $conditions)));
		}
		return FALSE;
	}
}