<?php

/*******************************************************************************
 * 
 *               Controlador para vistas de perfil de usuarios
 * 
 ******************************************************************************/

Class Wuokers extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library("curl");
        $this->load->library("head_files");
        
        $this->key_wuorks = "WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        
        error_reporting(0);
        
    }
    
    /***************************************************************************
     * @u(), función para visualizar perfil de usuario profesional
     **************************************************************************/
    
    public function u($nameUser = '', $namePro = '', $keyPro = ''){
        $wuork_key      = "";
        $key_profession = "";
        
        if($this->input->post("wuorks_key")){
            $wuork_key = $this->input->post("wuorks_key");
        }else{
            $wuork_key = $_GET["wk"];
        }
        if($this->input->post("key_profession")){
            $key_profession = $this->input->post("key_profession");
        }else{
            $key_profession = $keyPro;
        }
        
        $this->curl->create($this->api_url."profession/infoProfession/wuorks_key/".$wuork_key."/key_profession/".$key_profession."/key/".$this->key_wuorks);
       
       // $data["infoUser"] = json_decode($this->curl->execute(),true);
        $result = json_decode($this->curl->execute(),true);
        if($result){
            $data["titulo"] = "Wuorks el profesional que necesitas";
            $data["files"] = $this->head_files->wuokers();

            $data["infoUser"] = $result;

            $this->load->view("includes/head",$data);
            $this->load->view("includes/nav_view");
            $this->load->view("wuokers/wuokers_view",$data);
            $this->load->view("includes/footer");
        }else{
            
            $data["titulo"] = "Página no encontrada, Wuorks.com";
            //Carga regiones
            $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
            $data["regiones"] = json_decode($this->curl->execute(),true);

            $this->load->view("includes/head",$data);
            $this->load->view('errors/error_404_wuorks_view');
            $this->load->view("includes/footer");
                
        }
        
    }
    
    /***************************************************************************
     * @c(), función para visualizar perfil de usuario empresa
     **************************************************************************/
    
    public function c($nameUser = '', $namePro = '', $keyPro = ''){
        
       
            
            $wuork_key      = "";
            $key_profession = "";

            if($this->input->post("wuorks_key")){
                $wuork_key = $this->input->post("wuorks_key");
            }else{
                $wuork_key = $_GET["wk"];
            }
            if($this->input->post("key_profession")){
                $key_profession = $this->input->post("key_profession");
            }else{
                $key_profession = $keyPro;
            }
            
            $this->curl->create($this->api_url."company/company_info/wuorks_key/".$wuork_key."/key_company/".$key_profession."/key/".$this->key_wuorks);
        
            $results = json_decode($this->curl->execute(),true);
            
            if($results){
                
                $data["titulo"] = "Wuorks el profesional que necesitas";
                $data["files"] = $this->head_files->wuokers();

                $data["infoUser"] = $results;

                $this->load->view("includes/head",$data);
                $this->load->view("includes/nav_view");
                $this->load->view("wuokers/wuokers_company_view",$data);
                $this->load->view("includes/footer");
            }else{
                
                $data["titulo"] = "Página no encontrada, Wuorks.com";
                //Carga regiones
                $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
                $data["regiones"] = json_decode($this->curl->execute(),true);
                
                $this->load->view("includes/head",$data);
                $this->load->view('errors/error_404_wuorks_view');
                $this->load->view("includes/footer");
                
            }
            
    }
    
    
    
    /***************************************************************************
     * @contract(), función para realizar un contrato entre las partes.
     **************************************************************************/
    public function contract(){
        
        if(!$this->input->post('contract')){
            
            //Prefijo pro: profesional a contratar, yo: es yo :)
            
            $pro = explode("/", $this->input->post("wk"));
            $pro_wk = $pro[1];  //key del usuario
            $pro_id = $pro[0];  //id del usuario
            $pro_pk = $this->input->post("pk");  //key de la profesiòn
            $pro_pf = $this->input->post("pf");
            $return_url = $this->input->post("return"); //url de retorno.
            
            $yo_key = $this->session->userdata("wuorks_key");
            //creamos el contrato
            $this->curl->create($this->api_url."contracts/create_contract/key_employee/".$pro_wk."/key_employer/".$yo_key."/key_service/".$pro_pk."/nomProf/".$pro_pf."/key/".$this->key_wuorks);
            
            $contract = $this->curl->execute();
            
            if($contract){
                
                $this->session->set_flashdata("mensajes","Usuario contratado, se te ha enviado un email.");
                
                redirect($return_url."?wk=$pro_wk","refresh");
            
            }else{
                $this->session->set_flashdata("mensajes","Error, intentelo más tarde");
                redirect($return_url."?wk=$pro_wk","refresh");
            }
            
        }else{
            redirect(base_url());
        }
    } 
    
    /***************************************************************************
     * @pass(), función para recuperar contraseña.
     **************************************************************************/
    public function pass(){
        
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["files"] = $this->head_files->wuokers();
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("wuokers/recuperar_pass_view",$data);
        //$this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @password(), funcion para enviar nuevo email con password
     **************************************************************************/
    public function password(){
        
        $this->form_validation->set_rules("email","email","required|valid_email");
        $this->form_validation->set_message("required","%s es obligatorio");
        $this->form_validation->set_message("valid_email","%s incorrecto");
        
        if($this->form_validation->run() != FALSE){
            
            $email = $this->input->post("email");
            
            $data = array("email" => $email);
            
            $ch = curl_init($this->api_url."user/recu_pass/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $result = curl_exec($ch);
            curl_close($ch);
            
            $result = json_decode($result,true);
           
            if($result){
                
                $this->session->set_flashdata("error_2","Se ha enviado un email con la instrucciones :).");
                redirect(base_url()."wuokers/pass/","refresh");
                
            }else{
                $this->session->set_flashdata("error_1","El email ingresado no existe :(.");
                redirect(base_url()."wuokers/pass/","refresh");
            }
        }else{
            $this->pass();
        }
    }
    
    
    public function new_password($token, $password, $email ){
        
        $email = str_replace("%40", "@", $email);
        //existe el token y esta en estado 0;
        
        $this->curl->create($this->api_url."user/verify_token/token/".$token."/key/".$this->key_wuorks);
        $paso1= $this->curl->execute();
        
        if($paso1){
            $dataAcceso = array(
                'email'    => $email,
                'password' => $password
            );
            
            //validar si el usuario esta dado de alta
            
            $ch = curl_init($this->api_url."login/login/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($dataAcceso));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                 $info = json_decode($result,true);
                 $this->session->set_userdata($info['data'][0]);
                redirect(base_url()."profile/recu_pass?q=".$token);
            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
        
    }
}