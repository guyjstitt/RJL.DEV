<?php

/**
 * Description of NotesController
 *
 * @author dp
 */
class NotesController extends AppController {
    var $components = array('RequestHandler');
    var $layout = 'ajax';  // uses the ajax layout
    var $autoRender=false; // renders nothing by default

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add');
	}
    public function index() {
		$this->User->recursive = 0;
		$this->set('notes', $this->paginate());
    }
    public function add($date,$caseid,$code,$note) {
		$data = array('Note' => array(
					'noteDate' => $date,
					'noteContent' => $note,
					'rj_case_id'=> $caseid),
					'Code' => array(
						(int) 1 => array(
						'id' => $code)));
		//die(debug($data));

		if ($this->Note->saveAll($data)) {
			$this->Session->setFlash(__('The note has been saved'));
			$this->RequestHandler->setContent('json','application/json');
        	$this->set('data',json_encode($data));
			$this->render('/Elements/ajaxreturn');
		}else
		{
			$this->Session->setFlash(__('Error saving note'));
		}
    }
    public function view($id = null) {
			$this->Note->id=$id;
	        if (!$this->Note->exists()) {
	            throw new NotFoundException(__('Invalid user'));
			}
       		$this->set('note', $this->Note->findByid($id));
	}

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
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