<?php
App::uses('AppController', 'Controller');
/**
 * Cases Controller
 *
 * @property Case $Case
 */
class RjCasesController extends AppController {


/**
 * index method
 *
 * @return void
 */

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
		$male = $this->RjCase->Victim->find('count', array(
        'conditions' => array('Victim.gender' => 'M')));
		$female = $this->RjCase->Victim->find('count', array(
        'conditions' => array('Victim.gender' => 'F')));
		//$offendercase = $this->Rjcase->Offender->findAllByid('id', array('conditions'=>array('RjCase.id'=>'Offender.case_id')));
	
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
                'VictimJoin.case_id = RjCase.id'
            )
        )
		
    ),
    'fields' => array('OffenderJoin.*','VictimJoin.*', 'RjCase.*'),
));



	
		$info = array(
		'total' => $total,
		'items' => $data,
		'male'=>$male,
		'female'=>$female,
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
	/*public function view($Caseid = null) {
		$this->RjCase->caseID = $Caseid;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid Case'));
		}
		$this->set('case',$this->RjCase->read(null, $Caseid));
	}
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
		
		$this->set('case', $this->RjCase->findByid($Caseid));
		
		$this->set('file',$this->RjCase->Contact->findByid($Caseid));
		$this->set('notes', $this->RjCase->Note->findAllByrjCaseId($Caseid));
		
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
public function chosen() {

	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
	$this->loadModel('Victim');
	$this->loadModel('Offender');
	$this->loadModel('User');
	$this->loadModel('Charge');
	if($this->request->is('post')) 
	{
		$this->RjCase->create();
	
	$conditions = array(
    'RjCase.caseId' => $this->Session->read('RjCase.caseId'));
if ($this->RjCase->hasField('caseId')){
    $this->Session->setFlash('The Case ID already exists in the database');
}
		else{
		
		if ($this->RjCase->saveAll($this->request->data)) {
			
			$case_id=$this->RjCase->getInsertId();
			
			//foreach($this->request->data['Victim'] as $victim) {
					//$victim['case_id']=$case_id;
					
					//$this->RjCase->Victim->create();
					//$this->RjCase->Victim->save($victim);
					 
			//}
			//foreach($this->request->data['Offender'] as $offender) {
					//$offender['case_id']=$case_id;
					
					//$this->RjCase->Offender->create();
					//$this->RjCase->Offender->save($offender);
					//}
                  $this->Session->setFlash('The case has been saved');
                  $this->redirect(array('action' => 'add'));
          } else {
                 $this->Session->setFlash
                    ('The case could not be saved. Please, try again.');
                    }
					
					}
             }
			 
		
			 $users = $this->RjCase->User->find('list', array(
        'fields' => array('User.userName')));
		
		$this->set(compact('users'));
		
		 $charges = $this->RjCase->Charge->find('list', array(
        'fields' => array('Charge.charges')));
		
		$this->set(compact('charges'));
		
			$victims = $this->RjCase->Victim->find('list', array(
        'fields' => array('Victim.victimId')));
		
		$this->set(compact('victims'));
					
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->RjCase->id = $id;
		if (!$this->RjCase->exists()) {
			throw new NotFoundException(__('Invalid case'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RjCase->save($this->request->data)) {
				$this->Session->setFlash(__('The case has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RjCase->read(null, $id);
		}
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
	
	public function notes() {
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
}
