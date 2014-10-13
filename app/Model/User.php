<?php
class User extends AppModel{
	public $validate = array(
		'login' => array(
			'username' => array(
				'empty' => array(
					'rule' => 'notEmpty',
					'message' => 'username is required'
				)
			),
			'password' => array(
				'empty' => array(
					'rule' => 'notEmpty',
					'message' => 'Password is required'
				)
			)
		)
	);
	

	public function beforeSave($option = array()){
		if(isset($this->data[$this->alias]['password'])){
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$thsi->data[$this->alias]['password']
			);
		}
		return TRUE;
	}
}
?>