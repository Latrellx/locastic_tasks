<?php

	class Input {

		// Checking is data actually exist
	   
	    public static function exists($type = 'post') {
	        
	        switch($type) {
	            case 'post':
	                return (!empty($_POST)) ? true : false;
	                break;
	            case 'get':
	                return (!empty($_GET)) ? true : false;
	                break;
	            default:
	                return false;
	                break;
	        }
	    }

	    // Retriving an item(data)

	    public static function get($item) {
	        
	        if(isset($_POST[$item])) {
	            return $_POST[$item];
	        } else if(isset($_GET[$item])) {
	            return $_GET[$item];
	        }

	        return '';
	    }
	}