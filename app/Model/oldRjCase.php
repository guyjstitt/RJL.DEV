<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP CaseModel
 * @author dp
 */
class RjCase extends AppModel {
   //public $useTable = 'RjCases'; //override table to be case
   // example_id is the field name in the database
   public $primaryKey = 'caseID';
   /* public $validate = array(
        'caseStatus' => 'alphaNumeric',
        'courtDate' => 'date'
    );*/
}
