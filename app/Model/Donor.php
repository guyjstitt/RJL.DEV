<?php
class Donor extends AppModel {
    var $name = 'Donor';
	
    function import($filename) {
        // to avoid having to tweak the contents of
        // $data you should use your db field name as the heading name
        // eg: Donor.id, Donor.title, Donor.description
 
        // set the filename to read CSV from 
		$file = new File(WWW_ROOT ."/uploads/donors.csv");
		if($file->exists())
		{
        $filename = APP . WEBROOT_DIR. '/uploads' . DS . $filename;
       // die(debug($filename)); 
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
                    $data['Donor'][$head]=(isset($row[$k])) ? $row[$k] : '';
                }
            }
 
            // see if we have an id            
            $id = isset($data['Donor']['id']) ? $data['Donor']['id'] : 0;
 
            // we have an id, so we update
            if ($id) {
                // there is 2 options here,
                  
                // option 1:
                // load the current row, and merge it with the new data
                //$this->recursive = -1;
                //$Donor = $this->read(null,$id);
                //$data['Donor'] = array_merge($Donor['Donor'],$data['Donor']);
                 
                // option 2:
                // set the model id
                $this->id = $id;
            }
             
            // or create a new record
            else {
                $this->create();
            }
             
            // see what we have
             //debug($data);
             
            // validate the row
            $this->set($data);
			
            if (!$this->validates()) {
                $this->_flash('warning');
                $return['errors'][] = __(sprintf('Donor for Row %d failed to validate.',$i), true);
            }
			$error= '';
			
            // save the row
            if (!$error && !$this->save($data)) {
                $return['errors'][] = __(sprintf('Donor for Row %d failed to save.',$i), true);
            }
 
            // success message!
            if (!$error) {
                $return['messages'][] = __(sprintf('Donor for Row %d was saved.',$i), true);
            }
        }
         
        // close the file
        fclose($handle);
       $file = new File(WWW_ROOT ."/uploads/donors.csv");
	  if($file->delete()){
   echo "file deleted successfully";
}else{
   echo "file failed to be delete";
}
		// $filename->delete();
        // return the messages
        return $return;
        
	}
	else
 {echo "stop drop shut em down open up shop";
 }
		
    }
 
}