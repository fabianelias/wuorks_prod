<?php

/*******************************************************************************
 * 
 *              Clase para las archivos especificos de controladores
 * 
 ******************************************************************************/

Class Head_files{
    
    
    public function home(){
        
        $files["scripts"] = array(
            
        );
        
        $files["styles"]  = array(
            
        );
        
        return $files;
    }
    
    
    public function search(){
        
        $files["scripts"] = array(
            '0' => 'asset/js/search-wuorks.js'
        );
        
        $files["styles"]  = array(
            
        );
        
        return $files;
        
    }
    
    
    public function wuokers(){
        
        $files["scripts"] = array(
            '0' => 'asset/js/search-wuorks.js'
        );
        
        $files["styles"]  = array(
            
        );
        
        return $files;
        
    }
    
    public function register(){
        
        $files["scripts"] = array(
           '0' => 'asset/js/sweet-alert.js',
           '1' => 'asset/js/oauth.js'
        );
        
        $files["styles"]  = array(
            '0' => 'asset/css/sweet-alert.css'
        );
        
        return $files;
        
    }
    
    public function createProfession(){
        
        $files["scripts"] = array(
           //'0' => 'asset/js/jquery-1.10.1.min.js',
          // '1' => 'asset/js/chosen.jquery.js',
           
        );
        
        $files["styles"]  = array(
            '0' => 'asset/css/chosen.css'
        );
        
        return $files;
        
    }
    public function profile(){
        $files["scripts"] = array(
           '0' => 'asset/js/regiones.js'
           
        );
        
        $files["styles"]  = array(
        );
        
        return $files;
    }
}