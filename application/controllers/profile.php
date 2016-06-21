<?php

/*******************************************************************************
 * 
 *                  Controlador para secciones del perfil
 * 
 *******************************************************************************/

Class Profile extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->very_sesion();
        
        $this->load->helper(array('form'));
        
        $this->load->library("head_files");
        $this->load->library("curl");
        
        
        $this->key_wuorks = $this->session->userdata("key");//"WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        $this->id_user    = $this->session->userdata("id_user");
        
        //error_reporting(0);
    }
    
    function very_sesion(){
            if(!$this->session->userdata('id_user')){
                    redirect(base_url().'oauth/in');
            }
    }
    /***************************************************************************
     * 
     *              Sección uno, función para visualización
     *              de vistas principales.
     * 
     **************************************************************************/
    
    
    /***************************************************************************
     * @index(), función vista principal.
     **************************************************************************/
    public function index(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "perfil";
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/profile_view",$data);
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @proffesion(), función para vistar de profesiones
     **************************************************************************/
    public function profession(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "profession";
        
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de sus profesiones
        $this->curl->create($this->api_url."profession/professions/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["professions"] = json_decode($this->curl->execute(), true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/profession_view",$data);
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @proffesion(), función para vistar de profesiones
     **************************************************************************/
    public function company(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "company"; 
        
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"] = json_decode($this->curl->execute(), true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/company_view",$data);
        $this->load->view("includes/footer");
        
    }
    
     /***************************************************************************
      *      * @contract(), función para visualizar vista de contratos
     **************************************************************************/
    public function contract(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "contract";
         //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."contracts/obt_contracts/id_user/".$this->id_user."/key_user/".$this->session->userdata("wuorks_key")."/key/".$this->key_wuorks);
        
        $data["contract"] = json_decode($this->curl->execute(), true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("contract/contracts_view",$data);
        $this->load->view("includes/footer");
        
    }
    /***************************************************************************
     * @mini_jobs(), función para activar la vista de crear mini Jobs.
     **************************************************************************/
    public function jobs(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "avisos";
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"] = json_decode($this->curl->execute(), true);
        
        //Obtengo los miniJobs creados por el usuario
        $this->curl->create($this->api_url."job/getMyJobs/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["jobs"]  = json_decode($this->curl->execute(), true);
       
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("mini_jobs/mini_jobs_view",$data);
        $this->load->view("includes/footer");
    }
    /***************************************************************************
     * @job(), función para activar vista de nuevo o editar miniJobs.
     ***************************************************************************/
    public function job(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "job";
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"] = json_decode($this->curl->execute(), true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("mini_jobs/new_job_view",$data);
        $this->load->view("includes/footer");
        
    }
    /***************************************************************************
     * @applicants(); función para vista de usuarios que han postulado a un
     * miniJobs
     **************************************************************************/
    public function applicants($key_aviso){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "avisos";
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"] = json_decode($this->curl->execute(), true);
        
        //Obtengo los miniJobs creados por el usuario
        $this->curl->create($this->api_url."job/getMyJobs/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["jobs"]  = json_decode($this->curl->execute(), true);
        
        foreach ($data["jobs"] as $job){
            if($job['key_aviso'] == $key_aviso){
                $data['job'][0] = $job;
                break;
            }
        }
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("mini_jobs/postulantes_view",$data);
        $this->load->view("includes/footer");
        
    }
    /***************************************************************************
     * @matchs(), función para mostrar usuarios que calzen con el mini Job
     **************************************************************************/
    public function matchs($key_aviso){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        $data["tab"]    = "matchs";
        
        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"]  = json_decode($this->curl->execute(), true);
        
        //Obtengo la info de un job en particular
        $this->curl->create($this->api_url."job/infoJob/key_aviso/".$key_aviso."/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["job"] = json_decode($this->curl->execute(), true);
        
        //Obtengo Wuokers 
        $this->curl->create($this->api_url."job/matchesWuokers/key_aviso/".$key_aviso."/key/".$this->key_wuorks);
        $data["matches"] = json_decode($this->curl->execute(), true);
        
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("mini_jobs/match_wuoker_job_view",$data);
        $this->load->view("includes/footer");
        
    }
    /***************************************************************************
     * @change_pass(), función para visualización de vista cambio de clave
     **************************************************************************/
    public function change_pass(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/change_password_view",$data);
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @recu_pass(), función para visualización de vista cambio de clave desde
     * recuperar clave
     **************************************************************************/
    public function recu_pass(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        $this->load->view("includes/head",$data);
        //$this->load->view("includes/nav_view");
        $this->load->view("profile/change_password_view",$data);
        //$this->load->view("includes/footer");
        
    }

    /***************************************************************************
     * 
     *              Sección dos, función para visualización
     *              de vistas de edición.
     * 
     **************************************************************************/
 
    /***************************************************************************
     * @edit_profile(), función vista de edición de datos.
     **************************************************************************/
    public function editProfile(){
        
        $data["files"]  = $this->head_files->profile();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtengo las regiones
        $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
        $data["regiones"] = json_decode($this->curl->execute(),true);
        
        //Obtengo las comunas
        
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/edit_profile_view",$data);
        $this->load->view("includes/footer");
        
    }
    /***************************************************************************
     * @editCompany(), función vista de edición de datos.
     **************************************************************************/
    public function editCompany(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtengo las regiones
        $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
        $data["regiones"] = json_decode($this->curl->execute(),true);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"] = json_decode($this->curl->execute(), true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/edit_company_view",$data);
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @createCompany(), función para vista de crear perfil de empresa.
     **************************************************************************/
    public function createCompany(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
        //Obtenfo la info de su empresa
        $this->curl->create($this->api_url."company/company/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["company"] = json_decode($this->curl->execute(), true);
        //Obtengo las regiones
        $this->curl->create($this->api_url."regiones/obtRegiones/key/".$this->key_wuorks);
        $data["regiones"] = json_decode($this->curl->execute(),true);
        
        if(!empty($data["company"])){
            $this->session->set_flashdata("mensajes","Ya creates tu perfil de empresa");
            redirect(base_url()."profile/company");
        }
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/create_company_view",$data);
        $this->load->view("includes/footer");
        
    }
    /***************************************************************************
     * 
     *              Sección dos, funciones edición de datos.
     * 
     **************************************************************************/
 
    /***************************************************************************
     * @edit_profile1(), función par edición de profile.
     **************************************************************************/
    public function edit_profile1(){
        
        $this->form_validation->set_rules("name","Nombre","trim|required");
        $this->form_validation->set_rules("last_name_p","Apellido paterno","trim|required");
        $this->form_validation->set_rules("last_name_m","Apellido materno","trim|required");
        $this->form_validation->set_rules("address","Dirección","trim|required");
        $this->form_validation->set_rules("commune","Comuna","trim|required");
        $this->form_validation->set_rules("region","Región","trim|required");
        //$this->form_validation->set_rules("rut","Rut","trim|required|integer|min_length[8]|max_length[9]");
        $this->form_validation->set_rules("cell_phone_number","Nro. telefono","trim|required|integer");
        $this->form_validation->set_rules("gender","Genero","trim|required");
        $this->form_validation->set_message("required","%s es obligatorio");
        $this->form_validation->set_message("min_length"," %s incorrecto");
        $this->form_validation->set_message("max_length"," %s incorrecto");
        $this->form_validation->set_message("integer"," %s incorrecto");
        
        if($this->form_validation->run() != FALSE){
            
            //Asignación de variables
            
            $name              = $this->input->post("name");
            $last_name_p       = $this->input->post("last_name_p");
            $last_name_m       = $this->input->post("last_name_m");
            $address           = $this->input->post("address");
            $commune           = $this->input->post("commune");
            $region            = $this->input->post("region");
            $cell_phone_number = $this->input->post("cell_phone_number");
            $telephone_number  = $this->input->post("telephone_number");
            $gender            = $this->input->post("gender");
            $birth_date        = $this->input->post("birth_date");
            $rut               = $this->input->post("rut");
            
            $data = array(
                'name'              => $name,
                'last_name_p'       => $last_name_p,
                'last_name_m'       => $last_name_m,
                'address'           => $address,
                'commune'           => $commune,
                'region'            => $region,
                'cell_phone_number' => $cell_phone_number,
                'telephone_number'  => $telephone_number,
                'gender'            => $gender,
                'birth_date'        => $birth_date,
                'id_user'           => $this->id_user,
                "rut"               => $rut
             );
            
            $ch = curl_init($this->api_url."user/edit_user/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                $this->session->set_flashdata("mensajes","Perfil editado con exito :)");
                redirect(base_url()."profile");
            }else{
                echo "Error intentelo más tarde";
            }
            
        }else{
            
            $this->editProfile();
        }
    }
    
    /***************************************************************************
     * @change_passw(), función para editar la contraseña
     **************************************************************************/
    public function change_passw(){
        
        $this->form_validation->set_rules("password","Contraseña","trim|required|min_length[6]|max_length[20]");
        $this->form_validation->set_rules("password_re","Repetir contraseña","trim|required|matches[password]");
        $this->form_validation->set_message('matches','Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length','El %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length','El %s debe tener un máximo de 20caracteres');
        $this->form_validation->set_message('required','%s es obligatorio');
        
        if($this->form_validation->run() != FALSE){
            
            $password = md5($this->input->post("password"));
            
            $this->curl->create($this->api_url."user/change_pass/id_user/".$this->id_user."/password/".$password."/key/".$this->key_wuorks);
            $change = $this->curl->execute();
            
            if($change){
                $this->session->set_flashdata("mensajes","Contraseña cambiada con exito :)");
                redirect(base_url()."profile");
            }
            
        }else{
            
            $this->change_pass();
            
        }
    }
    
    /***************************************************************************
     * @editCompany1(), función para editar un perfil de empresa
     **************************************************************************/
    public function editCompany1(){
        
        
        $this->form_validation->set_rules("company_description","Descripción","trim|required");
        $this->form_validation->set_rules("address","Dirección","trim|required");
        $this->form_validation->set_rules("region","Región","trim|required");
        $this->form_validation->set_rules("commune","Comuna","trim|required");
        //$this->form_validation->set_rules("company_category","Categoria","trim|required");
        $this->form_validation->set_message("required","%s es obligario");
        
        if($this->form_validation->run() != FALSE){
            
            $company_name = $this->input->post("company_name");
            $company_description = $this->input->post("company_description");
            $address             = $this->input->post("address");
            $company_category    = $this->input->post("company_category");
            $region              = $this->input->post("region");
            $commune             = $this->input->post("commune");
            
            $company = array(
                "company_name"        => $company_name,
                "company_description" => $company_description,
                "address"             => $address,
                "company_category"    => $company_category,
                "region"              => $region,
                "commune"             => $commune,
                "id_user"             => $this->id_user
            );
            $ch = curl_init($this->api_url."company/edit_company/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($company));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                
                $this->session->set_flashdata("mensajes","Empresa editada con exito");
                redirect(base_url()."profile/company");
            }else{
                echo "error";
            }
            
        }else{
            
            //redirect(base_url()."profile/editCompany");
            $this->editCompany();
        }
        
    }
    
    /***************************************************************************
     * createCompany1(), función para crear un perfil de empresa.
     **************************************************************************/
    public function createCompany1(){
        
        $this->form_validation->set_rules("company_name","Nombre empresa","trim|required");
        $this->form_validation->set_rules("company_description","Descripción","trim|required");
        $this->form_validation->set_rules("address","Dirección","trim|required");
        $this->form_validation->set_rules("region","Región","trim|required");
        $this->form_validation->set_rules("commune","Comuna","trim|required");
        $this->form_validation->set_rules("company_category","Categoria","trim|required");
        $this->form_validation->set_message("required","%s es obligario");
        
        if($this->form_validation->run() != FALSE){
            
            
            $company_name = $this->input->post("company_name");
            $company_description = $this->input->post("company_description");
            $address             = $this->input->post("address");
            $company_category    = $this->input->post("company_category");
            $region              = $this->input->post("region");
            $commune             = $this->input->post("commune");
            
            $company = array(
                "company_name"        => $company_name,
                "company_description" => $company_description,
                "address"             => $address,
                "company_category"    => $company_category,
                "region"              => $region,
                "commune"             => $commune,
                "id_user"             => $this->id_user
            );
            $ch = curl_init($this->api_url."company/create_company/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($company));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                
                $this->session->set_flashdata("mensajes","Empresa creada con exito");
                redirect(base_url()."/profile/company");
            }else{
                echo "error";
            }
            
        }else{
            
            //redirect(base_url()."profile/editCompany");
            $this->createCompany();
        }
    }
    /***************************************************************************
     * @createProfession(), función para crear perfil profesional
     **************************************************************************/
    public function createProfession(){
        
        $data["files"]  = $this->head_files->createProfession();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
          //Obtenfo la info de sus profesiones
        $this->curl->create($this->api_url."profession/professions/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["professions"] = json_decode($this->curl->execute(), true);
        
        $total = count($data["professions"]);
        if($total == 2){
            $this->session->set_flashdata("mensajes","Ya creaste el maximo de profesiones");
            redirect(base_url()."profile/profession");
        }
        
        $this->curl->create($this->api_url."profesiones/obtenerProfesiones/key/".$this->key_wuorks);
        $data["list"] = json_decode($this->curl->execute(), true);
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/create_profession_view",$data);
        $this->load->view("includes/footer");
    }
    
    /***************************************************************************
     * @createProfession1(), función para ingresar nueva profesión.
     **************************************************************************/
    public function createProfession1(){
        
        $this->form_validation->set_rules("name_profession","Area de trabajo","trim|required");
        $this->form_validation->set_rules("job_description","Descripción","trim|required");
        $this->form_validation->set_rules("workplace","Lugar de trabajo","trim|required");
        $this->form_validation->set_message("required","%s es obligario");
        
        if($this->form_validation->run() != FALSE){
            
           $name_profession = $this->input->post("name_profession");
           $job_description = $this->input->post("job_description");
           $workplace       = $this->input->post("workplace");
           $id_user         = $this->id_user;
           
           $profession = array(
               "name_profession"  => $name_profession,
               "job_description"  => $job_description,
               "workplace"        => $workplace,
               "id_user"          => $id_user
           );
           
            $ch = curl_init($this->api_url."profession/create_profession/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($profession));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                
                $this->session->set_flashdata("mensajes","Perfil profesional creada con exito");
                redirect(base_url()."profile/profession");
            }else{
                echo "error";
            }
           
        }else{
            
            $this->createProfession();
            
        }
    }
    
    /***************************************************************************
     * @editProfession(), función para editar un profesión.
     **************************************************************************/
    public function editProfession($key_profession){
        
        $data["files"]  = $this->head_files->createProfession();
        $data["titulo"] = "Wuorks el profesional que necesitas";

        //Obtengo la info del usuario
        $this->curl->create($this->api_url."user/infoUser/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $data["infoUser"] = json_decode($this->curl->execute(),TRUE);
        
          //Obtenfo la info de sus profesiones
        $this->curl->create($this->api_url."profession/professions/id_user/".$this->id_user."/key/".$this->key_wuorks);
        $professions = json_decode($this->curl->execute(), true);
        
        $total = count($professions);
        
        
        for($i=0; $i<$total; $i++){
            
            if($professions[$i]["key_profession"] == $key_profession){
                $data["profession"] = $professions[$i];
                break;
            }
        }
        
        if(empty($data["profession"])){
            redirect(base_url("profile"));
        }
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("profile/edit_profession_view",$data);
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @editProfession1(), función para editar una profesión.
     **************************************************************************/
    public function editProfession1(){
        
        $this->form_validation->set_rules("name_profession","Area de trabajo","trim|required");
        $this->form_validation->set_rules("job_description","Descripción","trim|required");
        $this->form_validation->set_rules("workplace","Lugar de trabajo","trim|required");
        $this->form_validation->set_message("required","%s es obligario");
        
        $key_profession  = $this->input->post("key_profession");
         
        if($this->form_validation->run() != FALSE){
            
           $name_profession = $this->input->post("name_profession");
           $job_description = $this->input->post("job_description");
           $workplace       = $this->input->post("workplace");
           $id_user         = $this->id_user;
          
           $profession = array(
               "name_profession"  => $name_profession,
               "job_description"  => $job_description,
               "workplace"        => $workplace,
               "id_user"          => $id_user,
               "key_profession"   => $key_profession
           );
           
            $ch = curl_init($this->api_url."profession/edit_profession/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($profession));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                
                $this->session->set_flashdata("mensajes","Perfil profesional creada con exito");
                redirect(base_url()."profile/profession");
            }else{
                echo "error";
            }
           
        }else{
            
            $this->editProfession($key_profession);
            
        }
    }
    
    /***************************************************************************
     * @job1(), función para crear un miniJob.
     **************************************************************************/
    public function job1(){
        
        //Validación de post
        $this->form_validation->set_rules('title','Titulo','trim|required');
        $this->form_validation->set_rules('description','Descripción','trim|required');
        $this->form_validation->set_rules('salario','Salario','trim|required');
        $this->form_validation->set_rules('nroAppl','Nro. aplicantes','trim|required');
        $this->form_validation->set_rules('tipo_aviso','Tipo de aviso','trim|required');
        $this->form_validation->set_rules('horario','Horario','trim|required');
        $this->form_validation->set_rules('genero','Genero','trim|required');
        $this->form_validation->set_rules('zona','Zona','trim|required');
        
        $this->form_validation->set_message('required','%s es obligatorio');
        
        if($this->form_validation->run() != FALSE){
            
            $miniJob = array(
                "title" => $this->input->post('title'),
                "description" => $this->input->post('description'),
                "remuneration" => $this->input->post('salario'),
                "applicants_amount" => $this->input->post('nroAppl'),
                "tipo_aviso"        => $this->input->post('tipo_aviso'),
                "genero"            => $this->input->post('genero'),
                "horario"           => $this->input->post('horario'),
                "zona"              => $this->input->post('zona'),
                "id_user"           => $this->session->userdata('id_user')
            );
            
            //envio por post al API
            $ch = curl_init($this->api_url."job/create_job/key/".$this->key_wuorks);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($miniJob));
            $result = curl_exec($ch);
            curl_close($ch);
            
            if($result){
                $this->session->set_flashdata("mensajes","MiniJob creado con exito");
                redirect(base_url()."profile/jobs");
            }else{
                //error al crear miniJob
                $this->session->set_flashdata("mensajes","Error, intentelo más tarde");
                redirect(base_url()."profile/jobs");
            }
            
        }else{
            echo validation_errors();
        }
    }
    
    /***************************************************************************
     * @change_avatar(), función para cambiar la foto de perfil.
     **************************************************************************/
   
            
    public function upload_image(){
        
            $file_name = md5($this->session->userdata('id_user'));
            
            $config['upload_path'] = './asset/img/user_avatar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1024';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name'] = '_'.$file_name;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload()){
                
                    $error = array('error' => $this->upload->display_errors());
                   
                    $this->session->set_flashdata('mensajes', 'Error al cambiar la imagens');
                    //redirect(base_url().'profile/editProfile','refresh');
                    
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                   
                    $new_image = $data['upload_data']['file_name'];
                    $id_user   = $this->id_user;
                    
                    $this->curl->create($this->api_url."user/change_avatar/image/".$new_image."/id_user/".$id_user."/key/".$this->key_wuorks);
                    $in = json_decode($this->curl->execute(),true);
                    
                    if($in){
                        $avatar = $this->input->post("avatar");
                        
                        if($avatar != "wuorks-not-avatar.png" && $avatar != "wuorks_avatar_men.png" && $avatar != "wuorks_avatar_women.png"){
                           unlink('./asset/img/user_avatar/'.$this->input->post("avatar"));
                        }else{
                           
                        }
                        
                        $this->session->set_flashdata('mensajes', 'La imagen se ha cambiado correctamente');
                        redirect(base_url().'profile','refresh');
                        
                    }else{
                        
                        $this->session->set_flashdata('mensajes', 'Error al cambiar la imagen');
                        redirect(base_url().'profile/editProfile','refresh');
                        
                    }
                    
            }
    }
    
    
    
    /***************************************************************************
     * @getComunas(), funciòn para cargar comunas según región.
     **************************************************************************/
    public function getComunas(){
        
        $id_region = $this->input->post("idregion");
        
        $this->curl->create($this->api_url."regiones/obtComunas/id_region/".$id_region."/key/".$this->key_wuorks);
        
        $comunas = json_decode($this->curl->execute(),true);
        $comuna_actual = $this->session->userdata("commune");
        
        echo '<select name="commune" id="commune" class="form-control chosen-select">';
        echo "<option>Selecciona tu comuna</option>";
        foreach ($comunas as $com){
           if($comuna_actual == $com["nombre"]){
               $selected = "selected";
           }else{
               $selected = "";
           }
           echo '<option value="'.$com["id"].'" '.$selected.'>'.$com["nombre"].'</option>';
        }
        echo "</select>";
    }
}