<?php
/*******************************************************************************
 * 
 *                  Controlador para calificaciones
 * 
 ******************************************************************************/
Class Rating extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->very_sesion();
        
        $this->load->helper(array('form'));
        
        $this->load->library("head_files");
        $this->load->library("curl");
        
        
        $this->key_wuorks = $this->session->userdata("key");//"WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        $this->id_user    = $this->session->userdata("id_user");
        
        error_reporting(0);
        
    }
    
    function very_sesion(){
            if(!$this->session->userdata('id_user')){
                    redirect(base_url().'oauth/in');
            }
    }
    
    /***************************************************************************
     * @rating(), funcion para visualizar vista de calificaciones
     **************************************************************************/
    public function r($key_contract, $id, $type_user, $name_user){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $data["key_contract"] = $key_contract;
        $data["name_user"]    = $name_user;
        $data["type_user"]    = $type_user;
        $data["id_service"]   = $id;
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("contract/rating_view",$data);
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @ratingexe(), funcion para guardar la calificacion
     **************************************************************************/
    public function ratingexe(){
        
        $key_id  = explode("-", $this->input->post("contract"));
        $key_contract = $key_id[0];
        $id_service   = $key_id[1];
        $name_user    = $this->input->post("nameuser");
        $type_user    = $this->input->post("type_user");
        
        $this->form_validation->set_rules("title","Titulo","required");
        $this->form_validation->set_rules("comment","Comentario","required");
        
        $this->form_validation->set_message("required","%s es obligatorio");
        
        if($this->form_validation->run() != FALSE){
            
            switch ($type_user){
                case "u": $rate_type = (int) 1; $id_profession = $id_service; $id_company = 0; break;
                case "c": $rate_type = (int) 2; $id_profession = 0; $id_company = $id_service;  break;
            }
            
            $data = array(
                "title"       => $this->input->post("title"),
                "comment"     => $this->input->post("comment"),
                "rate_type"   => $rate_type,
                "user_rating" => $this->input->post("valoracion_global"),
                "name_user"   => $this->session->userdata("username"),
                "id_profession" => $id_profession,
                "id_company"    => $id_company,
                "id_contract"   => $key_contract
             );
            
            $ch = curl_init($this->api_url."contracts/rating/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                $this->session->set_flashdata("mensajes","Calificación  creada con exito :)");
                redirect(base_url()."profile/contract/");
            }else{
                $this->session->set_flashdata("mensajes","Error, intentelo más tarde");
                redirect(base_url()."profile/contract/");
            }
            
        }else{
            
            $this->r($key_contract, $id_service, $name_user, $type_user);
        }
        
    }
}