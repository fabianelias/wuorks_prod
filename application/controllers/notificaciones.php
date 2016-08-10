<?php

Class Notificaciones extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        //$this->very_sesion();
        
        $this->load->helper(array('form'));
        
        $this->load->library("head_files");
        $this->load->library("curl");
        
        $this->key_wuorks = "WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        
        error_reporting(0);
    }
    function very_sesion(){
            if(!$this->session->userdata('id_user')){
                    redirect(base_url().'oauth/in');
            }
    }
    
    
    public function index(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "perfil";
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view('notify/notificaciones_view');
        $this->load->view("includes/footer");
        
    }
}