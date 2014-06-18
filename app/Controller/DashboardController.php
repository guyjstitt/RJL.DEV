<?php

class DashboardController extends AppController {
    //put your code here
	
	
	
    public function index()
    {
		$uses = array('RjCase');
        $this->set('activeTab','Dashboard'); 
		
		$data = $this->set('cases', $this->RjCase->find('all'));
		
        $info = array(
            'items' => $data,
            'activeTab'=>'Dashboard');
        $this->set($info);    
    }
	
	public function view($caseID = NULL) {
		$uses = array('RjCase');
		$this->RjCase->read(NULL, $caseID);
		$this->set('case', $this->RjCase->read(NULL, $caseID));
		
		}
		
	}
?>
