<?php

/**
 * Facilitator Controller
 * @author James Fairhurst <info@jamesfairhurst.co.uk>
 */
class FacilitatorsController extends AppController {

	/**
	 * Main index action
	 */
	 
	 public function index() {
	 $facilitators = $this->Facilitator->find('all');
	 $this->set('facilitators', $facilitators);
	 
	 
	 if ($this->request->is('post')) {
			// create
			$this->Facilitator->create();
			
			// attempt to save
			if ($this->Facilitator->save($this->request->data)) {
				$this->Session->setFlash('Your file has been saved');
				$this->redirect(array('action' => 'index'));

			// form validation failed
			} else {
				// check if file has been uploaded, if so get the file path
				if (!empty($this->Facilitator->data['Facilitator']['filepath']) && is_string($this->Facilitator->data['Facilitator']['filepath'])) {
					$this->request->data['Facilitator']['filepath'] = $this->Facilitator->data['Facilitator']['filepath'];
				}
			}
		}
	 }
	 
	public function add() {
		
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Facilitator->create();
			
			// attempt to save
			if ($this->Facilitator->save($this->request->data)) {
				$this->Session->setFlash('Your file has been saved');
				$this->redirect(array('action' => 'add'));

			// form validation failed
			} else {
				// check if file has been uploaded, if so get the file path
				if (!empty($this->Facilitator->data['Facilitator']['filepath']) && is_string($this->Facilitator->data['Facilitator']['filepath'])) {
					$this->request->data['Facilitator']['filepath'] = $this->Facilitator->data['Facilitator']['filepath'];
				}
			}
		}
	}
	public function view($id=NULL) {
	$this->set('facilitator', $this->Facilitator->findByid($id));
	}
	
	
	
	  public function download($id=null,$filename=null) {
	  $this->loadModel('Facilitator');
	  $filename=$this->Facilitator->filename;
	  $facilitator = $this->Facilitator->find('first', array(
		'conditions' => array(
			'Facilitator.id' => $id)));
	

        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
		//public $filename = $facilitator['Facilitator']['filename'];
        $this ->set(array(
            'id'        => $facilitator['Facilitator']['filename'],
            'name'      => $facilitator['Facilitator']['filename'],
            'download'  => true,
            'path'      =>WEBROOT_DIR . '' . DS
        ));
      
    }

    public function delete($id = null) {
        if (!$id) {
        $this->Session->setFlash('Invalid id for document event');
        $this->redirect(array('action' => 'index'));
        }
        if ($this->Facilitator->delete($id)) {
        $this->Session->setFlash('Document deleted');
        } else {
        $this->Session->setFlash(__('Document was not deleted',
        true));
        }
        $this->redirect(array('action' => 'index'));
    }
}