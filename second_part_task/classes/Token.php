<?php

	class Token {
	    
		// Function that generates the token and storing it to a session

	    public static function generate() {
	        return Session::put(Config::get('session/token_name'), md5(uniqid()));
	    }

	    // Checking does token exists or not

	    public static function check($token) {
	        $tokenName = Config::get('session/token_name');

	        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
	            Session::delete($tokenName);
	            return true;
	        }

	        return false;
	    }
	}