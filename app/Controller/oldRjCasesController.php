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
class RjCasesController extends AppController {
    //put your code here
    public function index()
    {
        $this->set('activeTab','Cases'); 
	
    }
	
    public function view_all()
    {
        $data = $this->RjCase->find('all');
        $info = array(
            'items' => $data,
            'activeTab'=>'caseview');
        $this->set($info);        
    }
    public function add()
    {
	
	if($this->request->is('post')) 
	{
		if($this->RjCase->saveAll($this->data))
		{
			$this->Session->setFlash('The case was added successfully');
			$this->redirect(array('action'=>'index'));
		}
		else
		{
			$this->Session->setFlash('The case was not saved');
		}
	}
	
    }


    public function edit($caseID = null)
    {
        $this->set('activeTab','Cases'); 
		
		 if (!$caseID) {
        throw new NotFoundException(__('Invalid Case'));
    }

    $case = $this->RjCase->findByCaseid($caseID);
    if (!$caseID) {
        throw new NotFoundException(__('Invalid Case'));
    }
		if($caseID){
			//$case = $this->RjCase->findByCaseid($caseID);
			if($this->request->is(array('post','put'))){
				$this->RjCase->caseID=$caseID;
				if($this->RjCase->save($this->request->data)){
					$this->Session->setFlash(__('Case has been updated'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update case.'));
			}
			if(!$this->request->data){
				$this->request->data = $case;
			}
		}
    }

    public function edit2($caseID = null)
    {
        $this->set('activeTab','Cases');  
		if($caseID){
			$case = $this->RjCase->findByCaseid($caseID);
			if($this->request->is(array('post','put'))){
				$this->RjCase->caseID=$caseID;
				if($this->RjCase->save($this->request->data)){
					$this->Session->setFlash(__('Case has been updated'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update case.'));
			}
			if(!$this->request->data){
				$this->request->data = $case;
			}
		}
    }
	
	public function isAuthorized($user) {
		// All registered users can add cases
		if (in_array($this->action, array('add', 'edit'))) {
			return true;
		}
		// Only Admins can Delete
		if ($this->action === 'delete') {
			if (isset($user['role']) && $user['role'] === 'admin') {
				return true;
			}else
			{
				return false;
				$this->Session->setFlash(__('You do not have access'));
			}
		}

		return parent::isAuthorized($user);
	}
    
}