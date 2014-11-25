<?php

class UploadsController extends AppController {

public function index() {
	if ($this->request->is('post')) {
			// create
			$this->Upload->create();

			// attempt to save
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash('Your message has been submitted');
				$this->redirect(array('action' => 'index'));
			}
	}

}
public function view() {}
}
?>