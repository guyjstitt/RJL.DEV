<?php

/**
 * Contact Controller
 * @author James Fairhurst <info@jamesfairhurst.co.uk>
 */
class ContactController extends AppController {

	/**
	 * Main index action
	 */
	 
	 public function index() {
	 $contacts = $this->Contact->find('all');
	 $this->set('contacts', $contacts);
	 }
	 
	public function add() {
		
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Contact->create();
			
			// attempt to save
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash('Your file has been saved');
				$this->redirect(array('action' => 'add'));

			// form validation failed
			} else {
				// check if file has been uploaded, if so get the file path
				if (!empty($this->Contact->data['Contact']['filepath']) && is_string($this->Contact->data['Contact']['filepath'])) {
					$this->request->data['Contact']['filepath'] = $this->Contact->data['Contact']['filepath'];
				}
			}
		}
		$cases = $this->Contact->RjCase->find('first');
		die(debug($cases));
		$this->set(compact('cases'));
	}
	public function view($id=NULL) {
	$this->set('contact', $this->Contact->findByid($id));
	}
	
	
	
	  public function download($id=null,$filename=null) {
	  $this->loadModel('Contact');
	  $filename=$this->Contact->filename;
	  $contact = $this->Contact->find('first', array(
		'conditions' => array(
			'Contact.id' => $id)));
	

        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
		//public $filename = $contact['Contact']['filename'];
        $this ->set(array(
            'id'        => $contact['Contact']['filename'],
            'name'      => $contact['Contact']['filename'],
            'download'  => true,
            'path'      =>WEBROOT_DIR . '' . DS
        ));
      
    }
}