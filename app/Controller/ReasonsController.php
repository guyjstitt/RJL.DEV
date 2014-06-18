<?php
App::uses('AppController', 'Controller');
/**
 * Reasons Controller
 *
 * @property Case $Case
 */
class ReasonsController extends AppController {

public function add(){
$this->set('activeTab','reasons');
if(!empty($this->data))
{
 $this->Reason->create($this->data);
					
if($this->Reason->save()) {

$this->Session->setFlash('This case close reason has been saved');
$this->redirect(array('action' => 'add'));
}
else {
$this->Session->setFlash('This case close reason could bot be saved');
}

}
//$reasons = $this->Reason->find('list', array('fields'=>array('Reason.closeReason')));
//$this->set('reasons',$reasons);

}


public function edit($reasonId = null){
$this->Reason->id = $reasonId;

if(!$this->Reason->exists()){
throw new NotFoundException(__('Invalid Case Close Reason'));
}
if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reason->save($this->request->data)) {
				$this->Session->setFlash(__('The case close reason has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case close reason could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Reason->read(null, $reasonId);
		}
		//$cases = $this->Reason->find('list');
		//$this->set(compact('cases'));
}

public function view(){
}

public function index(){

$reasons= $this->Reason->find('all');
$this->set('reasons',$reasons);

}




}
?>