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
		$dataOffender= $this->RjCase->Offender->find('all');
		$open=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Open')));
		$closed=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Closed')));
			
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
        }
		
		//get all codes
		$this->loadModel('Code');
		$this->set('codes', $this->Code->find('list', array('fields' => 'code','order'=>'code ASC','recursive' => 0)));
			
		$case =$this->RjCase->findByid($Caseid);
		$this->set('case', $case);

		$this->set('victims', $this->RjCase->Victim->findBycaseId($Caseid));
		
		//find this victim id and rjcase id where id = victim_id in rjcasesvictim and id = rj_case_id
		$this->loadModel('Victim');
	
		$this->set('file',$this->RjCase->Contact->findByid($Caseid));
		
		$notes = $this->RjCase->Note->findAllByrjCaseId($Caseid);

		$this->set('notes',$notes);
		
		$caseStatus =$this->RjCase->find('list', array('conditions'=>array('RjCase.id'=>$Caseid)));

		$this->set(compact('caseStatus'));
		 
		$this->loadModel('User');
		
		$caseManager = $this->RjCase->find('first', array('fields'=>'user_id', 'conditions'=>array('RjCase.id' => $Caseid)));

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
		$this->set('caseManagerUserName',$caseManagerUserName);

		$this->loadModel('Reason');
		$reasonNum = $this->RjCase->find('first', array('fields'=>'caseClose', 'conditions'=>array('RjCase.id' => $Caseid)));
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
	public function add() {
	$this->loadModel('Victim');
	$this->loadModel('Offender');
	$this->loadModel('User');
	$this->loadModel('Charge');
	$errors = $this->request->data;
	/*if($this->request->is('post')) {
		//$format = $this->RjCase->formatSelectData($this->request->data['Charge']['Charge'],'id');
		//$this->request->data['Charge'] = $format;
		
		//$format2 = $this->RjCase->formatSelectData($this->request->data['User']['User'],'id');
		//$this->request->data['User'] = $format2;
		//$data = array();	
		if($this->RjCase->saveAll($this->request->data)) {
			$data['success']=true;
			$case_id=$this->RjCase->getInsertId();
			$this->Session->setFlash('The case has been added');
			$this->redirect(array('action' => 'index'));
			$this->RequestHandler->respondAs('text/x-json');
			$this->set('data',json_encode($data));

		} else {
			$this->layout = null;
			$data['success']=false;
			$this->RequestHandler->respondAs('text/x-json');
			$this->set('data',json_encode($data));
			$this->render('/RjCases/json/index');
			$this->Session->setFlash('The case could not be saved. Please, try again.');
		}
		$this->set('data',json_encode($data));
		//ajaxSave();
	}*/
		$users = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName')));
		$this->set('users', $users);
		
		$facilitators = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName'), 'conditions'=>array('User.role'=>'facilitator')));
		$this->set('facilitators',$facilitators);
		
		$this->set(compact('users'));
			$victims = $this->RjCase->Victim->find('list', array(
			'fields'=>array('Victim.firstName')));
		$this->set(compact('data','victims'));
		
		$charges = Set::extract('/Charges/charge_id', $this->request->data);        
		$this->request->data['Charges']['charge_id'] = implode(",", $charges);
		
		
		$charges = $this->RjCase->Charge->find('list', array(
				'fields' => array('Charge.charges')));
		$this->set(compact('data','charges'));
		
		$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
			
		$this->set('states',$states);
	}

	public function ajaxSave() {
		$this->layout = null;
		if($this->request->data['Charge']['Charge']){
			$format = $this->RjCase->formatSelectData($this->request->data['Charge']['Charge'],'id');
			$this->request->data['Charge'] = $format;
		}
		if($this->request->data['User']['User']){
			$format2 = $this->RjCase->formatSelectData($this->request->data['User']['User'],'id');
			$this->request->data['User'] = $format2;
		}
		$data= array();
		if($this->request->is('post')) {
			if($this->RjCase->saveAll($this->request->data)) {
				$data['success']=true;
				$this->Session->setFlash('The case has been added');
			} else {
				$data['success']=false;
				$this->Session->setFlash('The case could not be saved. Please, try again');
			}
			echo json_encode($data);
			exit();
		}
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

		$charges = $this->RjCase->Charge->find('list', array(
				'fields' => array('Charge.charges')));
		$this->set(compact('data','charges'));
		
		$facilitators = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName'), 'conditions'=>array('User.role'=>'facilitator')));
		$this->set('facilitators',$facilitators);
	
		$users = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName')));
		
		$this->set(compact('users'));
			
		$closeReasons = $this->Reason->find('list',array(
		'fields' =>array('Reason.closeReason')));

		$this->set('closeReasons',$closeReasons);
	
	}

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
