<?php

/*******************************************************************************
 * 
 *          Controlador para acceso (login y registro)
 * 
 *******************************************************************************/


Class Oauth extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->very_sesion();
        $this->load->library("head_files");
        $this->load->library('fbconnect');
        $this->load->library('facebook');
        $this->load->library("curl");
        
        
        $this->key_wuorks = "WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT";
        $this->api_url    = $this->config->item("api_wuorks");
        
        //cargar librerias nueva de facebook 
        $this->load->library("src/facebook-sdk-v5/facebook","fb");
        error_reporting(0);
        
    }
    
    /***************************************************************************/
    /*FUNCIÓN PARA VERIFICAR SI EXISTE UNA SESSION CREADA
    /***************************************************************************/
    function very_sesion(){
        if($this->session->userdata('id_user')){
                redirect(base_url());
        }
    }
    /***************************************************************************
     * 
     *                  Sección uno: Login
     * 
     **************************************************************************/
    
    
    /***************************************************************************
     * @in(), función de ingreso.
     **************************************************************************/
    public function in($url_destino = ''){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("oauth/login_view");
        $this->load->view("includes/footer");
        
    }
    
    /***************************************************************************
     * @login(), función para validar ingreso de usuario a la plataforma
     **************************************************************************/
    public function login($url_destino = ''){
        
        $this->form_validation->set_rules("email","Email","trim|required|valid_email");
        $this->form_validation->set_rules("password","Contraseña","trim|required");
        
        $this->form_validation->set_message("required"," %s es obligatorio");
        if($this->form_validation->run() != FALSE){
            
            $email    = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            
            
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
            
            $info = json_decode($result,true);
            if($info['res'] == 3){
                //por si existe una url de destino
                if($this->input->post('url_destino')){
                    
                    $this->session->set_userdata($info['data'][0]);
                    $url_destino = $this->input->post('url_destino');
                    redirect($url_destino, 'refresh');
                    
                }else{
                    
                    //crear array para variables de session
                    $this->session->set_userdata($info['data'][0]);
                    redirect(base_url(), 'refresh');
                    
                    
                    /*Datos del array session
                     *  [id_user] => 14
                        [username] => @eliasB_1073
                        [email] => fabian_bravo@live.com
                        [password] => fdec58c6b1d0edcd33dd9081f5e2b019
                        [wuorks_key] => yhI8bOpRSDVlEKG
                        [user_type] => 1
                        [type_account] => 0
                        [create_time] => 2016-02-25 22:34:38
                        [id_social] => 
                        [state] => 1
                        [id_user_information] => 13
                        [name] => elias
                        [last_name_p] => bravo
                        [last_name_m] => gajardo
                        [rut] => 
                        [telephone_number] => 0
                        [cell_phone_number] => 0
                        [address] => 
                        [commune] => 
                        [region] => 
                        [birth_date] => 0000-00-00 00:00:00
                        [gender] => 
                        [avatar] => wuorks-not-avatar.png
                        [key] => WBqyGRGuRHHTEIZwTuJfFvPgyhCHZ67GCmtlAxdT
                        [ws_user_id_user] => 0
                     */
                }
                
            }elseif($info['res'] == 2){
                
                $this->session->set_flashdata("error_2","Necesitas validar tu email antes de ingresar :)");
                
                
                if(!$this->input->post('url_destino')){
                    $url_destino = $this->input->post('url_destino');
                    redirect(base_url().'oauth/in?return='.$url_destino, 'refresh');
                }else{
                    redirect(base_url().'oauth/in', 'refresh');
                }
                
            }else{
                
                $this->session->set_flashdata("error_1","El email o contraseña ingresada no existen");
                
                 if($this->input->post('url_destino')){
                     
                    $url_destino = $this->input->post('url_destino');
                    redirect(base_url().'oauth/in?return='.$url_destino, 'refresh');
                }else{
                    
                    redirect(base_url().'oauth/in', 'refresh');
                    
                }
            }
            
            
            //
        }else{
            
            //Error de validación
           if($this->input->post('url_destino')){
                     
                    $url_destino = $this->input->post('url_destino');
                    $data["files"]  = $this->head_files->register();
                    $data["titulo"] = "Wuorks el profesional que necesitas";

                    $this->load->view("includes/head",$data);
                    $this->load->view("includes/nav_view");
                    $this->load->view("oauth/login_view");
                    $this->load->view("includes/footer");
                    
           }else{
                    
                    $data["files"]  = $this->head_files->register();
                    $data["titulo"] = "Wuorks el profesional que necesitas";

                    $this->load->view("includes/head",$data);
                    $this->load->view("includes/nav_view");
                    $this->load->view("oauth/login_view");
                    $this->load->view("includes/footer");
                    
           }
            //redirect(base_url().'oauth/in', 'refresh');
        }
         /*
         *  Tipo de respuestas:
         *   1 : contraseña o email no coinciden.
         *   2 : usuario no ha validado el email
         *   3 : Todo correcto valido para ingreso
         */
    }
    /***************************************************************************
     * 
     *                        Sección dos: registro
     * 
     **************************************************************************/
    
    
    /***************************************************************************
     * @register(), función para registro por email o facebook.
     **************************************************************************/
    public function register(){
        
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("oauth/register_view");
        //$this->load->view("includes/footer");
        

    }
    /***************************************************************************
     * @register(), función para registro con email.
     ***************************************************************************/
    public function registerUser(){
        
        $this->form_validation->set_rules("email","email","trim|required|valid_email|callback_verify_email");
        $this->form_validation->set_rules("name","Nombre","trim|required");
        $this->form_validation->set_rules("last_name_p","Apellido paterno","trim|required");
        $this->form_validation->set_rules("last_name_m","Apellido materno","trim|required");
        $this->form_validation->set_rules("password","Contraseña","trim|required|min_length[6]|max_length[20]");
        $this->form_validation->set_rules("password_re","Repetir contraseña","trim|required|matches[password]");
        
        $this->form_validation->set_message('required','%s es obligatorio');
        $this->form_validation->set_message('matches','Las claves no coinciden');
        $this->form_validation->set_message('verify_email',' El %s ya existe');
        $this->form_validation->set_message('valid_email','El %s ingresado debe ser valido');
        $this->form_validation->set_message('matches','Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length','El %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length','El %s debe tener un máximo de 12 caracteres');
        
        if($this->form_validation->run() !=FALSE){
            //Se crea registro de usuario nuevo
                $tipo_usuario   = $this->input->post('typeUser');
                $genero_usuario = $this->input->post('gender');
                $noticiasInput     = $this->input->post('notices');
                $newletter = (int)0;
                
                if($noticiasInput == "on"){
                    $newletter = (int)1;
                }
                
                $newUser = array(
                    "name"        => $this->input->post("name"),
                    "last_name_p" => $this->input->post("last_name_p"),
                    "last_name_m" => $this->input->post("last_name_m"),
                    "email"       => $this->input->post("email"),
                    "id_social"   => NULL,
                    "user_type"   => (int)$tipo_usuario,
                    "password"    => md5($this->input->post("password")),
                    "newletter"   => $newletter,
                    "state"       => 0,
                    "gender"      => $genero_usuario
                );
                
                /*
                 * cambio 27/03/2016: El usuario al registrarse ya puede ingresar, pero si quiere crear un perfil
                 * profesional debe validar el email.
                 */
                
                $ch = curl_init($this->api_url."register/registerUser/key/".$this->key_wuorks);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($newUser));
                $result = curl_exec($ch);
                curl_close($ch);
                
                if($result){
                    
                    redirect(base_url()."oauth/success","refresh");
                    
                }else{
                    
                    echo "Error";
                    
                }
        }else{
            //echo validation_errors();
            $this->register();
        }
    }
    
    /***************************************************************************
     * @verify_email(), función para verificar email antes del registo
     **************************************************************************/
    public function verify_email($email){ //
       
        $this->curl->create($this->api_url."register/verify_email/email/".$email."/key/".$this->key_wuorks);
        $verify =  json_decode($this->curl->execute(),true);
      
        if($verify){
                return FALSE;
        }else{
                return TRUE ;
        }
        
    }
    
    
    /***************************************************************************
     * @facebook(), función para registro con facebook.
     ***************************************************************************/
    public function facebook(){
        /*
        $this->load->library('fbconnect');
        $data = array('redirect_uri' => 'http://wuorks.com/oauth/handle_facebook_login/',//site_url("/oauth/handle_facebook_login/"),
                      'scope' => 'email,public_profile' );
        $permissions = ['email', 'user_likes']; // optional
        
        //redirect($this->fbconnect->getLoginUrl('http://wuorks.com/oauth/facebook_login/', $permissions));
        redirect($this->fbconnect->getLoginUrl($data));//data original
       */
        
       require './vendor/src/facebook-sdk-v5/autoload.php';
       $fb = new Facebook\Facebook([
            'app_id' => '266809433657812',
            'app_secret' => 'bc616c376f3f5d28cb4e63e1bac3254c',
            'default_graph_version' => 'v2.6',
          ]);
        
      
        
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // optional
        $loginUrl = $helper->getLoginUrl('http://wuorks.com/oauth/handle_facebook_login/', $permissions);

       // echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
       redirect($loginUrl,'refresh');
        
         
    } 
    
    public function handle_facebook_login(){
        
         $datados = array(
                'name'        => $this->fbconnect->user['name'],
                'id_facebook' => $this->fbconnect->user['id'],
                'email'       => $this->fbconnect->user['email']
            );
            //print_r($datados);  
         
        if($this->fbconnect->user){
            
            //Paso 1: verifico si el email de facebook existe;
           
            
            //verificar email
            $this->curl->create($this->api_url."register/verify_email/email/".$datados["email"]."/key/".$this->key_wuorks);
            $verify = $this->curl->execute();
            
            if($verify == FALSE){
                
                //Se crea registro de usuario nuevo
                $newUser = array(
                    "name"        => $this->fbconnect->user['name'],
                    "last_name_p" => "",
                    "last_name_m" => "",
                    "email"       => $this->fbconnect->user['email'],
                    "id_social"   => $this->fbconnect->user['id'],
                    "user_type"   => 1,
                    "password"    => md5("social"),
                    "newletter"   => 1,
                    "state"       => 1,
                    "gender"      => 0
                );
                $field_string = http_build_query($newUser);
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, $this->api_url."register/registerUser/key/".$this->key_wuorks);
                curl_setopt($ch,CURLOPT_POST, 1);
                curl_setopt($ch,CURLOPT_POSTFIELDS, $field_string);
                $result = curl_exec($ch);
                curl_close($ch);
                
                if($result){
                    
                    $this->session->set_userdata("user",$newUser);
                    
                    redirect(base_url()."profile/step_1?q=completa_tus_datos","refresh");
                    
                }else{
                    echo "Error, intentelo más tarde";
                }
                
                
            }else{
               
                $email    = $datados["email"];
                $password = md5('social');



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
                $info = json_decode($result,true);
                //crear array para variables de session
                $this->session->set_userdata($info['data'][0]);
                redirect(base_url(), 'refresh');
                    
                }
                
                
        }else{
            
            $this->session->set_flashdata("error_2", "Error de facebook");
            redirect(base_url()."oauth/in");
        }
    }
    
    
    
    /***************************************************************************
     * @success(), función de vista para exito en el registro.
     ***************************************************************************/
    public function success($mensaje = ''){
        $data["files"]  = $this->head_files->register();
        $data["titulo"] = "Wuorks el profesional que necesitas";
        
        $this->load->view("includes/head",$data);
        $this->load->view("includes/nav_view");
        $this->load->view("oauth/register_success_view");
        $this->load->view("includes/footer");
    }
    
    
    /***************************************************************************
     * @verify_account(), función para verificar email.
     **************************************************************************/
    public function verify_account($email, $rand = ''){
        $this->curl->create($this->api_url."register/verify_account/email/".$email."/key/".$this->key_wuorks);
        
        
        
        $verify = $this->curl->execute();
        if($verify == true){
           $this->session->set_flashdata("error_2","Listo email validado, <strong>Recuerda</strong> completar tus datos es muy importante. :)");
           $this->in();
        }else{
           $this->session->set_flashdata("error_3","El usuario no existe");
           $this->in();
        }
        
    }
    
    
    
    
    
   
}