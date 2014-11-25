<?php
App::uses('AppModel', 'Model');
/**
 * Notes Model
 *
 */
class Note extends AppModel {
	//comment out because I do not want case info with note	public $belongsTo = 'RjCase';
	public $hasAndBelongsToMany = array(
		'Code' =>
			array(
				'className' => 'Code',
				'joinTable' => 'codes_notes',
				'foreignKey' => 'note_id',
				'associationForeignKey' => 'code_id'
            )
    );
}