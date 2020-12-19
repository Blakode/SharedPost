<?php

/* 	APP Core Class
	Creates URL & Loads Core Controllers
	URL format - Controller/methods/params\
	*/

 class Core

 {
 	
 		Protected $currentController = "Pages";
 		Protected $currentmethod = "index";
 		Protected $params = [];

 		public function __construct()
 		{

 		// print_r($this->getUrl());

 		$url = $this->getUrl();

 			//check if controller in the ur;l file exists 
 		if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){

 			// if exist set as current controller  
 			$this->currentController = ucwords($url[0]);
 			//unset the zero index
 			unset($url[0]);
 			}
 		
 		// require the current controller 
 			require_once '../app/controllers/'.$this->currentController.'.php';

 		// instatiate controllerr class
 			$this->currentController = new $this->currentController;

 		//  check second part of the url to get the method 
 		if(isset($url[1])){
 			// check to see if method exist in controller
 			if(method_exists($this->currentController, $url[1])){
 				$this->currentmethod = $url[1];
 			
				// unset index 1
				unset($url[1]);
 			}
 		}

 		// Get params using turnery operator 
 		$this->params = $url ? array_values($url): [] ;

 		// call a callback with an array of params 
 		call_user_func_array([$this->currentController, $this->currentmethod], $this->params);

}
 		public function getUrl(){

 		if(isset($_GET['url'])){

 		$url = rtrim($_GET['url'], '/'); // remove the forward slash at the end of the url
 		$url = filter_var($url , FILTER_SANITIZE_URL ); // remove unwanted url variables
 		$url = explode('/', $url); // set the set of string divided by the filter var to an array 
 		return $url;


 		}
 	}


 }