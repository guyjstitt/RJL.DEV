<?php
class OffendersController extends AppController {
    public $components = array('Session','RequestHandler');
    
    
        public function index() 
        {

        	$this->set('activeTab','offenders');  
            $offenders = $this->Offender->find('all');
            $this->set('offenders', $offenders);
         }


            public function add($caseId=null)
             {
			
			 
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
			 
			 
			 
        			$this->set('activeTab','offenders'); 
                    if (!empty($this->data)) {
                    $this->Offender->create($this->data);
						
                    if ($this->Offender->save()) {
                    $this->Session->setFlash('The offender has been saved');
                    if($caseId==null)
					{
					$this->redirect(array('action' => 'index'));
					}else
					{
				
				$this->redirect(array('controller'=>'RjCases','action' => 'view', $caseId));
					}
                    } else {
                    $this->Session->setFlash
                    ('The offender could not be saved. Please, try again.');
                    }
                    }
					$cases = $this->Offender->RjCase->find('list');
		$this->set(compact('cases'));
		
		$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
				
				$this->set('states',$states);
            }
                
            
            public function delete($offenderId = null)
             {
        		$this->set('activeTab','offenders'); 
                if (!$offenderId) {
                $this->Session->setFlash('Invalid id for offender');
                $this->redirect(array('action' => 'index'));
                }
                if ($this->Offender->delete($offenderId)) {
                $this->Session->setFlash('Offender deleted');
                } else {
                $this->Session->setFlash(__('Offender was not deleted',
                true));
                }
                $this->redirect(array('action' => 'index'));
             }



          function edit($offenderId = null, $caseId) {
		$this->Offender->id = $offenderId;
		if (!$this->Offender->exists()) {
			throw new NotFoundException(__('Invalid offender'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Offender->save($this->request->data)) {
				$this->Session->setFlash(__('The offender has been saved'));
				if($caseId=='data')
				{
			$this->redirect(array('action' => 'view', $offenderId,'data'));
				}else
				{
				
				$this->redirect(array('controller'=>'RjCases','action' => 'view', $caseId));
					}
			} else {
				$this->Session->setFlash(__('The offender could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Offender->read(null, $offenderId);
		}
		$cases = $this->Offender->RjCase->find('list');
		$this->set(compact('cases'));
			$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
				
				$this->set('states',$states);
	}
                
    function view($offenderId = null, $caseId) {

        $this->set('activeTab','offenders'); 
		$this->loadModel('RjCase');
	   $this->set('attachedCaseId', $this->RjCase->findByid($caseId));
		/*
		$data = $this->data;
		//die(debug($data));
		$this->set('data',$data);
	
		/$caseIds = $this->Offender->find('list',array(
			'joins' => array(
			array(
					'table' => 'rj_cases',
					'alias' => 'RjCase',
					'type' => 'left',
					'conditions' => array(
						'Offender.c
					
					
					
					
					
					
					'fields' => array('RjCase.caseId'),
					'conditions'=>array ('offender.id'=>$offenderId)
					));
					
		
		die(debug($caseIds));
		$this->set('caseIds',$caseIds);
					
		*/
		
        if (!$offenderId) {
            $this->Session->setFlash('Invalid Offender');
            $this->redirect(array('action' => 'index'));
        }
		$this->set('offender', $this->Offender->findByid($offenderId));
       // $this->set('offender', $this->Offender->findByoffenderid($offenderId));
    }
	function searchfn($searchString = null){
		$this->layout = null;
		$this->set('offenders', $this->Offender->find('all', array(
					'recursive' => -1,
					'conditions' => array('Offender.firstName LIKE' => $searchString . '%'),
					'order' => array('Offender.firstName ASC'))));
	}
	function searchln($searchString = null){
		$this->layout = null;
		$this->set('offenders', $this->Offender->find('all', array(
					'recursive' => -1,
					'conditions' => array('Offender.lastName LIKE' => $searchString . '%'),
					'order' => array('Offender.lastName ASC'))));
	}
	function searchssn($searchString = null){
		$this->layout = null;
		$this->set('offenders', $this->Offender->find('all', array(
					'recursive' => -1,
					'conditions' => array('Offender.socialSecurityNumber LIKE' => $searchString . '%'),
					'order' => array('Offender.socialSecurityNumber ASC'))));
	}
	public function OffIdCheck($id = null)
	{
		if ($this->Offender->hasAny(array('Offender.offenderid' => $id))) {
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