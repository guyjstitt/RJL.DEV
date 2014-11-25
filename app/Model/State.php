<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
 * 
 */
class State extends AppModel {

public $hasMany = 'Volunteers';
public $primaryKey = 'state_code';
}

?>