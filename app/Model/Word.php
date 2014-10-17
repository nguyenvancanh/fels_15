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
		)
	);
}