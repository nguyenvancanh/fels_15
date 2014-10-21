<?php
class CategoriesController extends AppController {

	public function index() {
		$catogories = $this->Category->find('all', array('order' => 'id desc'));
		$this->set('catogories', $catogories);
	}

	public function add() {
		$actionHeading = __("Add a new Category");
		$actionSlogan = __("Please fill in all fields");
		$this->set(compact('actionheading', 'actionSlogan'));
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The Category has been saved', TRUE));
				$this->redirect('index');
			} else {
				$this->Session->setFlash(__('The Category could not be saved. Please try again', TRUE));
			}
		}
	}

	public function edit($id = null) {
		$actionHeading = __("Edit a Category");
		$actionSogan = __("Please input all fields");
		$this->set(compact('actionHeading', 'actionSogan'));
		if ($id && empty($this->data)) {
			$this->Session->setFlash(__("Invalid Category"));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The Category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Category could not saved'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid Category'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category was deleted'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('Category was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}
}