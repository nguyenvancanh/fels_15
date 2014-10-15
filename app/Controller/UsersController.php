<?php
class UsersController extends AppController {
	public $use = array('User');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register', 'login', 'logout');
	}

	public function index() {
		$users = $this->User->find('all', array('oder' => 'id desc'));
		$this->set('users', $users);
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('invalid username or password! try again'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Registration successful'));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				unset($this->request->data['User']['password']);
				unset($this->request->data['User']['password_confirm']);
			}
		}
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