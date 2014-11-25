<?php
class Event extends AppModel {
    var $name = 'Event';
	
    function import($filename) {
        // to avoid having to tweak the contents of
        // $data you should use your db field name as the heading name
        // eg: Event.id, Event.title, Event.description
 
 
			$file = new File(WWW_ROOT ."/uploads/events.csv");
		if($file->exists())
		{
        // set the filename to read CSV from
        $filename = APP . WEBROOT_DIR. '/uploads' . DS . $filename;
         
        // open the file
        $handle = fopen($filename, "r");
         
        // read the 1st row as headings
        $header = fgetcsv($handle);
         
        // create a message container
        $return = array(
            'messages' => array(),
            'errors' => array(),
        );
		$i='0';
        // read each data row in the file
        while (($row = fgetcsv($handle)) !== FALSE) {
            $i++;
            $data = array();
 
            // for each header field
            foreach ($header as $k=>$head) {
                // get the data field from Model.field
                if (strpos($head,'.')!==false) {
                    $h = explode('.',$head);
                    $data[$h[0]][$h[1]]=(isset($row[$k])) ? $row[$k] : '';
                }
                // get the data field from field
                else {
                    $data['Event'][$head]=(isset($row[$k])) ? $row[$k] : '';
                }
            }
 
            // see if we have an id            
            $id = isset($data['Event']['id']) ? $data['Event']['id'] : 0;
 
            // we have an id, so we update
            if ($id) {
                // there is 2 options here,
                  
                // option 1:
                // load the current row, and merge it with the new data
                //$this->recursive = -1;
                //$Event = $this->read(null,$id);
                //$data['Event'] = array_merge($Event['Event'],$data['Event']);
                 
                // option 2:
                // set the model id
                $this->id = $id;
            }
             
            // or create a new record
            else {
                $this->create();
            }
             
            // see what we have
            debug($data);
             
            // validate the row
            $this->set($data);
			
            if (!$this->validates()) {
                $this->_flash('warning');
                $return['errors'][] = __(sprintf('Event for Row %d failed to validate.',$i), true);
            }
			$error= '';
			
            // save the row
            if (!$error && !$this->save($data)) {
                $return['errors'][] = __(sprintf('Event for Row %d failed to save.',$i), true);
            }
 
            // success message!
            if (!$error) {
                $return['messages'][] = __(sprintf('Event for Row %d was saved.',$i), true);
            }
        }
         
        // close the file
        fclose($handle);
         
		 $file = new File(WWW_ROOT ."/uploads/events.csv");
		if($file->delete()){
		echo "file deleted successfully";
		}else{
				echo "file failed to be delete";
			}
        // return the messages
        return $return;
         
    }
	
	else
 {echo "stop drop shut em down open up shop";
 }
 }
}