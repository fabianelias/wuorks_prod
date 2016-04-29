<?php

/* *****************************************************************************
 * 
 *              Controlador para cierre de sesión
 * 
 *******************************************************************************/

Class Logout extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('fbconnect');
        
        error_reporting(0);
        
    }
    public function index(){
        
        $this->session->sess_destroy();
        $this->fbconnect->destroySession();
	redirect(base_url(),'refresh');
    }
}