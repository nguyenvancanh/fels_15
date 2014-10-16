<?php
class WordsController extends AppController {

	public function word() {
		$words = $this->Word->find('all', array('oder' => 'id desc'));
		$this->set('words', $words);
	}

	public function add_words() {
		$actionHeading = __("Add a new Word");
		$actionSlogan = __("Please fill in all fieds");
		$this->set(compact('actionheading', 'actionSlogan'));
		if (!empty($this->data)) {
			$this->Word->create();
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash(__('The Word has been saved', TRUE));
				$this->redirect('word');
			} else {
				$this->Session->setFlash(__('The Word could not be saved. Please try again', TRUE));
			}
		}
	}

	public function edit_words($id = null) {
		$actionHeading = __("Edit a Word");
		$actionSogan = __("Please input all fill");
		$this->set(compact('actionHeading', 'actionSogan'));
		if ($id && empty($this->data)) {
			$this->Session->setFlash(__("Invalid Edit"));
		}
		if (!empty($this->data)) {
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash(__('The Word has been saved'));
				$this->redirect(array('action' => 'word'));
			} else {
				$this->Session->setFlash(__('The Word could not saved'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Word->read(null, $id);
		}
	}

	public function delete_words($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Word->id = $id;
		if (!$this->Word->exists()) {
			throw new NotFoundException(__('Invalid Word'));
		}
		if ($this->Word->delete()) {
			$this->Session->setFlash(__('Word was deleted'));
			$this->redirect(array('action' => 'word'));
		} else {
			$this->Session->setFlash(__('Word was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}
}