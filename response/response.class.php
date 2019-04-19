<?php

require_once("configLoader.class.php");

/**
 *
 *This class is used to send requests back to the client according to the mode received
 *
 *@created 18.04.2019
 *
 */
Class Requests{
	/**
	 *
	 *Loads configration and sends the request as soon as the class is initialized
	 *returns html code for buttons if action is set to 'getButtonsDef'
	 *
	 *@param string $action the action to perform
	 */
	public function __construct($action='sendHttpCode'){
		$this->loadConfig();
		if($action=='sendHttpCode'){
			$this->setServerStatus();
			$code=$this->getCode();
			$this->sendCode($code);
		}
		else if($action == 'getButtonsDef'){
			echo($this->getButtons());
		}
	}
	/*
	 *Loads configration from file, loads default file if no filename is passed,
	 *loads from filename if the filename is passed, configration is loaded 
	 *into $this->config 
	 *Throws exception if file is not found 
	 *
	 *@param string $config_file filename of config file to load
	 */
	private function loadConfig($config_file=NULL){
		$config_loader = new configLoader(); 
		$this->config = $config_loader->config;
	}
	
	/*
	 *Sets the server status to the required mode throws exception on failure
	 *
	 *@param string $status the status to set the server to
	 */
	private function setServerStatus(){
		if(!(isset($_GET['status']))){
			throw new Exception('Status not found');
		}
		else{
			$this->status=$_GET['status'];
		}
	}
	/**
	 *Returns html code for buttons based on configration
	 *
	 *@return string The html code for buttons
	 */
	private function getButtons(){
		$config = get_object_vars($this->config);
		$html='';
		foreach($config as $key=>$value){
			$html.='<button class="change-status" status="'.$key.'">'.$key.'</button>';
		}
		return($html);
	}
	/*
	 *gets the http code that will be sent to client
	 *
	 *@return int $http_code code to send to client
	 */
	private function getCode(){
		$rand = rand(1,100);
		$status = $this->status;
		$percent = $this->config->$status;
		$codes = get_object_vars($percent);
		$per=0;
		foreach($codes as $code=>$code_per){
			$per = $per + $code_per;
			if($rand <= $per){
				return(intval($code));
			}
		}
	}
	/*
	 *sets http response code
	 *
	 *sets and effectively sends the http response code to client
	 *
	 *@param int $http_code code to send
	 */
	private function sendCode($http_code){
		http_response_code($http_code);
	}
}
