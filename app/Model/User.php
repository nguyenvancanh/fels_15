<?php
App::uses('AppModel','Model');

class User extends AppModel {
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Username equired'
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password is required'
			),
			'must_equal_confirm' => array(
				'rule' => 'passwordEqualvalidation',
				'message' => 'Password must be equal to password validation',
			)
		),
		'new_password' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter new password!'
		),
		'confirm_password' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please confirm new password!'
			),
			'isvalid' => array(
				'rule' => 'passwordMatch',
				'message' => 'Password confirm not match!'
			)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Must be valid email'
			)
		)
		'fullname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Fullname is required'
			)
		)
	);

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return TRUE;
	}
	
	public function passwordEqualValidation($check) {
		return ($check['password'] == $this->data[$this->alias]['password_confirm']);
	}

	public function passwordMatch() {
		if ($this->data[$this->alias]['new_password'] == $this->data[$this->alias]['confirm_password']) {
			return TRUE;
		}
		return FALSE;
	}
	
	public function checkPass($id, $password) {
		if (!empty($id) && !empty($password)) {
			$data = $this->findById($id);
			if ($data['User']['password'] == AuthComponent::password($password)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
}