<?php

/**
 *Loads json button configuration file
 *
 *@created 18.04.2019
 *
 */
Class ConfigLoader{
	/**
	 *Automatically loads configration file
	 *
	 */
	public function __construct(){

		$this->config_file = 'buttonsConfig.json';
		$this->loadConfig();
	}

	/*
	 *Loads configration from file, loads default file if no filename is passed
	 *loads from filename if the filename is passed. Exception thrown if file is not found
	 *
	 *@param string $config_file filename of config file to load
	 */
	private function loadConfig($config_file=NULL){
		if($config_file == NULL){
			$config_file = $this->config_file;
		}
		if(!(file_exists($config_file))){
			throw new Exception('Sorry, Configration file could not be found');
		}
		$this->config = json_decode(file_get_contents($config_file));
	}
}
