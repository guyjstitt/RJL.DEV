<?php
App::uses('AppModel', 'Model');
/**
 * Code Model
 *
 */
class Code extends AppModel {
	public $hasAndBelongsToMany = array(
		'Note' =>
			array(
				'className' => 'Note',
				'joinTable' => 'codes_notes',
				'foreignKey' => 'code_id',
				'associationForeignKey' => 'note_id')
    );
}