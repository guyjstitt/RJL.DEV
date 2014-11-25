<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $helpers = array('Js');
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'home','action' => 'index'),
            'logoutRedirect' => array('controller' => 'Users','action' => 'login'),
			'authError'=>"You do not have permission to access this page, are you logged in?",
			'authorize' => array('Controller') // Added this line
        )
    );
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['username'])) {
			//die(debug($this->params->url));
			//if($user['role'] != 'admin' && (in_array($this->params->url,array('Users','Donors'),false)))
			$search= "|".$this->params['controller'].$this->params['action']."|";
			//list of approved controllers and actions.  Start the list with ||
			$approvedFacilitator = "||homeindex|RjCasesView|Facilitatorsindex|Notes|facilitatorsdownload|userslogout|userslogin|OffendersView|VictimsView|Contactdownload|";
			//Case Managers & Admins have access to facilitator areas plus the ones below
			$approvedCaseMgr = "||RjCasesIndex|RjCasesAdd|RjCasesedit|Victimsindex|Victimsadd|Victimsedit|Offendersedit|Offendersindex|Offendersadd|Offendersview|Contactdownload|";
			//Case Managers have access to the same as facilitators, case mgrs, and the ones below
			$approvedCaseAdmin = "||RjCasesIndex|RjCasesAdd|RjCasesedit|RjCasesview|Victimsindex|Victimsadd|Victimsedit|Victimsview|Offendersindex|Offendersadd|OffendersView|Volunteersindex|Volunteersadd|Volunteersedit|Volunteersview|Contactdownload|";
			if($user['role'] != 'admin' && (stripos($approvedFacilitator,$search)==false))
			{
				if(($user['role'] != 'caseadmin' || $user['role'] != 'casemanager' ) && (!stripos($approvedCaseMgr,$search)==false))
				{
					//Case Admin Override
					return true;
				}
				if(($user['role'] != 'casemanager' ) && (!stripos($approvedCaseAdmin,$search)==false))
				{
					//Case Admin Override
					return true;
				}
				//deny not allowed
				$this->Session->setFlash($search." Is not allowed for  ".$user['role']);
				return false;
			}
			return true;
		}

		// Default deny
		return false;
	}
    public function beforeFilter() {
        $this->Auth->allow('login');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('cur_user', $this->Auth->user());
		return true;
    }
}
