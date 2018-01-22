<?php

	class Todo {

		private $_db,
				$_data;				

		public function __construct() {

			$this->_db = DB::getInstance();
		}
		
		public function find($list = null) {

			if($list) {
				$field = (is_numeric($list)) ? 'id' : '';				
				$data = $this->_db->get('lists', array($field, '=', $list));
				
				if($data->count()) {
					$this->_data = $data->first();					
					return true;
				}				
			} 
			return false;     				     
	    }    
	    

		public function getLists() {

			return $this->_db->getAll('lists');
		}			

		public function getListById($id) {

			return $this->_db->get('lists', array('id', '=', $id));
		}		

		public function getAllData() {

			return $this->_db->query("SELECT l.list_name, l.list_date_created, COUNT(i.id) AS tasks_number, SUM(CASE WHEN i.status = 0 THEN 1 ELSE 0 END) AS unfinished_tasks, TRUNCATE((SUM(CASE WHEN i.status = 1 THEN 1 ELSE 0 END) / COUNT(i.id)) * 100,2) AS completed,
				concat(u.name, ' ', u.surname) AS fullname FROM lists l LEFT JOIN items i ON i.list_id = l.id LEFT JOIN users u ON l.user_id = u.id GROUP BY l.list_name;");
		}		

		public function getListsByUser($id) {
			
			return $this->_db->query("SELECT l.id, l.list_name, COUNT(i.id) AS tasks_number, SUM(CASE WHEN i.status = 0 THEN 1 ELSE 0 END) AS unfinished_tasks, l.list_date_created, concat(u.name, ' ', u.surname) AS fullname FROM lists l LEFT JOIN items i ON i.list_id = l.id LEFT JOIN users u ON l.user_id = u.id WHERE u.id = {$id} GROUP BY l.list_name;");
		}		

		public function getTasksByList($id) {

			return $this->_db->query("SELECT l.id, l.list_name, l.list_date_created, count(i.id) as tasks_number, SUM(CASE WHEN i.status = 0 THEN 1 ELSE 0 END) AS unfinished_tasks, TRUNCATE((SUM(CASE WHEN i.status = 1 THEN 1 ELSE 0 END) / COUNT(i.id)) * 100,2) AS completed FROM lists l LEFT JOIN items i ON i.list_id = l.id WHERE l.id = {$id}");
		}		

		public function getTasksPerList($id) {

			return $this->_db->query("SELECT i.id, i.task_name, i.priority, i.task_date_created, i.status, DATEDIFF(i.deadline, i.task_date_created) AS diffdays FROM items i WHERE list_id = {$id}");
		}

		public function create($fields = array()) {

			if(!$this->_db->insert('lists', $fields)) {
            	throw new Exception('Sorry, there was a problem creating your to-do list!');
        	}
		}	

		public function delete($id) {

			return $this->_db->delete('lists', array('id', '=', $id));
		}

		public function data() {

	    	return $this->_data;
	    }
	}