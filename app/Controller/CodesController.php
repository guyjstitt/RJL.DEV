<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Case $Case
 */
class CodesController extends AppController {

	public function add(){
		if(!empty($this->data))
			{
			$this->Code->create($this->data);
			if($this->Code->save()) {
				$this->Session->setFlash('This new code has been saved');
				$this->redirect(array('action' => 'add'));
			}
			else {
				$this->Session->setFlash('This code could bot be saved');
			}
		}
	}


	public function edit($codeId = null){
		$this->Code->id = $codeId;
		if(!$this->Code->exists()){
			throw new NotFoundException(__('Invalid Code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The Code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Code could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Code->read(null, $codeId);
		}
	}

	public function view(){
	}

	public function index(){
		$codes = $this->Code->find('all');
		$this->set('codes',$codes);

	}
}
?>