<?php

/*******************************************************************************
 * 
 *              Contralador avanzado de busqueda de profesionales
 * 
 ******************************************************************************/


Class Search extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library("head_files");
        $this->load->library("curl");
        
        $this->key_wuorks = "WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        
        error_reporting(0);
        
    }
    
    /***************************************************************************
     * 
     *               Sección uno, localización del usuario
     * 
     **************************************************************************/
    
    /***************************************************************************
     * @index(), función principal de resultados.
     **************************************************************************/
    
    public function index(){
       
        $wuorks = $this->input->get("work_area");
        $wuorks = trim($wuorks);
        $wuorks = strtolower($wuorks);
        
        $region = $this->input->get("work_region");
        $region = trim($region);
        $region = strtolower($region);
        
        $data["wuorks"] = $wuorks;
        $data["region"] = $region;
        
        //Prepar llamada al api
        
       // $this->curl->create($this->api_url."search/search_wuorkers/wuork_area/".$wuorks."/region/".$region."/key/".$this->key_wuorks);
       //$results = $this->curl->execute();
        
        //$data["results"] = $results;
        //Carga regiones
        $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
        $data["regiones"] = json_decode($this->curl->execute(),true);
        
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["files"]  = $this->head_files->search();
        
        
        $this->load->view("includes/head", $data);
        $this->load->view("includes/nav_view");
        $this->load->view("search/search_view",$data);
      //  $this->load->view("includes/footer");
    }
    
    public function result(){
        $wuorks = $this->input->post("wuork_area");
        $wuorks = trim($wuorks);
        $wuorks = strtolower($wuorks);
        
        $region = $this->input->post("region");
        $region = trim($region);
        $region = strtolower($region);
        
        
        //Preparar llamada al API
        
        $dataBusqueda = array("wuork_area" => $wuorks,
                              "region"     => $region);
        
        $ch = curl_init($this->api_url."search/search_wuorkers_V2/key/".$this->key_wuorks);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($dataBusqueda));
        $results = curl_exec($ch);
        curl_close($ch);
        
        
        print_r($results);
        
    }
    
}
