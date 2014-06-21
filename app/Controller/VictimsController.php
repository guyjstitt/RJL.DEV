<?php
class VictimsController extends AppController {
    public $components = array('Session','RequestHandler');
    
    
        public function index() 
        {
			$uid = $this->Session->read('Auth.User.role');
			//die(debug($uid));
			$this->set('uid',$uid);
			
			if($uid !== 'facilitator')
			{
				$victims = $this->Victim->find('all');
				$this->set('victims',$victims);
			}
			else
			{
				$this->Session->setFlash('Access Restricted');
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			
			 }
		 
		 }
		public function event()
        {

        	$this->set('activeTab','events');
         }

			public function convertDates( &$data ){
					if (!empty($data['dateOfBirth']) && strtotime($data['dateOfBirth']) ){
					$data['dateOfBirth'] = date('Y-m-d', strtotime($data['dateOfBirth']));
    }
	}
	public function convertDatesBack( &$data ){
					if (!empty($data['dateOfBirth']) && strtotime($data['dateOfBirth']) ){
					$data['dateOfBirth'] = date('d-m-y', strtotime($data['dateOfBirth']));
    }
}
            public function add($caseId=null)
             {
					
        			$this->set('activeTab','victims'); 
					$this->loadModel('RjCase');
					if(!empty($caseId))
					{
					$attachedCaseId =  $this->RjCase->find('list', array(
					'fields'=>array('RjCase.id'),'conditions'=>array('RjCase.id'=> $caseId)));
					}
					else
					{
					$attachedCaseId = NULL;
					}
					//die(debug($attachedCaseId));
					$this->set(compact('attachedCaseId'));
					
                    if (!empty($this->data)) {
					//Convert the dates to YYYY-MM-DD format before attempting to save.
					$this->convertDates( $this->request->data['Victim'] );
                    $this->Victim->create($this->data);
					
                    if ($this->Victim->save()) {
					
                    $this->Session->setFlash('The victim has been saved');
                    if($caseId==null)
					{
					$this->redirect(array('action' => 'index'));
					}else
					{
				
					$this->redirect(array('controller'=>'RjCases','action' => 'view', $caseId));
					}
                    } else {
                    $this->Session->setFlash
                    ('The victim could not be saved. Please, try again.');
                    }
                    }
						$this->loadModel('RjCase');
					$cases = $this->Victim->RjCase->find('list', array(
			'fields'=>array('RjCase.caseId')));
		$this->set('cases',$cases);
		
		$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
		
		$this->set('states',$states);
            }
                
            
            public function delete($victimId = null)
             {
        		$this->set('activeTab','victims'); 
                if (!$victimId) {
                $this->Session->setFlash('Invalid id for victim');
                $this->redirect(array('action' => 'index'));
                }
                if ($this->Victim->delete($victimId)) {
                $this->Session->setFlash('Victim deleted');
                } else {
                $this->Session->setFlash(__('Victim was not deleted',
                true));
                }
                $this->redirect(array('action' => 'index'));
             }



            function edit($victimId = null, $caseId) {
		//die(debug($caseId));
		$this->Victim->id = $victimId;
		
		
		
		
	
		if (!$this->Victim->exists()) {
			throw new NotFoundException(__('Invalid Victim'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Victim->save($this->request->data)) {
	
			
			
		
				$this->Session->setFlash(__('The victim has been saved'));
				
				if($caseId=='data')
				{
			$this->redirect(array('action' => 'view',$victimId,'data'));
				}else
				{
				
				$this->redirect(array('controller'=>'RjCases','action' => 'view', $caseId));
					}
			} else {
				$this->Session->setFlash(__('The victim could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Victim->read(null, $victimId);
		}
		$cases = $this->Victim->RjCase->find('list');
		$this->set(compact('cases'));
		
		$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
		
		$this->set('states',$states);
	}

                
    function view($victimId, $caseId) {

       //die(debug($caseId));
	   $this->loadModel('RjCase');
	   $this->set('attachedCaseId', $this->RjCase->findByid($caseId));
		$this->set('activeTab','victims'); 
		$this->convertDatesBack( $this->request->data['Victim'] );
        if (!$victimId) {
		 
		
            $this->Session->setFlash('Invalid Victim');
            $this->redirect(array('action' => 'index'));
        }
		$victim = $this->Victim->findByid($victimId);
		//die(debug($victim));
		$this->set('victim', $victim);
       
    }
	function searchfn($searchString=null){
		$this->layout = null;
		$this->set('victims', $this->Victim->find('all', array(
					'recursive' => -1,
					'conditions' => array('Victim.firstName LIKE' => $searchString . '%'),
					'order' => array('Victim.firstName ASC'))));
	}
	function searchln($searchString=null){
		$this->layout = null;
		$this->set('victims', $this->Victim->find('all', array(
					'recursive' => -1,
					'conditions' => array('Victim.lastName LIKE' => $searchString . '%'),
					'order' => array('Victim.lastName ASC'))));
	}
	function searchssn($searchString=null){
		$this->layout = null;
		$this->set('victims', $this->Victim->find('all', array(
					'recursive' => -1,
					'conditions' => array('Victim.socialSecurityNumber LIKE' => $searchString . '%'),
					'order' => array('Victim.socialSecurityNumber ASC'))));
	}
	public function VictimIdCheck($id = null)
	{
		if ($this->Victim->hasAny(array('Victim.victimid' => $id))) {
			$this->RequestHandler->respondAs('text/x-json');
			$this->set('data',json_encode(true));
			$this->render('/Elements/ajaxreturn');
		}else{
			$this->RequestHandler->respondAs('text/x-json');
			$this->set('data',json_encode(false));
			$this->render('/Elements/ajaxreturn');
		}
		

	}
}
?>