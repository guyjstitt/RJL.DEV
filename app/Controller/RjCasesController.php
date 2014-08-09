<?php
App::uses('AppController', 'Controller');
/**
 * Cases Controller
 *
 * @property Case $Case
 */
class RjCasesController extends AppController {
    var $components = array('RequestHandler');
	
	public function index() {
		$this->loadModel('RjCase');
		$this->loadModel('User');
		$this->loadModel('Victim');
		$this->loadModel('Offender');
		$total= $this->RjCase->find('count');
		//$data = $this->RjCase->find('all');
		$dataOffender= $this->RjCase->Offender->find('all');
		$open=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Open')));
		$closed=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Closed')));
		
		
		
		
		//$male = $this->RjCase->Victim->find('count', array(
        //'conditions' => array('Victim.gender' => 'M')));
		//$female = $this->RjCase->Victim->find('count', array(
        //'conditions' => array('Victim.gender' => 'F')));
		//$offendercase = $this->Rjcase->Offender->findAllByid('id', array('conditions'=>array('RjCase.id'=>'Offender.case_id')));
	
		/*
		$data = $this->RjCase->find('all', array(
			'group'=>'RjCase.id', 'joins' => array(
			array(
				'fields' => 'DISTINCT (RjCase.caseId)',
					'table' => 'offenders',
					'alias' => 'OffenderJoin',
					'type' => 'Left',
					'conditions' => array(
						'OffenderJoin.case_id = RjCase.id'
					)
				),
			array(
				'alias' => 'VictimJoin',
				'table' => 'victims',
				'type' => 'Left',
				'conditions' => array(
					'VictimJoin.case_id = RjCase.id')
				)
			),
			'fields' => array('OffenderJoin.*','VictimJoin.*', 'RjCase.*')));
			*/
			
			/*
				$data = $this->RjCase->find('all', array(
			'group'=>'RjCase.id', 'joins' => array(
			array(
				'fields' => 'DISTINCT (RjCase.caseId)',
					'table' => 'offenders',
					'alias' => 'OffenderJoin',
					'type' => 'Left',
					'conditions' => array(
						'OffenderJoin.case_id = RjCase.id'
					)
				),
			array(
				'table' => 'rj_cases_victims',
					'alias' => 'RjCasesVictim',
					'type' => 'left',
					'conditions' => array(
						'RjCasesVictim.rj_case_id = RjCase.id'
					)
				),
			array(
				'alias' => 'VictimJoin',
				'table' => 'victims',
				'type' => 'left',
				'conditions' => array(
					'VictimJoin.id = RjCasesVictim.victim_id')
				)
			),
			'fields' => array('OffenderJoin.*','RjCasesVictim.*','VictimJoin.*', 'RjCase.*')));
			*/
			
			$data = $this->RjCase->find('all', array(
			'group'=>'RjCase.id', 'joins' => array(
			array(
				'table' => 'offenders_rj_cases',
					'alias' => 'OffendersRjCase',
					'type' => 'left',
					'conditions' => array(
						'OffendersRjCase.rj_case_id = RjCase.id'
					)
				),
			array(
				'alias' => 'OffenderJoin',
				'table' => 'offenders',
				'type' => 'left',
				'conditions' => array(
					'OffenderJoin.id = OffendersRjCase.offender_id')
				),
			
			array(
				'table' => 'rj_cases_victims',
					'alias' => 'RjCasesVictim',
					'type' => 'left',
					'conditions' => array(
						'RjCasesVictim.rj_case_id = RjCase.id'
					)
				),
			array(
				'alias' => 'VictimJoin',
				'table' => 'victims',
				'type' => 'left',
				'conditions' => array(
					'VictimJoin.id = RjCasesVictim.victim_id')
				)
			),
			'fields' => array('OffenderJoin.*','OffendersRjCase.*','RjCasesVictim.*','VictimJoin.*', 'RjCase.*')));
			
			
			//die(debug($total));
			$info = array(
				'total' => $total,
			
				'items' => $data,
				//'male'=>$male,
				//'female'=>$female,
				'open'=>$open,
				'closed'=>$closed,
				'activeTab'=>'Dashboard',
				'dataOffender'=>$dataOffender);
				
			$this->set($info);
			
			$this->set('case', $this->RjCase->findByid(array( 'fields'=>'DISTINCT RjCase.id')));
			$this->set('offender',$this->Offender->findByid());
			$this->RjCase->recursive = 0;
			$this->set('user', $this->User->read()); 
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($Caseid=null) {
		$this->set('activeTab','cases'); 
		if (!$Caseid) {
            $this->Session->setFlash('Invalid Case');
            $this->redirect(array('action' => 'index'));
			//$this->set('volunteer', $this->Volunteer->findByVolunteerid($volunteerID));
        }
		//$this->set('volunteer', $this->Volunteer->find('first', array('volunteerID' => $volunteerID)));
		//get all codes
		$this->loadModel('Code');
		$this->set('codes', $this->Code->find('list', array('fields' => 'code','order'=>'code ASC','recursive' => 0)));
		//$this->set('codes',$this->Code->field('code','','code ASC'));
			
		$case =$this->RjCase->findByid($Caseid);
		//die(debug($case));
		$this->set('case', $case);
		
		
		$this->set('victims', $this->RjCase->Victim->findBycaseId($Caseid));
		//die(debug($storeVictimId));
		//$this->set('case', $this->RjCase->RjCasesVictim->findById($Caseid));
		
		//find this victim id and rjcase id where id = victim_id in rjcasesvictim and id = rj_case_id
		$this->loadModel('Victim');
		
		//$rjcases = $this->RjCase->getVictimsByRjCaseId($victimId);
		//die(debug($rjcases));
		//$this->set('rjcases', $rjcases);
		
		
		$this->set('file',$this->RjCase->Contact->findByid($Caseid));
		

		$notes = $this->RjCase->Note->findAllByrjCaseId($Caseid);
		//die(debug($notes));
		$this->set('notes',$notes);
		
		$caseStatus =$this->RjCase->find('list', array('conditions'=>array('RjCase.id'=>$Caseid)));
		//die(debug($caseStatus)); 
		$this->set(compact('caseStatus'));
		 
		 $this->loadModel('User');
		
		$caseManager = $this->RjCase->find('first', array('fields'=>'user_id', 'conditions'=>array('RjCase.id' => $Caseid)));
		//die(debug($caseManager));
		$this->set('caseManager',$caseManager);
		
		$caseManagerUserName = $this->User->find('first', array(
			'joins' => array( 
			array(
					'table'=> 'people',
					'alias' => 'Persons',
					'type' => 'left',
					'conditions' => array (
						'Persons.user_id = User.id'
						)
					),
			array(
				'alias'=>'RjCasesJoin',
				'table'=>'rj_cases',
				'type'=>'inner',
				'conditions'=>array(
					'RjCasesJoin.user_id = User.id')
					)
				),
			'fields' => array('Persons.*', 'RjCasesJoin.*','User.*'),
			'conditions'=>array('RjCasesJoin.user_id' => $caseManager['RjCase']['user_id'], 'RjCasesJoin.id'=>$Caseid)));
		//die(debug($caseManagerUserName));			
		$this->set('caseManagerUserName',$caseManagerUserName);

	$this->loadModel('Reason');
	$reasonNum = $this->RjCase->find('first', array('fields'=>'caseClose', 'conditions'=>array('RjCase.id' => $Caseid)));
	//die(debug($reasonNum));
		
	$this->set('reasonNum',$reasonNum);
		
		$caseClose = $this->Reason->find('first', array(
			'joins' => array( 
			array(
					'table'=> 'rj_cases',
					'alias' => 'RjCase',
					'type' => 'left',
					'conditions' => array (
						'RjCase.caseClose = Reason.id'
						)
					),
			),	 
			'fields' => array('RjCase.*', 'Reason.*'),
			'conditions'=>array('RjCase.caseClose' => $reasonNum['RjCase']['caseClose'], 'RjCase.id'=>$Caseid)));
		//die(debug($caseClose));
		$this->set('caseClose',$caseClose);
	
	
		$data = $this->RjCase->find('all', array(
			'joins' => array(
			array(
					'table' => 'rj_cases_victims',
					'alias' => 'RjCasesVictim',
					'type' => 'right',
					'conditions' => array(
						'RjCasesVictim.rj_case_id = RjCase.id'
					)
				),
			array(
				'alias' => 'VictimJoin',
				'table' => 'victims',
				'type' => 'inner',
				'conditions' => array(
					'VictimJoin.id = RjCasesVictim.victim_id')
				)
			),
			'fields' => array('RjCasesVictim.*','VictimJoin.*','RjCase.*'),
			'conditions' =>array('RjCasesVictim.rj_case_id' => $Caseid)));
			
			$dataO = $this->RjCase->find('all', array(
			'joins' => array(
		
			array(
					'table' => 'offenders_rj_cases',
					'alias' => 'OffendersRjCase',
					'type' => 'right',
					'conditions' => array(
						'OffendersRjCase.rj_case_id = RjCase.id'
					)
				),
			array(
				'alias' => 'OffenderJoin',
				'table' => 'offenders',
				'type' => 'inner',
				'conditions' => array(
					'OffenderJoin.id = OffendersRjCase.offender_id')
				)
			),
			'fields' => array('OffenderJoin.*','OffendersRjCase.*','RjCase.*'),
			'conditions' =>array('OffendersRjCase.rj_case_id' => $Caseid)));
			
			
			//die(debug($data));
			//die(debug($data));
			$this->set('data',$data);
			$this->set('dataO',$dataO);
			
		$chargesData = $this->RjCase->find('all', array(
			'joins' => array(
			array(
					'table' => 'charges_rj_cases',
					'alias' => 'ChargesRjCase',
					'type' => 'right',
					'conditions' => array(
						'ChargesRjCase.rj_case_id = RjCase.id' 
					)
				),
			array(
				'alias' => 'ChargesJoin',
				'table' => 'charges',
				'type' => 'inner',
				'conditions' => array(
					'ChargesJoin.id = ChargesRjCase.charge_id')
				)
			),
			'fields' => array('ChargesRjCase.*','ChargesJoin.*', 'RjCase.*'),
			'conditions' => array('ChargesRjCase.rj_case_id' => $Caseid)));
			
			$this->set('chargesData', $chargesData);
			/*
			$data = $this->Victim->find('all', array(
			'group'=>'Victim.id', 'joins' => array(
			array(
				
					'table' => 'rj_cases_victims',
					'alias' => 'RjCasesVictim',
					'type' => 'inner',
					'conditions' => array(
						'RjCasesVictim.victim_id = Victim.id'
					)
				),
			array(
				'alias' => 'RjCaseJoin',
				'table' => 'rj_cases',
				'type' => 'inner',
				'conditions' => array(
					'RjCaseJoin.id = RjCasesVictim.rj_case_id')
				)
			),
			'fields' => array('RjCasesVictim.*','RjCaseJoin.*', 'Victim.*'),
			'conditions' =>array('RjCaseJoin.id' => $Caseid)
			));
			//die(debug($data));
			$this->set('data',$data);
			*/
		
		$this->loadModel('Contact');
		if ($this->request->is('post')) {
			// create
			$this->Contact->create();
			
			// attempt to save
		
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash('Your file has been saved');
				$this->redirect(array('action' => 'view',$Caseid));

			// form validation failed
			} else {
				// check if file has been uploaded, if so get the file path
				if (!empty($this->Contact->data['Contact']['filepath']) && is_string($this->Contact->data['Contact']['filepath'])) {
					$this->request->data['Contact']['filepath'] = $this->Contact->data['Contact']['filepath'];
				}
			}
		}

		$cases = $this->Contact->RjCase->find('list', array('conditions'=>array('RjCase.id'=> $Caseid)));
			//die(debug($cases));
		$this->set(compact('cases'));
		
	
}
//public function chosen() {
	public function add() {
	$this->loadModel('Victim');
	$this->loadModel('Offender');
	$this->loadModel('User');
	$this->loadModel('Charge');
	$errors = $this->request->data;
	if($this->request->is('post')) 
	{
		//die(debug($errors));
		//$this->RjCase->Charge->id = $this->data['RjCase']['charge_id'];
			//if($this->RjCase->saveAll($this->request->data)) {
				
				      
				$format = $this->RjCase->formatSelectData($this->request->data['Charge']['Charge'],'id');
				$this->request->data['Charge'] = $format;
				
				$format2 = $this->RjCase->formatSelectData($this->request->data['User']['User'],'id');
				$this->request->data['User'] = $format2;
				
				//die(debug($this->request->data));
				//die(debug($errors));
				//$implode= $this->request->data['Charges']
				if($this->RjCase->saveAll($this->request->data)) {
				
				$case_id=$this->RjCase->getInsertId();
				//$this->RjCase->create();
				//$this->RjCase->saveAll($this->request->data);
				//foreach($this->request->data['Victim']['RjCasesVictim'] as $victim) {
					//$victim['case_id']=$case_id;
						
				//		$this->Victim->RjCasesVictim->create();
				//	$this->Victim->RjCasesVictim->save($victim);
				//}
				
				//foreach($this->request->data['Offender'] as $offender) {
						//$offender['case_id']=$case_id;
						
						//$this->RjCase->Offender->create();
						//$this->RjCase->Offender->save($offender);
						//}
				//$this->Session->setFlash('The case has been saved');
				//die(debug($errors));
				$this->Session->setFlash('The case has been added');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The case could not be saved. Please, try again.');
			}
		}
		$users = $this->RjCase->User->find('list', array(
	
        'fields' => array('User.userName')));
		//die(debug($users));
		$this->set('users', $users);
		
		$facilitators = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName'), 'conditions'=>array('User.role'=>'facilitator')));
	//die(debug($facilitators));
		$this->set('facilitators',$facilitators);
		
		$this->set(compact('users'));
			$victims = $this->RjCase->Victim->find('list', array(
			'fields'=>array('Victim.firstName')));
		//die(debug($charges));
			//die(debug($victims));
		$this->set(compact('data','victims'));
		
		$charges = Set::extract('/Charges/charge_id', $this->request->data);        
		$this->request->data['Charges']['charge_id'] = implode(",", $charges);
		
		
		$charges = $this->RjCase->Charge->find('list', array(
				'fields' => array('Charge.charges')));
		//die(debug($charges));
		$this->set(compact('data','charges'));
		
		$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
			
		$this->set('states',$states);
		
		
		
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		//die(debug($id));
		$this->RjCase->id = $id;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid case'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			$closed=$this->request->data['RjCase']['caseStatus'];
			$reason=$this->request->data['RjCase']['caseClose'];
			$this->set('closed', $closed);
			$this->set('reason', $reason);
			if(($closed=='Closed')&&$reason=='1')
				{
				$this->Session->setFlash(__('Select a Case Close Reason'));
				}
			elseif($this->RjCase->save($this->request->data)) {
				$this->Session->setFlash(__('The case has been saved'));
				$this->redirect(array('controller'=>'RjCases','action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The case could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RjCase->read(null, $id);
		}
		$this->loadModel('Reason');
		
		//if case manager check if this is your case.  If not then exit
		$user = $this->Auth->user();
		//die(debug($user['role']));

		
		/*if($user['role'] != 'admin' || $user['role'] != 'caseadmin')
		{
			var_dump($user['role']);
			//see if this is the case managers account
			if($user['id'] != $this->request->data['RjCase']['user_id'])
			{
				//die(debug($this->request->data));
				$this->Session->setFlash(__('Not Authorized to edit this case'));
			    return $this->redirect(
			        array('controller' => 'RjCases', 'action' => 'index')
			    );
			}
		}
		*/
		

		
		$charges = $this->RjCase->Charge->find('list', array(
				'fields' => array('Charge.charges')));
		//die(debug($charges));
		$this->set(compact('data','charges'));
		
		$facilitators = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName'), 'conditions'=>array('User.role'=>'facilitator')));
	//die(debug($facilitators));
		$this->set('facilitators',$facilitators);
	
	$users = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName')));
		
			$this->set(compact('users'));
			
	$closeReasons = $this->Reason->find('list',array(
	'fields' =>array('Reason.closeReason')));

	//die(debug($closeReasons));
	$this->set('closeReasons',$closeReasons);
	
		}
	
	
	
		
	
	
	
	
	/*
		$this->RjCase->id = $id;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid case'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->RjCase->save($this->request->data))
			{
			$closed=$this->request->data['RjCase']['caseStatus'];
			$reason=$this->request->data['RjCase']['caseClose'];
				//die(debug($closed));
			$this->set('closed', $closed);
			
			if($closed=='Closed'&&$reason=='This Case has not been closed')
				{
				$this->Session->setFlash(__('Select a Case Close Reason'));
				}
			else
			{
			$this->Session->setFlash(__('The case has been saved'));
			$this->redirect(array('action' => 'index'));
			} 
		
		} 
		}
		else {
			$this->request->data = $this->RjCase->read(null, $id);
		}
	} */
	
	
	
	
	/*
		$this->RjCase->id = $id;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid case'));
		}
	
		
		if ($this->request->is('post') || $this->request->is('put')) {
		
		//$closed=$this->request->data;
	//die(debug($closed));
	// $this->set('closed', $closed);
	 
			if ($this->RjCase->save($this->request->data)) {
				if($this->RjCase->data['RjCase']['caseStatus']='Closed')
				{
				$this->Session->setFlash(__('Select a Case Close Reason'));
				}
				else
				{
				$this->Session->setFlash(__('The case has been saved'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->request->data = $this->RjCase->read(null, $id);
		}
		
	}
	}*/

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($Caseid = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->RjCase->id = $Caseid;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid case'));
		}
		if ($this->RjCase->delete()) {
			$this->Session->setFlash(__('Case deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Case was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	/**
 *
 * Dynamically generates a .csv file by looping through the results of a sql query.
 *
 */
 
 public function export()
	{
		$this->autoRender = false;
		ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

		//create a file
		$filename = "export_".date("Y.m.d").".csv";
		$csv_file = fopen('php://output', 'w');

		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'"');

		//$results = $this->RjCase->query($sql);	// This is your sql query to pull that data you need exported
		//or
			$results = $this->RjCase->find('all');

		// The column headings of your .csv fileDescription
		$header_row = array("Auto","Case ID", "Case Status", "Date Of Referral", "Court Date", "Date of Charge", "Charge Number", "Case Description");
		fputcsv($csv_file,$header_row,',','"');

		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
		foreach($results as $result)
		{
			// Array indexes correspond to the field names in your db table(s)
			$row = array(
				$result['RjCase']['id'],
				$result['RjCase']['caseId'],
				$result['RjCase']['caseStatus'],
				$result['RjCase']['dateOfRefferal'],
				$result['RjCase']['courtDate'],
				$result['RjCase']['dateOfCharge'],
				$result['RjCase']['chargeNumber'],
				$result['RjCase']['caseDescription']
			);
			fputcsv($csv_file,$row,',','"');
		}

		fclose($csv_file);
	}
	public function CaseIdCheck($id = null)
	{
		if ($this->RjCase->hasAny(array('RjCase.caseid' => $id))) {
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
