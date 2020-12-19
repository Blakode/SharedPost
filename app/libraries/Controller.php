<?php

/*
	This is the base controller
	Loads Models & Views 
*/

class Controller{
		
		function __construct()
		{
			
		}


		// loads model
		public function model($model)
		{
		// require model file
		require_once '../app/models/'.$model.'.php';
		
		// instantiate model
		return new $model();
		}


		public function views($view, $data=[])
		{
		if(file_exists('../app/views/'.$view.'.php'))
		{
			require_once '../app/views/'.$view.'.php';
			}else{
				die('view does not exist');
			}
		}
	}
	