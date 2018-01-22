<?php

	//  
	
	session_start();

	// Config global setup

	$GLOBALS['config'] = array(
		'mysql' => array(
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '',
			'db' => 'todo'
		),
		'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => '604800'
		),
		'session' => array(
			'session_name' => 'user',
			'token_name' => 'token' 
		)
	);

	// Autoload all the classes made for application to work

	spl_autoload_register(function($class){
		require_once 'classes/' . $class . '.php'; 
	});

	// Include functions all over application

	require_once 'functions/sanitize.php';

?>