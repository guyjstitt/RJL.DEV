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
class SettingsController extends AppController {
    //put your code here
    public function index()
    {
        $this->set('activeTab','Settings');        
    }
}
