<?php

	//load config file
	require_once "config/config.php";
	// load the helpers page
	require_once "helpers/url_helpers.php";
	// load the session helper
	require_once "helpers/session_helper.php";
	

	//Autoload core libraries 
	spl_autoload_register(function($ClassName){
		require_once "libraries/".$ClassName.".php";
	});