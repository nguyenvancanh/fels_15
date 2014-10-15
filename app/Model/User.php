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
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Must be valid email'
			)
		),
		'fullname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Fullname equired'
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
}