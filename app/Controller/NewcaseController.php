



<?php
class NewcaseController extends AppController {
	public $uses = array('RjCase', 'Victim', 'Offender');
	public $components = array('Wizard.Wizard');
	
	function beforeFilter() {
	$this->Wizard->steps = array('newcase', 'victim', 'offender');
	$this->Wizard->completeUrl = '/newcase/confirm';
}
	function confirm() {
	}
	
	function wizard($step = null) {
	$this->Wizard->process($step);
	}
	
	
	/**
 * [Wizard Process Callbacks]
 */
	function _processNewcase() {
		$this->RjCase->set($this->data);
		

		if($this->RjCase->validates()) {
			return true;
		}
		return false;
	}

	function _processVictim() {
		$this->Victim->set($this->data);

		if($this->Victim->validates()) {
			return true;
		}
		return false;
	}

	function _processOffender() {
		$this->Offender->set($this->data);

		if($this->Offender->validates()) {
			return true;
		}
		return false;
	}

	/**
 * [Wizard Completion Callback]
 */
	function _afterComplete() {
		$wizardData = $this->Wizard->read();
		extract($wizardData);

		$this->RjCase->save($newcase['RjCase']);
		$this->Victim->save($victim['Victim']);
		$this->Offender->save($offender['Offender']);

	}
	
	
	/*
public function newcase() {
	$this->loadModel('RjCase');
	}
	public function victim() {
	$this->loadModel('Victim');
	}
	public function index() {
	$this->loadModel('Victim');
	}*/
}


	
	








?>