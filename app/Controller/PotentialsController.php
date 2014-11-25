<?php
class PotentialsController extends AppController{


		public function viewed ($id=null) {
			
		  $potential = $this->Potential->findByid($id);
		  //die(debug($potential));
		  $this->set('potential',$potential);
		  
		  
		 $seen = $potential['Potential']['seen'] =4;
		 $this->set('seen', $seen);
		 $this->Potential->save($potential['Potential']['seen'] =4);
		 
		 $this->Session->setFlash('It might have worked');
		 
		 
		 //die(debug($seen));
		
		//die(debug($data));
		//$this->set('data',$data);
		
		$this->redirect(array('action' => 'view',$id));
		}
		
		public function index() {
		}
		
		public function view($id=null) {

        $this->set('activeTab','potentials'); 
        if (!$id) {
            $this->Session->setFlash('Invalid Potential Volunteer.');
            $this->redirect(array('action' => 'index'));
			
        }
       $this->set('potential', $this->Potential->findByid($id));
	   
	   
	   $this->Potential->id = $id;
		if ($this->request->is('post') || $this->request->is('put'))
		{
		
		//$format = $this->Potential->formatSelectData($this->request->data['Potential'],'seen');
			///	$this->request->data['Potential'] = $format;
				
				//die(debug($this->request->data));
				
		if($this->Potential->save($this->request->data)){
		$this->request->data['Potential']['seen']='seen';
		
		$this->Session->setFlash('Changes have been saved');
		}
		}
		else {
			$this->request->data = $this->Potential->read(null, $id);
		}
		}
		
		public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Potential->id = $id;
		if (!$this->Potential->exists()) {
			throw new NotFoundException(__('Invalid potential volunteer.'));
		}
		if ($this->Potential->delete()) {
			$this->Session->setFlash(__('Potential volunteer deleted.'));
			$this->redirect(array('controller'=>'Home', 'action'=>'index'));
		}
		$this->Session->setFlash(__('Potential Volunteer was not deleted.'));
		$this->redirect(array('controller'=>'Home','action' => 'index'));
		
		 $this->set('potential', $this->Potential->findByid($id));
	}
	public function edit($id = null) {
		$this->Potential->id = $id;
		if (!$this->Potential->exists()) {
			throw new NotFoundException(__('Invalid potential'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Potential->save($this->request->data)) {
				$this->Session->setFlash(__('The potential has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The potential could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Potential->read(null, $id);
		}
	}
	
	
		/*public function edit($id = null) {
		//die(debug($id));
		$this->Potentail->id = $id;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid cpvol'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
		$seen=$this->request->data['Potential']['seen'];
			$reason=$this->request->data['RjCase']['caseClose'];
				//die(debug($closed));
			$this->set('closed', $closed);
		if($closed=='Closed'&&$reason=='This Case has not been closed')
				{
				$this->Session->setFlash(__('Select a Case Close Reason'));
				}
			elseif($this->RjCase->save($this->request->data)) {
				$this->Session->setFlash(__('The case has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RjCase->read(null, $id);
		}
		}
	
	*/
	
	
	
	
	
	
	
	/*public function seen($id) {
	//ie(debug($id));
	
	
	
	$this->Potential->id =$id;
		die(debug($pvol));
    
	$name = $this->Potential->firstName;
	die(debug($name));
	$this->set('name',$name);
	
	//$seen= $this->request->data['Potential']['seen'];
	//die(debug($seen));
	//$this->set('seen',$seen);
	
	
	if(($this->request->data['Potential']['seen'])==null){
	//die(debug($seen));
	$this->request->data['Potentials']['seen']= 'seen';
	if ($this->Potential->save($this->request->data)) {
				$this->Session->setFlash(__('The potential volunteer has been seen'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The potential could not be saved. Please, try again.'));
			}
	}
	else {
			$this->request->data = $this->Potential->read(null, $id);
			$this->Session->setFlash('what the fuck');
			
		}
		
	}*/
}

?>