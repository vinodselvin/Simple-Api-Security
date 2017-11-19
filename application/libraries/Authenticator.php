<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Authenticator{

	public function __construct($params = array())
	{
		$set_user = $params['set_user'];
		$token    = $params['token'];

		$request_token = $_REQUEST['access_token'];
		$token         = ($token == false) ? $request_token : $token;

		if(empty($set_user) && empty($token)){
			$this->_show403();
		}
		else{
			if($set_user == TRUE){
				return $this->_setAccessToken();
			}
			else if($this->_isValidToken($token)){
				return true;
			}
			else{
				$this->_show403();
			}
		}
	}

	public function _show403(){

		header('HTTP/1.0 403 Forbidden');

		exit(json_encode(array("error"=>"403", "message" => "Forbidden")));
	}

	public function getAccessToken(){

		if($_SESSION['access_token']){
			return $_SESSION['access_token'];
		}
	}

	public function _setAccessToken(){

		if(!$this->getAccessToken()){
			$_SESSION['access_token'] = $this->_generateAccessToken();
		}
		
		return $_SESSION['access_token'];
	}

	public function _generateAccessToken(){
		return md5(rand(100000,999999999));
	}

	public function _isValidToken($request_token = false){

		$session_token = $_SESSION['access_token'];
		$request_token = $_REQUEST['access_token'];
		$access_token  = ($token == false) ? $request_token : $token;

		if($session_token == $access_token && !empty($session_token && !empty($access_token))){
			return true;
		}

		return false;
	}
}