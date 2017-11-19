<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library("Authenticator");
		$this->load->view('welcome_message');
	}

	public function valid(){
		
		$this->load->library("Authenticator", array("set_user"=> true));

		$token = $this->authenticator->getAccessToken();

		print_r($token);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */