<?php

/**
 * Description of UsersController
 *
 * @author dp
 */
class UsersController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add');
	}
    public function index() {
		$users = $this->User->find('all');
		$this->set('users',$users);
    }
	public function login(){
		if($this->request->is('post')){
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
			}else{
				$this->Session->setFlash("Your username/password combination was incorrect");
			}
		}
	}
	public function logout(){
		$this->redirect($this->Auth->logout());
	}
    public function view($id = null) {
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		if (!$id) {
			$this->Session->setFlash('Invalid user');
			$this->redirect(array('action' => 'login'));
		}
		$this->set('user', $this->User->read());
    }

    public function add() {
        if (!$this->request->is('post')) {
			$roleOptions = $this->User->getColumnType('role');
			preg_match_all("/'(.*?)'/", $roleOptions, $Roles);
			$this->User->Person->create();
			$genderOptions = $this->User->Person->getColumnType('gender');
			preg_match_all("/'(.*?)'/", $genderOptions, $Genders);
			$Role = $Roles[1];
			$Gender = $Genders[1];
			$this->set(array( 'Role' => compact('Role'),'Gender' => compact('Gender')));
		}
		else{
			$this->User->create();
			$roleOptions = $this->User->getColumnType('role');
			preg_match_all("/'(.*?)'/", $roleOptions, $enums);
			$genderOptions = $this->User->Person->getColumnType('gender');
			preg_match_all("/'(.*?)'/", $genderOptions, $enumsGender);
			$this->request->data['User']['role'] = $enums[1][$this->request->data['User']['role']];
			//die(debug($enumsGender));
			//$this->request->data['Person']['gender'] = $enumsGender[1][$this->request->data['Person']['gender']];
            if ($this->User->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }else
			{
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
        }
    }

    public function edit($id = null) {
		$this->User->id=$id;
        if ($this->request->is('post') || $this->request->is('put')) {
			$roleOptions = $this->User->getColumnType('role');
			preg_match_all("/'(.*?)'/", $roleOptions, $enums);
			$this->request->data['User']['role'] = $enums[1][$this->request->data['User']['role']];
			if ($this->User->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
			$this->User->id=$id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
			
			$roleOptions = $this->User->getColumnType('role');
			preg_match_all("/'(.*?)'/", $roleOptions, $enums);
			$enum = $enums[1];
			$this->set(compact('enum'));
        }
		/*
				
		$key = $this->User->find('list', array(
		'fields' => array('User.password'),
		'conditions' => array('User.id' =>$id)));
		//die(debug($key));
		
		$user = $this->User->find('first', array (
		'fields' => array('User.password'),
		'conditions' => array('User.id' =>$id)));
		
		$cipher = $user['User']['password'];
		
		$password = Security::decrypt($cipher, $key);
		
		$this->set('password', $password);
		*/
		
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}