<?php
class Charge extends AppModel {
 
			public $hasAndBelongsToMany = array(
		'RjCase'
    );
 
}