<?php
class Result extends AppModel {
	public $name = 'Result';

	public $validate = array(
		'user_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'word_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'status' => array(
			'rule' => 'naturalNumber'
		),
	);
}