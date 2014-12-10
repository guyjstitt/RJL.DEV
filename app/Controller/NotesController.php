<?php

/**
 * Description of NotesController
 *
 * @author dp
 */
class NotesController extends AppController {
    //var $components = array('RequestHandler');
    //var $layout = 'ajax';  // uses the ajax layout
    //var $autoRender=false; // renders nothing by default

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add');
	}
    public function index() {
		$this->User->recursive = 0;
		$this->set('notes', $this->paginate());
    }
    public function add() {
    	$this->layout = null;
    	$data = ($_POST);
		$response = null;
		if($this->Note->saveAll($data)){
			$response = true;
			$this->Session->setFlash(__('The Note was saved'));
		} else {
			$this->Session->setFlash(__('The Note could not be saved. Please, try again.'));
		}
		echo $response;
    }
    public function view($id = null) {
			$this->Note->id=$id;
	        if (!$this->Note->exists()) {
	            throw new NotFoundException(__('Invalid user'));
			}
       		$this->set('note', $this->Note->findByid($id));
	}
	public function edit($noteId){
		$this->Note->id = $noteId;
		if(!$this->Note->exists()){
			throw new NotFoundException(__('Invalid Note'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash(__('The Note has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Note could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Note->read(null, $noteId);
		}
	}

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Note->id = $id;
     
        $var = $this->Note->findByid($id);
       // die(debug($var));
        $this->set('var',$var);
        if (!$this->Note->exists()) {
            throw new NotFoundException(__('Invalid note'));
        }
        if ($this->Note->delete()) {
            $this->Session->setFlash(__('Note deleted'));
            return $this->redirect(array('controller'=>'RjCases','action' => 'view',$var['Note']['rj_case_id']));
        }
        $this->Session->setFlash(__('Note was not deleted'));
        return $this->redirect(array('controller'=>'RjCases','action' => 'view',$var['Note']['rj_case_id']));
    }

	public function add2() {
        if (!$this->request->is('post')) {

		}
		else{
	            $this->Session->setFlash(__(print_r($this->request->data)));

        }
    }
    // You will need this to disable debug output appended to the view by CakePHP.
    // Otherwise it will mess up your returned messages.


}