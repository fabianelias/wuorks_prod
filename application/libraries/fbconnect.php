<?php
/**
* 
*/

include(APPPATH.'libraries/facebook/Facebook.php');

class Fbconnect extends Facebook{

	public $user      = null;
	public $user_id   = null;
	public $fb        = false;
	public $fbSession = false;
	public $appkey    = 0;

	public function Fbconnect(){
                
		$ci=& get_instance();
		$ci->config->load('facebook',true);	
		$config = $ci->config->item('facebook');

		parent::__construct($config);

		$this->user_id = $this->getUser();
		$me = null;
		
		if($this->user_id){
                    
			try {
                            
				$me = $this->api('/me?locale=en_US&fields=name,email,id');//indico la cantidad de informació que requiero
				$this->user = $me;
                               
			} 
			catch (FacebookApiException $e){
                            
				error_log($e);
                                
			}
		}
	}
	/**
	*
	* @param
	*/
	public function send_back($value){
		return $value;
	}

	/**
	*
	* @param
	*/
	public function test(){
		$ci=& get_instance();
		$ci->load->helper("url");
		echo base_url();
	}
}
?>