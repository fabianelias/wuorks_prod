<?php

/*******************************************************************************
 * 
 *  Controlador para vista de primer ingreso a la app
 *  mini tutorial de en que lo beneficia estar el wuorks
 *  etc.
 * 
 ******************************************************************************/


Class Hello extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        $this->load->library("head_files");
        $this->load->library("curl");
        
        $this->key_wuorks = $this->session->userdata("key");//"WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        $this->id_user    = $this->session->userdata("id_user");
        
        error_reporting(0);
        
        $this->very_sesion();
        $this->very_tuto();
        
    }
    
    function very_sesion(){
        if(!$this->session->userdata('id_user')){
                redirect(base_url().'oauth/in');
        }
    }
    public function very_tuto(){
        if($this->session->userdata('tuto')==1){
                redirect(base_url().'profile');
        }
    }
    public function index(){
        $this->step_1();
    }
    /***************************************************************************
     * @step_1(), paso uno, darle la bienvenida a wuorks
     **************************************************************************/
    public function step_1(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $this->load->view('includes/head',$data);
        $this->load->view('includes/nav_empty',$data);
        $this->load->view('hello/step_1_view',$data);
        
    }
    /***************************************************************************
     * 
     **************************************************************************/
    public function step_2(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $this->load->view('includes/head',$data);
        $this->load->view('includes/nav_empty',$data);
        $this->load->view('hello/step_2_view',$data);
        
    }
    /***************************************************************************
     * 
     **************************************************************************/
    public function step_3(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $this->load->view('includes/head',$data);
        $this->load->view('includes/nav_empty',$data);
        $this->load->view('hello/step_3_view',$data);
        
        
    }
    /***************************************************************************
     * @ready(): función final del tuto redirije a crear profesion o empresa.
     **************************************************************************/
    public function ready(){
        
        //1.- REALIZAMOS UNA LLAMADA AL API PARA CAMBIAR EL ESTADO
        // Y NO MOSTRAR MÁS EL TUTO
        $this->curl->create($this->api_url."user/tuto_off/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $res = json_decode($this->curl->execute(),TRUE);
        
        $this->session->set_userdata("tuto",1);
        
        if($this->session->userdata("user_type") == 1){
            //Profesión
            redirect(base_url()."profile/profession","refresh");
        }else{
            //Empresa
            redirect(base_url()."profile/company","refresh");
        }
    }
}