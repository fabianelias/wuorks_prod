<?php
 
/*******************************************************************************
 * 
 *              Controlador Home, para vistas principales
 * 
 ******************************************************************************/

Class Home extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library("Head_files");
        $this->load->library("Curl");
        
        $this->key_wuorks = "WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        
        //error_reporting(0);
        
    }
    
    /***************************************************************************
     * @index(), función que carga vista principal.
     **************************************************************************/
    
    public function index(){
        
        $data["titulo"] = "Wuorks el profesional que necesitas ";
        $data["files"]  = $this->head_files->home();
        
        //Carga regiones
        $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
        $data["regiones"] = json_decode($this->curl->execute(),true);
        
        $this->load->view("includes/head", $data);
        $this->load->view("includes/nav_view");
        $this->load->view("home/home_view", $data);
        $this->load->view("includes/footer");
    }
}