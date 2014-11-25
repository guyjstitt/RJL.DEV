<?php
class DonorsController extends AppController {
    var $name = 'Donors';
 
    function import() {
   
	   $this->redirect(array('action' => 'index'));
	   
	   
	   
    }
	
	public function delete($donorId = null)
             {
        		$this->set('activeTab','donors'); 
                if (!$donorId) {
                $this->Session->setFlash('Invalid id for donor');
                $this->redirect(array('action' => 'index'));
                }
                if ($this->Donor->delete($donorId)) {
                $this->Session->setFlash('Donor deleted');
                } else {
                $this->Session->setFlash(__('Donor was not deleted',
                true));
                }
                $this->redirect(array('action' => 'index'));
             }
	
	public function add()
             {

        			$this->set('activeTab','donors'); 
                    if (!empty($this->data)) {
                    $this->Donor->create($this->data);
                    if ($this->Donor->save()) {
                    $this->Session->setFlash('The donor has been saved');
                    $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Session->setFlash
                    ('The donor could not be saved. Please, try again.');
                    }
                    }
					$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
		
		$this->set('states',$states);
            }
	
	public	function truncate() {
	
	$this->Donor->query('TRUNCATE donors;');
	$this->Session->setFlash('The table has been cleared');
	$this->redirect(array('action' => 'index'));
	
	}
	public function view($donorId) {
	
        $this->set('activeTab','admin'); 
		//$this->convertDatesBack( $this->request->data['Victim'] );
        if (!$donorId) {
		 
		
            $this->Session->setFlash('Invalid Donor');
            $this->redirect(array('action' => 'index'));
        }
		$this->set('donor', $this->Donor->findByid($donorId));
       
	
	
	}
	
	public function edit($donorId= null) {
	
	$this->Donor->id = $donorId;
	
	 if (!$donorId && empty($this->data)) {
                        $this->Session->setFlash('Invalid Donor');
                        $this->redirect(array('action' => 'index'));
                    }
                    if (!empty($this->data)) {
                        if ($this->Donor->save($this->data)) {
                            $this->Session->setFlash('The donor has been saved');
                            $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Session->setFlash('The donor could not be saved. Please, try again.');
                        }
                    }
                    if (empty($this->data)) {
                        $this->data = $this->Donor->read(null, $donorId);
                    }
		$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
		
		$this->set('states',$states);
	}
	
	 public function index() 
        {
			 
        	$this->set('activeTab','donors');  
            $donors = $this->Donor->find('all');
            $this->set('donors', $donors);
			
			$Identified = $this->Donor->find('count', array(
			'conditions' => array('Donor.donorType !=' => 'Anonymous')));
			
			$Anonymous = $this->Donor->find('count', array(
			'conditions' => array('Donor.donorType' => 'Private Donation')));
			
			
			$this->Donor->virtualFields['total']= 'SUM(Donor.donorAmount)';
			$totalDonations= $this ->Donor->find('first',array('fields' => array('total')));
			
			$this->Donor->virtualFields['totalId']= 'SUM(Donor.donorAmount)';
			$totalIdentified= $this ->Donor->find('first',array('fields' => array('totalId'), 'conditions'=> array('Donor.donorType' => 'Identified')));
			
			
			$this->Donor->virtualFields['totalAnon']= 'SUM(Donor.donorAmount)';
			$totalAnonymous= $this ->Donor->find('first',array('fields' => array('totalAnon'), 'conditions'=> array('Donor.donorType' => 'Anonymous')));
			
			
			//die(debug($totalDonations));
			$this->set('totalDonations',$totalDonations);
			//die(debug($totalIdentified));
			$this->set('totalIdentified',$totalIdentified);
			$this->set('totalAnonymous',$totalAnonymous);
			$total = $this->Donor->find('count');
			//die(debug($Identified));
			$this->set('Identified',$Identified);
			$this->set('Anonymous',$Anonymous);
			
			
			$this->set('total',$total);
			
			//$donationAmount = $this->Donor->find('all', 
			//array(array('fields' => array('sum(Donor.donorAmount) AS dtotal'), 'conditions' => ('Donor.donorAmount'=> $this->params[
			
			
				//$this->loadModel('State');
				//	$states = $this->State->find('list' ,array(
				//'fields' => array('State.state')));
			
			//$closed=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Closed')));
			
			
			
	
			
			
		$this->loadModel('Contact');
		
		
		
		
		if ($this->request->is('post')) {
			
			$file = new File(WWW_ROOT ."/uploads/donors.csv");
		if($file->delete()){
			echo "file deleted successfully";
		}else{
			echo "file failed to be delete";
		}
			
			
			
			// create
			$this->Contact->create();
			
			// attempt to save
			
			//$myData= $this->request->data;
			//die(debug($myData));
			//$this->set('myData',$myData);
			
			
			$this->Contact->id = 28;
			//$this->Contact->set($myData);
			$this->Contact->validate = $this->Contact->validateDonors;

			if ($this->Contact->save($this->request->data)) {
			$file = new File(WWW_ROOT ."/uploads/donors.csv");
		if($file->exists())
		{
				$messages = $this->Donor->import('donors.csv');
				//die(debug($messages));
				$this->Session->setFlash('Your file has successfully imported into the table');
				$this->redirect(array('action' => 'index'));

			// form validation failed
			
			}
			else
			
			{
			$this->Session->setFlash('Debug Error: You reached this error because you uploaded a csv file other than donors.csv');
				//$this->redirect(array('action' => 'index'));
			}
			} else {
				// check if file has been uploaded, if so get the file path
				$this->Session->setFlash('Debug Error: You reached this error because you did not upload a csv file');	
					//$this->redirect(array('action' => 'index'));
				}
				
			
			
			}
		
}
		public function export()
{
	$this->autoRender = false;
	
	ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

	//create a file
	//$filename = "export_".date("Y.m.d").".csv";
	$filename = "donors.csv";
	$csv_file = fopen('php://output', 'w');

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename="'.$filename.'"');

	//$results = $this->RjCase->query($sql);	// This is your sql query to pull that data you need exported
	//or
        $results = $this->Donor->find('all', array());

	// The column headings of your .csv fileDescription
	$header_row = array("emailAddress","organizationName","jobTitle","donorType","donorAmount","firstName", "lastName","dateOfBirth", "gender","streetAddress", "zipCode","city","state","phoneOne","phoneOneType","phoneTwo","phoneTwoType","donorNotes");
	fputcsv($csv_file,$header_row,',','"');

	// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
	foreach($results as $result)
	{
		// Array indexes correspond to the field names in your db table(s)
		$row = array( 
			$result['Donor']['emailAddress'],
			$result['Donor']['organizationName'],
			$result['Donor']['jobTitle'],
			$result['Donor']['donorType'],
			$result['Donor']['donorAmount'],
			$result['Donor']['firstName'],
			$result['Donor']['lastName'],
			$result['Donor']['dateOfBirth'],
			$result['Donor']['gender'],
			$result['Donor']['streetAddress'],
			$result['Donor']['zipCode'],
			$result['Donor']['city'],
			$result['Donor']['state'],
			$result['Donor']['phoneOne'],
			$result['Donor']['phoneOneType'],
			$result['Donor']['phoneTwo'],
			$result['Donor']['phoneTwoType'],
			$result['Donor']['donorNotes']
		);

		fputcsv($csv_file,$row,',','"');
	}

	fclose($csv_file);
	
	
	
}



}
?>