<?php
/*******************************************************************************
 * 
 * 
 *  
 ******************************************************************************/

Class Jobs extends CI_Controller{
    
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
    
    /***************************************************************************
     * @index(), función principal para vista de aviso miniJobs
     **************************************************************************/
    public function index(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "profession";
        
        //Obtengo todos los miniJobs
        $this->curl->create($this->api_url."job/getJobs/key/".$this->key_wuorks);
        $data["jobs"]   = json_decode($this->curl->execute(),true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view('jobs_public/all_jobs_view');
        $this->load->view("includes/footer");
    }
    
    /***************************************************************************
     * @postular()
     **************************************************************************/
    public function aplicar($key_aviso, $key_user = ""){
       
        $key_user = $this->session->userdata('wuorks_key');
        
        if(!empty($key_user)){
            
            $this->curl->create($this->api_url."job/aplicar/key_aviso/".$key_aviso."/key_user/".$key_user."/key/".$this->key_wuorks);
            $aplica = json_decode($this->curl->execute(),true);
            if($aplica){
                echo "success"; 
            }else{
                echo "error";
            }
        }else{
            echo "error_1";
        }
    }
}