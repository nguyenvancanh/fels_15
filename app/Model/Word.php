<?php
App::uses('AppModel', 'Model');

class Word extends AppModel {
	var $name = "Word";

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
				'message' => 'Enter a Viet Nam word'
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