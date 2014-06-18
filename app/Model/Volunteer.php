<?php
class Volunteer extends AppModel {

	 public $belongsTo = array(
        'State' => array(
            'className' => 'State',
            'foreignKey' => 'state'
        )
    );
	public $primaryKey = 'volunteerID';
	/*
	public $validate = array(
		'backgroundCheckStatus'=>array(
			'rule'=> 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter a background check status.'),
		'firstName'=>array(
			'rule'=> 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter a first name.'),
        'lastName' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a last name.'),
		'gender' => array(
            'rule' => 'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
            'message' => 'Please enter a gender.'),
		'streetAddress' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a street address.'),
		'zipCode' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a zip code.'),
		'city' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a city.'),
		'state' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a state.'),
		'email'=>array(
			'rule'=>array('email'),
			'required'=>false,
			'allowEmpty'=>true,
			'message'=>'Please enter a valid email address.'),
		'phoneOne' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a phone one number.'),
		'phoneOneType' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a phone one type.'),
		'phoneTwo' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a phone two.'),
		'phoneTwoType' => array(
            'rule' => 'notEmpty',
			'required'=>false,
			'allowEmpty'=>true,
            'message' => 'Please enter a phone two type.'),
    );
	*/
	var $name = 'Volunteer';
	
    function import($filename) {
        // to avoid having to tweak the contents of
        // $data you should use your db field name as the heading name
        // eg: Volunteer.id, Volunteer.title, Volunteer.description
 
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
                    $data['Volunteer'][$head]=(isset($row[$k])) ? $row[$k] : '';
                }
            }
 
            // see if we have an id            
            $id = isset($data['Volunteer']['id']) ? $data['Volunteer']['id'] : 0;
 
            // we have an id, so we update
            if ($id) {
                // there is 2 options here,
                  
                // option 1:
                // load the current row, and merge it with the new data
                //$this->recursive = -1;
                //$post = $this->read(null,$id);
                //$data['Volunteer'] = array_merge($post['Volunteer'],$data['Volunteer']);
                 
                // option 2:
                // set the model id
                $this->id = $id;
            }
             
            // or create a new record
            else {
                $this->create();
            }
             
            // see what we have
            // debug($data);
             
            // validate the row
            $this->set($data);
			
            
			
            // save the row
            if (!$error && !$this->save($data)) {
                $return['errors'][] = __(sprintf('Volunteer for Row %d failed to save.',$i), true);
            }
 
            // success message!
            if (!$error) {
                $return['messages'][] = __(sprintf('Volunteer for Row %d was saved.',$i), true);
            }
        }
         
        // close the file
        fclose($handle);
         
        // return the messages
        return $return;
         
    }
}
?>