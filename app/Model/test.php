<?php

class Test extends AppModel {
	public $validate = array(
		'name'=>array(
			'rule'=>'notEmpty',
			'test'=>'Enter your name'
		),
		'email'=>array(
			'rule'=>'email',
			'test'=>'Enter a valid email address'
		),
		'test'=>array(
			'rule'=>'notEmpty',
			'test'=>'Enter your test'
		)
	);
}
