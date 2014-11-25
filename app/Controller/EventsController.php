<?php
class EventsController extends AppController {
    var $name = 'Events';
 
    function import() {
       
	   $this->redirect(array('action' => 'index'));
    }
	
	function truncate() {
	
	$this->Event->query('TRUNCATE events;');
	$this->Session->setFlash('The table has been cleared');
	$this->redirect(array('action' => 'index'));
	
	}
	
		public function view($eventId) {
	
        $this->set('activeTab','admin'); 
		//$this->convertDatesBack( $this->request->data['Victim'] );
        if (!$eventId) {
		 
		
            $this->Session->setFlash('Invalid event');
            $this->redirect(array('action' => 'index'));
        }
		$this->set('event', $this->Event->findByid($eventId));
	}
	
	public function delete($eventId = null)
             {
        		$this->set('activeTab','events'); 
                if (!$eventId) {
                $this->Session->setFlash('Invalid id for event');
                $this->redirect(array('action' => 'index'));
                }
                if ($this->Event->delete($eventId)) {
                $this->Session->setFlash('Event deleted');
                } else {
                $this->Session->setFlash(__('Event was not deleted',
                true));
                }
                $this->redirect(array('action' => 'index'));
             }
	
	public function add()
             {

        			$this->set('activeTab','events'); 
                    if (!empty($this->data)) {
                    $this->Event->create($this->data);
                    if ($this->Event->save()) {
                    $this->Session->setFlash('The event has been saved');
                    $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Session->setFlash
                    ('The event could not be saved. Please, try again.');
                    }
                    }
            }
	
		
	public function edit($eventId= null) {
	
	$this->Event->id = $eventId;
	
	 if (!$eventId && empty($this->data)) {
                        $this->Session->setFlash('Invalid event');
                        $this->redirect(array('action' => 'index'));
                    }
                    if (!empty($this->data)) {
                        if ($this->Event->save($this->data)) {
                            $this->Session->setFlash('The event has been saved');
                            $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Session->setFlash('The event could not be saved. Please, try again.');
                        }
                    }
                    if (empty($this->data)) {
                        $this->data = $this->Event->read(null, $eventId);
                    }
	}
	
	
	 public function index() 
        { 
        	$this->set('activeTab','admin');  
            $events = $this->Event->find('all');
            $this->set('events', $events);
			$numOfDonations= $this->Event->find('count');
		 	$this->set($numOfDonations);
		
		
		$this->loadModel('Contact');
		if ($this->request->is('post')) {
		
		
		$file = new File(WWW_ROOT ."/uploads/events.csv");
		if($file->delete()){
			echo "file deleted successfully";
		}else{
			echo "file failed to be delete";
		}
			// create
			$this->Contact->create();
			
			// attempt to save
			$this->Contact->id = 29;
			//conditional validation
			 $this->Contact->validate = $this->Contact->validateEvents;
			 
		if ($this->Contact->save($this->request->data)) {
			$file = new File(WWW_ROOT ."/uploads/events.csv");
		if($file->exists())
		{
				$messages = $this->Event->import('events.csv');
				//die(debug($messages));
				$this->Session->setFlash('Your file has been imported into the table');
				$this->redirect(array('action' => 'index'));

			// form validation failed
			
			}
			else
			
			{
			$this->Session->setFlash('Only events.csv allowed ya punk');
			}
			} else {
				// check if file has been uploaded, if so get the file path
				$this->Session->setFlash('Only events.csv allowed');	
				}
				
			
			
			}
			
		
		
				$this->Event->virtualFields['total']= 'SUM(Event.totalDonations)';
			$totalDonations= $this ->Event->find('first',array('fields' => array('total')));

			$this->Event->virtualFields['totalCost']= 'SUM(Event.eventCost)';
			$totalCost= $this ->Event->find('first',array('fields' => array('totalCost')));
			
			$this->Event->virtualFields['breakEven']= '(SUM(Event.totalDonations) - SUM(Event.eventCost))';
			$breakEven= $this ->Event->find('first',array('fields' => array('breakEven')));
			
			//avg number of attendees
				$this->Event->virtualFields['avgAttend']= '(Sum(Event.numOfAttendees) / Count(Event.eventName))';
			$avgAttend= $this ->Event->find('first',array('fields' => array('avgAttend')));
			
			//the max donation
			$this->Event->virtualFields['avgDonation']= 'Avg(Event.totalDonations)';
			$avgDonation= $this ->Event->find('first',array('fields' => array('avgDonation')));
			
			//min donation
			$this->Event->virtualFields['minDonation']= 'Min(Event.totalDonations)';
			$minDonation= $this ->Event->find('first',array('fields' => array('minDonation')));
			
			//average donation
			$this->Event->virtualFields['avgDonationAmount']= '(Sum(Event.totalDonations) / Sum(Event.numOfAttendees))';
			$avgDonationAmount= $this ->Event->find('first',array('fields' => array('avgDonationAmount')));
			
			
			//avg num of donation per person
			$this->Event->virtualFields['avgNumDonation']= '(Sum(Event.numOfDonations) / Sum(Event.numOfAttendees))';
			$avgNumDonation= $this ->Event->find('first',array('fields' => array('avgNumDonation')));
			
			
			$this->set('avgAttend',$avgAttend);
			$this->set('totalDonations',$totalDonations);
			$this->set('totalCost',$totalCost);
			$this->set('breakEven',$breakEven);
			
			
			
			//Second bar chart
			$this->set('avgDonation',$avgDonation);
			$this->set('minDonation',$minDonation);
			$this->set('avgNumDonation',$avgNumDonation);
			//die(debug($avgDonationAmount));
			$this->set('avgDonationAmount',$avgDonationAmount);
		}   


		
		public function export()
{
	$this->autoRender = false;
	
	ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

	//create a file
	//$filename = "export_".date("Y.m.d").".csv";
	$filename = "event.csv";
	$csv_file = fopen('php://output', 'w');

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename="'.$filename.'"');

	//$results = $this->RjCase->query($sql);	// This is your sql query to pull that data you need exported
	//or
        $results = $this->Event->find('all', array());

	// The column headings of your .csv fileDescription
	$header_row = array("eventID","eventType","eventName","eventDate", "eventCost","numOfAttendees", "numOfDonations","totalDonations",);
	fputcsv($csv_file,$header_row,',','"');

	// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
	foreach($results as $result)
	{
		// Array indexes correspond to the field names in your db table(s)
		$row = array(
			$result['Event']['id'],
			$result['Event']['eventType'],
			$result['Event']['eventName'],
			$result['Event']['eventDate'],
			$result['Event']['eventCost'],
			$result['Event']['numOfAttendees'],
			$result['Event']['numOfDonations'],
			$result['Event']['totalDonations'],
	
		);

		fputcsv($csv_file,$row,',','"');
	}

	fclose($csv_file);
}


public function word ()
{
	//$this->autoRender = false;
$name = $this->Event->find('first', array('fields'=>array('Event.eventName')));

//die(debug($name));
$this->set('name',$name);
  $file = new File(APP.'webroot'.DS.'css'.DS.'print.css', true); //1
   
	
   $this->set('inlineCss',$file->read()); //2
    $file->close(); 
    //$this->layout = "word";
    //Configure::write('debug',0);

}


// Export Function (pdf, excle, doc )
function exportall($file_type, $filename, $html)
    {    
        
        if($file_type == 'word')
        {                
            $file = $filename.".doc";
            header("Content-Type: application/msword; charset=ISO-8859-1");
            header("Content-Disposition: filename=\""."Conference Report2".".doc"); 
            echo $html;
                  die();
        }
		
	$file_type = 'doc';
$filename = 'ConferenceReport';
$html =  '<html><body>'.  '<p>Put your html here, or generate it with your favourite '.   'templating system.</p>'.  '</body></html>'; 

$this->exportall($file_type, $filename, $html);
 
        
    }


/*
public function word () {
header(“Expires: Mon, 26 Jul 2020 05:00:00 GMT”);
header(“Last-Modified: ” . gmdate(“D, d M Y H:i:s”) . ” GMT”);
header(“Cache-Control: no-store, no-cache, must-revalidate”);
header(“Cache-Control: post-check=0, pre-check=0″, false);
header(“Pragma: no-cache”);

header(“Content-Type: application/msword; charset=ISO-8859-1″);
header(“Content-Disposition: attachment; filename=\”.<your file name>.”.doc”);

echo “<html><head><title> Cakephp  docx file</title><body>”;

echo “<your html code here>”;
echo “</body></html>;


}
function generateDocsFromTemplate(){
    $template = fopen($templatePath, "r");
    $contents = fread($template, filesize($templatePath));
    // This block takes care of matching the length mismatch
    // Always make sure the replacement code in the template
    // is longer than the new string.
    $clientCodeLength = strlen($clientCode);
    $replacementLength = strlen($stringToReplace);
    $difference = $replacementLength - $clientCodeLength;
    for( $i=0; $i<$difference; $i++ ) {
        $clientCode .= chr(0);
    }
    $newcont = str_replace( $stringToReplace, $replacementString, $contents );
    $outputFileName = $newFileName . '.doc'; // Extension can be (.docx)
    file_put_contents( $outputFileName, $newcont);
    fclose( $template );
}

*/
}
?>