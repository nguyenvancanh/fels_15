<?php
class PostsController extends AppController {
	public $uses = array('User');

	public function index() {
		$posts = $this->User->find('all', array('oder' => 'id desc'));
		$this->set('posts', $posts);
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User delete'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('User was not delete'));
			$this->redirect(array('action' => 'index'));
		}
	}
}