<?php    

    class Session {
        
        // Checking does session exists or not

        public static function exists($name) {
            return (isset($_SESSION[$name])) ? true : false;
        }

        // Returning value of the session

        public static function put($name, $value) {
            return $_SESSION[$name] = $value;
        }

        // Getting the session value

        public static function get($name) {
            return $_SESSION[$name];
        }

        // Function that unsets session if it exists

        public static function delete($name) {
            if(self::exists($name)) {
                unset($_SESSION[$name]);
            }
        }

        public static function flash($name, $string = 'null') {
            if(self::exists($name)) {
                $session = self::get($name);
                self::delete($name);
                    return $session;
            } else {
                self::put($name, $string);
            }
        }
    }

?>