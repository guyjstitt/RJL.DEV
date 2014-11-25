<?php
class ChargesController extends AppController {
    var $name = 'Charges';
	public function index(){
		$charges= $this->Charge->find('all');
		$this->set('charges',$charges);

	}
 	public function add(){
		if(!empty($this->data))
			{
			$this->Charge->create($this->data);
			if($this->Charge->save()) {
				$this->Session->setFlash('This new Charge has been saved');
				$this->redirect(array('action' => 'add'));
			}
			else {
				$this->Session->setFlash('This Charge could not be saved');
			}
		}
	}
	public function edit($chargeId = null){
		$this->Charge->id = $chargeId;
		if(!$this->Charge->exists()){
			throw new NotFoundException(__('Invalid Charge'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Charge->save($this->request->data)) {
				$this->Session->setFlash(__('The Charge has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Charge could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Charge->read(null, $chargeId);
		}
	}
    function import() {
        $messages = $this->Charge->import('charges.csv');
       // debug($messages);
    }
}
?>