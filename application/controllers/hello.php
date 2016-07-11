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
        
        //Obtengo las regiones
        $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
        $data["regiones"] = json_decode($this->curl->execute(),true);
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $this->load->view('includes/head',$data);
        $this->load->view('includes/nav_empty',$data);
        $this->load->view('hello/step_3_view',$data);
        
        
    }
    public function step_4(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $address = $this->input->post("address");
        $region  = $this->input->post("region");
        $commune = $this->input->post("commune");
        $telefono = $this->input->post("cell_phone_number");
        
        $data = array(
            "address" => $address,
            "region"  => $region,
            "commune" => $commune,
            "telefono" => $telefono,
            "id_user" => $this->id_user
        );
        
        $ch = curl_init($this->api_url."user/edit_user_tuto/key/".$this->key_wuorks);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        $result = curl_exec($ch);
        curl_close($ch);

        $info = json_decode($result,true);
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $this->load->view('includes/head',$data);
        $this->load->view('includes/nav_empty',$data);
        $this->load->view('hello/step_4_view',$data);
        
        
    }
    /***************************************************************************
     * @ready(): función final del tuto redirije a crear profesion o empresa.
     **************************************************************************/
    public function ready($where = null ){
        
        //1.- REALIZAMOS UNA LLAMADA AL API PARA CAMBIAR EL ESTADO
        // Y NO MOSTRAR MÁS EL TUTO
        $this->curl->create($this->api_url."user/tuto_off/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $res = json_decode($this->curl->execute(),TRUE);
        
        $this->session->set_userdata("tuto",1);
        
        //Busca un wuokers
        if($where == 2){
            redirect(base_url()."search?utf8=✓&work_area=&work_region=13&btn-search=Buscar&token=52684b3357289d2e8b8087e2a59082f3","refresh");
        }
        
        //Quiere crear un perfil
        if($this->session->userdata("user_type") == 1){
            //Profesión
            redirect(base_url()."profile/profession","refresh");
        }else{
            //Empresa
            redirect(base_url()."profile/company","refresh");
        }
    }
}