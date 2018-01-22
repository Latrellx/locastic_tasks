<?php
	
	class Config {

		public static function get($path = null) {
			if($path) {
				$config = $GLOBALS['config'];	
				$path = explode('/', $path);

				// Looping thru path array

				foreach($path as $bit) {
					if(isset($config[$bit])) {
						$config = $config[$bit];
					}
				}

				// Returning value of called property

				return $config;
			}
			return false;
		}
	}