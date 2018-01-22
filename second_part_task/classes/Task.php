<?php

	class Task {

		private $_db,
				$_data;				

		public function __construct() {

			$this->_db = DB::getInstance();
		}

		public function find($task = null) {

			if($task) {								
				$data = $this->_db->get('items', array('id', '=', $task));
				
				if($data->count()) {
					$data = $data->first();	
					return $data;					
				}				
			} 
			return false;     				     
	    }    

		public function create($fields) {

			if(!$this->_db->insert('items', $fields)) {
            	throw new Exception('Sorry, there was a problem creating your task!');
        	}
		}

		public function update($id, $fields) {

			if(!$this->_db->update('items', $id, $fields)) {
    			throw new Exception('Sorry, there was a problem updating your task!');
    		}
		}		

		public function delete($id) {

			return $this->_db->delete('items', array('id', '=', $id));			
		}						
	}

?>