<?php
class Answer extends AppModel {
	public $name = 'Answer';

	public $validate = array(
		'word_id' => array(
			'rule' => 'naturalNumber'
		),
		'answer_a' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter answer a'
			)
		),
		'answer_b' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter answer b'
			)
		),
		'answer_c' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),	
				'message' => 'Enter answer '
			)
		),
		'answer_correct' => array(
			'rule' => 'naturalNumber'
		)
	);
}