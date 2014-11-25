<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author dp
 */
class HomeController extends AppController {
    //put your code here
    public function index()
    {
	
		
		
		$this->loadModel('RjCase');
		$this->loadModel('User');
		$this->loadModel('Victim');
		$this->loadModel('Offender');
		$this->loadModel('Message');
		$this->loadModel('Potential');
		$total= $this->RjCase->find('count');
		//$data = $this->RjCase->find('all');
		$adminMessages= $this->Message->find('all',array('conditions'=>array('Message.role'=>'admin')));
		$caseAdminMessages= $this->Message->find('all',array('conditions'=>array('Message.role'=>'caseadmin')));
		$caseManagerMessages= $this->Message->find('all',array('conditions'=>array('Message.role'=>'casemanager')));
		$facilitatorMessages= $this->Message->find('all',array('conditions'=>array('Message.role'=>'facilitators')));
		$potentialNotViewed = $this->Potential->find('all',array('conditions'=>array('Potential.seen'=>NULL,'Potential.seen'=>'Not Viewed')));
		$potentialvols = $this->Potential->find('all');
		$potentialVolCount = $this->Potential->find('count',array('conditions'=>array('Potential.seen'=>NULL,'Potential.seen'=>'Not Viewed')));
		$potentialVolNotContacted = $this->Potential->find('count',array('conditions'=>array('Potential.seen'=>NULL,'Potential.seen'=>'Not Viewed')));
		
		$openPending=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Open - Pending')));
		$openMonitoring=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Open - Monitoring')));
		$closedSuccessful=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Closed - Successful')));
		$closedUnsuccessful=$this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus'=>'Closed - Unsuccessful')));
		$casesClosed = $this->RjCase->find('count', array('conditions'=>array('RjCase.caseStatus' => 'Closed')));
		$zip1=$this->Victim->find('count', array('conditions'=>array('Victim.zipCode'=>'40214')));
		$zip2=$this->Victim->find('count', array('conditions'=>array('Victim.zipCode'=>'40109')));
		$zip3=$this->Victim->find('count', array('conditions'=>array('Victim.zipCode'=>'40165')));
		$zip4=$this->Victim->find('count', array('conditions'=>array('Victim.zipCode'=>'40209')));
		$male = $this->RjCase->Victim->find('count', array(
        'conditions' => array('Victim.gender' => 'Male')));
		$female = $this->RjCase->Victim->find('count', array(
        'conditions' => array('Victim.gender' => 'Female')));

				//if potential volunteer has seen value of null/ set flash new volunteer has been added
		
		$potentialVolString = String::insert(':count new potential volunteers have been added', array('count' => $potentialVolCount));
		$potentialVolString1= String::insert(':count new potential volunteer has been added', array('count' => $potentialVolCount));
		$potentialVolStringContacted= String::insert(':contact potential volunteers have been viewed, but not contacted', array('count' => $potentialVolCount,'contact' =>$potentialVolNotContacted));
		
		
		$uid = $this->Session->read('Auth.User.role');
		//die(debug($uid));
		$this->set('uid',$uid);
		
		if($uid !== 'facilitator')
		{
		if(!empty($potentialNotViewed))
		{
			if($potentialVolNotContacted>1)
			{
			$this->Session->setFlash($potentialVolString);
			}
			else
			{
			if($potentialVolCount ==1) {
			
			$this->Session->setFlash($potentialVolString1);
			
			}
			
		}
		}
		}
		
		
		
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
                'VictimJoin.case_id = RjCase.id'
            )
        )
		
    ),
    'fields' => array('OffenderJoin.*','VictimJoin.*', 'RjCase.*'),
));
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
	//die(debug($data));
	$this->set('items',$data);
		//die(debug($adminMessages));
		$info = array(
		'zip1'=>$zip1,
		'zip2'=>$zip2,
		'zip3'=>$zip3,
		'zip4'=>$zip4,
		'total' => $total,
		'male'=>$male,
		'female'=>$female,
		'adminMessages'=>$adminMessages,
		'caseAdminMessages'=>$caseAdminMessages,
		'caseManagerMessages'=>$caseManagerMessages,
		'facilitatorMessages'=>$facilitatorMessages,
		'potentialNotViewed'=>$potentialNotViewed,
		'potentialvols'=>$potentialvols,
		'openPending'=>$openPending,
		'openMonitoring'=>$openMonitoring,
		'closedSuccessful'=>$closedSuccessful,
		'closedUnsuccessful'=>$closedUnsuccessful,
		'casesClosed'=>$casesClosed,
		'activeTab'=>'Dashboard');
		$this->set($info);
		$this->set('message', $this->Message->findByid());
		$this->set('potential', $this->Potential->findByid());
		$this->set('case', $this->RjCase->findByid());
		$this->RjCase->recursive = 0;
		$this->set('user', $this->User->read());
		
		
		
    }
}
