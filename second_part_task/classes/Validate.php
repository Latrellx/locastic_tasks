<?php 

	class Validate {
   
	    private $_passed = false;
	    private $_errors = array();
	    private $_db = null;

	    public function __construct() {
	       
	        $this->_db = DB::getInstance();
	    }

	    public function check($source, $items = array()) {
	        
	        foreach($items as $item => $rules) {
	            
	            foreach($rules as $rule => $rule_value) {

	            	// Setting the value of an item
	               
	                $value = $source[$item];	                

	                $item = escape($item);

	                if($rule === 'required' && empty($value)) {
	                    
	                    $this->addError("{$item} is required");
	                
	                } else if (!empty($value)) {
	                    
	                    switch($rule) {
	                        
	                        case 'min':
	                            if(strlen($value) < $rule_value) {
	                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
	                            }
	                            break;

	                        case 'max':
	                            if(strlen($value) > $rule_value) {
	                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
	                            }
	                            break;
	                        case 'matches':
	                            if($value != $source[$rule_value]) {
	                                $this->addError("{$rule_value} must match {$item}.");
	                            }
	                            break;
	                        case 'unique':
	                            $check = $this->_db->get($rule_value, array($item, '=', $value));

	                            if($check->count()) {
	                                $this->addError("{$item} already exists.");
	                            }
	                            break;
	                    }
	                }
	            }
	        }

	        if(empty($this->_errors)) {
	            
	            $this->_passed = true;
	        }

	        return $this;
	    }

	    // Adding errors to an error array

	    private function addError($error) {
	        $this->_errors[] = $error;
	    }

	    // Returning list of errors 

	    public function errors() {
	        return $this->_errors;
	    }

	    // Returning result of the check function

	    public function passed() {
	        return $this->_passed;
	    }
}
