<?php
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register', 'login', 'logout');
	}

	public function index() {
		$users = $this->User->find('all', array('order' => 'id desc'));
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
		if ($this->Auth->user('is_admin') && ($this->Auth->user('id') != $id)) {
			if ($this->User->delete()) {
				$this->Session->setFlash(__('User was deleted'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('User was not deleted'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->Session->setFlash(__('Only admin can delete'));
			$this->redirect(array('action' => 'index'));
		} 
	}

	public function edit_profile($id = null) {
		$actionHeading = __("Edit profile");
		$actionSogan = __("Please input all fields");
		$this->set(compact('actionHeading', 'actionSogan'));
		if ($id && empty($this->data)) {
			$this->Session->setFlash(__("Invalid Edit"));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The Profile has been saved'));
				$this->redirect(
						array(
							'controller' => 'homes',
							'action' => 'index'
						)
				);
			} else {
				$this->Session->setFlash(__('The Profile could not saved'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	public function change_password() {
		if ($this->request->is('post')) {
			$id = $this->Session->read('User.userid');
			$old_pass = $this->request->data['User']['old_password'];
			$check = $this->User->checkPass($id, $old_pass);
			$this->User->set($this->request->data);
			if ($check) {
				if ($this->User->validates()) {
					$this->User->saveField('password', $this->request->data['User']['confirm_password']);
					if ($this->User->save($this->request->data, false)) {
						$this->Session->setFlash(__('Change password successful'));
						$this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}
				} else {
					$this->Session->setFlash(__('Please enter correct all fields'));
				}
			} else {
				$this->Session->setFlash(__(' Old password not correct'));
				$this->redirect(array('controller' => 'users', 'action' => 'change_password'));
			}
		}
	}
}