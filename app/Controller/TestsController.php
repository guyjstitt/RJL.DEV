<?php

class TestsController extends AppController {
	
	public $helpers = array('Js');
	public $components = array('RequestHandler');
	
	public function index() {
		if (!empty($this->data)) {
			if ($this->Test->save($this->data)) {
				if ($this->RequestHandler->isAjax()) {
					$this->render('success', 'ajax');
				}
				else {
					$this->Session->setFlash('Test sent');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
	}
	
	public function validate_form() {
		if ($this->RequestHandler->isAjax()) {
			$field = $this->request->data['field']; $value = $this->request->data['value']; $this->request->data['Post'][$field] = $value;
			$this->Test->set($this->data);
			if ($this->Test->validates()) {
				$this->autoRender = FALSE;
			}
			else {
				$error = $this->validateErrors($this->Test);
				$this->set('error', $error[$this->params['form']['field']]);
			}
		}
	}
}
