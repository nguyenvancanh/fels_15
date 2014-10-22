<?php
class WordsController extends AppController {
	
	public function index() {
		$words = $this->Word->find('all', array('order' => 'id desc'));
		$this->set('words', $words);
	}

	public function add() {
		$actionHeading = __("Add a new Word");
		$actionSlogan = __("Please fill in all fields");
		$this->set(compact('actionheading', 'actionSlogan'));
		if (!empty($this->data)) {
			$this->Word->create();
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash(__('The Word has been saved', TRUE));
				$this->redirect('index');
			} else {
				$this->Session->setFlash(__('The Word could not be saved. Please try again', TRUE));
			}
		}
	}

	public function edit($id = null) {
		$actionHeading = __("Edit a Word");
		$actionSogan = __("Please input all fields");
		$this->set(compact('actionHeading', 'actionSogan'));
		if ($id && empty($this->data)) {
			$this->Session->setFlash(__("Invalid Edit"));
		}
		if (!empty($this->data)) {
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash(__('The Word has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Word could not saved'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Word->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Word->id = $id;
		if (!$this->Word->exists()) {
			throw new NotFoundException(__('Invalid Word'));
		}
		if ($this->Word->delete()) {
			$this->Session->setFlash(__('Word  was deleted'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('Word was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}

	public function user_view() {
		$options = $this->Word->getRadiobox();
		$categories = $this->Category->find('list');
		$this->set(compact('categories', 'options'));
		if ($this->request->is('post')) {
			$category_id = $this->request->data['Word']['category_id'];
			$chose = $this->request->data['Word']['Chose'];
			$words = $this->Word->checkandFilter($category_id, $chose);
			if ($words) {
				$this->set('words', $words);
			} else {
				$this->Session->setFlash(__('Please chose category and filter conditions'));
			}	
		}
	}
}