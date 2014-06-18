<?php
App::uses('AppModel', 'Model');
/**
 * RjCase Model
 *
 * @property Victim $Victim
 */
class RjCase extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'caseId';
/**
 * Validation rules
 *
 * @var array
 */
 
	//public $recursive = -1;
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
 

  
 	public $hasAndBelongsToMany = array(
		'Charge',
		'Victim',
		'Offender',
		'User'
    );
	
	public function getVictimsByRjCaseId($Caseid = null) {
    if(empty($Caseid)) return false;
    $victims = $this->find('all', array(
        'joins' => array(
             array('table' => 'rj_cases_victims',
                'alias' => 'RjCasesVictim',
                'type' => 'INNER',
                'conditions' => array(
                    'RjCasesVictim.victim_id' => Victim.id,
                    'RjCasesVictim.rj_case_id'=>$Caseid
                )
            )
        ),
        'group' => 'RjCase.id'
    ));
    return $victims;
}
	
	
	
	public $hasMany = array(
		'Offender' => array(
			'className' => 'Offender',
			'foreignKey' => 'case_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'case_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Note' => array(
			'className' => 'Note',
			'foreignKey' => 'rj_case_id'
		)
	);
	/*
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		/*,
		'Charge' => array(
			'className' => 'Charge',
			'foreignKey' => 'charge_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/
	public $validate = array(
		'caseId'=>array(
			'rule'=> 'isUnique',
			'required'=>false,
			'allowEmpty'=>true,
			'message'=>'Case already Exists.'));

}
