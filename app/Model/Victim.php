<?php
App::uses('AppModel', 'Model');
/**
 * Victim Model
 *
 * @property RjCase $RjCase
 */
class Victim extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	//public $hasOne = 'User';
	//public $displayField = 'id';
	
	
	//this was the previous relationship
	/*public $belongsTo = array(
		'RjCase' => array(
			'className' => 'RjCase',
			'foreignKey' => 'case_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/
	//habtm
	public $hasAndBelongsToMany = array(
		'RjCase'
		);
	
	/*
	public $validate = array(
		'victimId'=>array(
			'rule'=> 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
			'message'=>'Victim already Exists.',
			'rule' => array('limitDuplicates', 0),
				'message'=>'Victim ID already exists.'));
    public function limitDuplicates($check, $limit) {
        // $check will have value: array('promotion_code' => 'some-value')
        // $limit will have value: 25
        $existingPromoCount = $this->find('count', array(
            'conditions' => $check,
            'recursive' => -1
        ));
        return $existingPromoCount < $limit;
    }
	*/
	
	public $validate = array(
    'victimId' => array(
        'rule'    => 'isUnique',
        'message' => 'This Victim Id has already been taken.'
    )
);
/*
		
	public $validate = array(
		'victimId'=>array(
			'rule'=> 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
			'message'=>'Victim already Exists.'),
		'firstName'=>array(
			'rule'=> 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter a first name.'),
        'lastName' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a last name.'),
		'gender' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a gender.'),
		'race' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a race.'),
		'streetAddress' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a street address.'),
		'zipCode' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a zip code.'),
		'city' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a city.'),
		'state' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a state.'),
		'email'=>array(
			'rule'=>array('email'),
			'message'=>'Please enter a valid email address'),
		'phoneOne' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a phone one number.'),
		'phoneOneType' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a phone one type.'),
		'phoneTwo' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a phone two.'),
		'phoneTwoType' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a phone two type.')
    );
	*/
}
