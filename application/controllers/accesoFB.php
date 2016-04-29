<?php
/*******************************************************************************
 * 
 *                  Controlador para acceso al cpanel
 * 
 ******************************************************************************/

Class AccesoFB extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        error_reporting(0);
        
    }
    
    /***************************************************************************
     * @index(), función para redejirir a cpanel.
     **************************************************************************/
    
    public function index(){
        
        echo "Redirect to CPanel";
        
        sleep(5);
        
        redirect(base_url()."cpanel","refresh");
              
    }
    
}