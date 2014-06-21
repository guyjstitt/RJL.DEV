<?php
App::uses('AppController', 'Controller');
/**
 * Cases Controller
 *
 * @property Case $Case
 */
class EditController extends AppController {
    var $components = array('RequestHandler');


	public function edit($noteId, $caseId){
		$this->loadModel('Note');
		$case= $this->Note->findByid($noteId);
		$this->set('case', $case);

		
		$this->Note->id = $noteId;
		if(!$this->Note->exists()){
			throw new NotFoundException(__('Invalid Note'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash(__('The Note has been saved'));
				$this->redirect(array('controller' =>'RjCases','action' => 'view', $caseId));
			} else {
				$this->Session->setFlash(__('The Note could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Note->read(null, $noteId);
		}

		$this->loadModel('Code');
		$codes = $this->Note->Code->find('list', array ('fields'=>'Code.code'));
		$this->set(compact('codes'));
	}


}
?>