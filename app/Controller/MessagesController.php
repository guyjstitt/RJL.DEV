<?php
class MessagesController extends AppController{
  public function index() 
        {
			$this->set('activeTab','messages');  
            $messages = $this->Message->find('all');
           //die(debug($messages));
		   $this->set('messages', $messages);
        
        }
		 
		

    
            public function add()
            {
				$this->set('activeTab','messages'); 
                    if (!empty($this->data)) {
                    $this->Message->create($this->data);
                    if ($this->Message->save()) {
                    $this->Session->setFlash('The message has been saved');
                    $this->redirect(array('action' => 'add'));
                    } else {
                    $this->Session->setFlash
                    ('The message could not be saved. Please, try again.');
                    }
                    }
        			
            }
                
            
            public function delete($id = null)
             {
        		$this->set('activeTab','messages'); 
                if (!$id) {
                $this->Session->setFlash('Invalid id for message');
                $this->redirect(array('action' => 'index'));
                }
                if ($this->Message->delete($id)) {
                $this->Session->setFlash('Message deleted');
                } else {
                $this->Session->setFlash(__('Message was not deleted',
                true));
                }
                $this->redirect(array('action' => 'index'));
             }


public function edit($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Message->read(null, $id);
		}
		$this->set('message', $this->Message->findByid($id));
	}
                
    function view($id = null) 
	{
		$this->set('activeTab','messages'); 
        if (!$id) {
            $this->Session->setFlash('Invalid Message');
            $this->redirect(array('action' => 'index'));

        }

       $this->set('message', $this->Message->findByMessageId($id));
    }

}
?>
