<?php
class VolunteersController extends AppController {
    public $components = array('Session');
	
    public function updated() {
	} 
        public function index() 
        {

        	$this->set('activeTab','volunteers');  
            $volunteers = $this->Volunteer->find('all');
            $this->set('volunteers', $volunteers);
			
			  /*if($this->RequestHandler->responseType() == 'json') {
            $this->paginate = array(
                'fields' => array('Volunteer.volunteerID', 'Volunteer.backgroundCheckStatus', 'Volunteer.firstName','Volunteer.lastName','Volunteer.dateOfBirth','Volunteer.gender','Volunteer.zipCode'));
            $this->set('volunteers', $this->DataTable->getResponse());
            $this->set('_serialize','volunteers');*/
        
         }
		 
		 public function noJsonHandler(){
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $this->paginate = array(
                'fields' => array('Volunteer.volunteerID', 'Volunteer.backgroundCheckStatus', 'Volunteer.firstName', 'Volunteer.lastName')
                );

            $this->DataTable->fields = array('Volunteer.volunteerID', 'Volunteer.backgroundCheckStatus', 'Volunteer.firstName', 'Volunteer.lastName');
            $this->DataTable->emptyElements = 1;
            echo json_encode($this->DataTable->getResponse());
        }
    }
		public function event()
        {

        	$this->set('activeTab','events');
         }

    
            public function add()
             {

        			$this->set('activeTab','volunteers'); 
                    if (!empty($this->data)) {
                    $this->Volunteer->create($this->data);
                    if ($this->Volunteer->save()) {
                    $this->Session->setFlash('The volunteer has been saved');
                    $this->redirect(array('action' => 'add'));
                    } else {
                    $this->Session->setFlash
                    ('The volunteer could not be saved. Please, try again.');
                    }
                    }
					$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
			//die(debug($cases));
		$this->set('states',$states);
            }
                
             
            public function delete($volunteerID = null)
             {
        		$this->set('activeTab','volunteers'); 
                if (!$volunteerID) {
                $this->Session->setFlash('Invalid id for volunteer');
                $this->redirect(array('action' => 'index'));
                }
                if ($this->Volunteer->delete($volunteerID)) {
                $this->Session->setFlash('Volunteer deleted');
                } else {
                $this->Session->setFlash(__('Volunteer was not deleted',
                true));
                }
                $this->redirect(array('action' => 'index'));
             }



            function edit($volunteerID = null) {
                    if (!$volunteerID && empty($this->data)) {
                        $this->Session->setFlash('Invalid Volunteer');
                        $this->redirect(array('action' => 'index'));
                    }
                    if (!empty($this->data)) {
                        if ($this->Volunteer->save($this->data)) {
                            $this->Session->setFlash('The volunteer has been saved');
                            $this->redirect(array('action' => 'view',$volunteerID));
                        } else {
                            $this->Session->setFlash('The volunteer could not be saved. Please, try again.');
                        }
                    }
                    if (empty($this->data)) {
                        $this->data = $this->Volunteer->read(null, $volunteerID);
                    }
					$this->loadModel('State');
					$states = $this->State->find('list' ,array(
				'fields' => array('State.state')));
			//die(debug($cases));
		$this->set('states',$states);
                }
                
    function view($volunteerID) {

        $this->set('activeTab','volunteers'); 
        if (!$volunteerID) {
            $this->Session->setFlash('Invalid Volunteer');
            $this->redirect(array('action' => 'index'));
			//$this->set('volunteer', $this->Volunteer->findByVolunteerid($volunteerID));
        }
		//$this->set('volunteer', $this->Volunteer->find('first', array('volunteerID' => $volunteerID)));
       $this->set('volunteer', $this->Volunteer->findByVolunteerid($volunteerID));
    }
	
	public function export()
{
	$this->autoRender = false;
	
	ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

	//create a file
	//$filename = "export_".date("Y.m.d").".csv";
	$filename = "volunteers.csv";
	$csv_file = fopen('php://output', 'w');

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename="'.$filename.'"');

	//$results = $this->RjCase->query($sql);	// This is your sql query to pull that data you need exported
	//or
        $results = $this->Volunteer->find('all', array());

	// The column headings of your .csv fileDescription
	$header_row = array("backgroundCheck","firstName", "lastName");
	fputcsv($csv_file,$header_row,',','"');

	// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
	foreach($results as $result)
	{
		// Array indexes correspond to the field names in your db table(s)
		$row = array(
			$result['Volunteer']['backgroundCheckStatus'],
			$result['Volunteer']['firstName'],
			$result['Volunteer']['lastName']
		);

		fputcsv($csv_file,$row,',','"');
	}

	fclose($csv_file);
}

 var $name = 'Volunteers';
 
    function import() {
        $messages = $this->Volunteer->import('volunteers.csv');
        debug($messages);
    }
}
?>