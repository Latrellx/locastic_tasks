<?php

	require_once "core/init.php";

	if(Input::exists()) {		

	$validate = new Validate();

	$validation = $validate->check($_POST, array(				
		'task_name' => array(
			'required' => true,
			'min' => 2,
			'max' => 150
		), 
		'deadline' => array(
			'required' => true
		),	
		'priority' => array(
			'required' => true
		)	
	));	

	if($validation->passed()) {
		$task = new Task();
		try {					
			$task->create(array(
				'task_name' => Input::get('task_name'),
				'deadline' => Input::get('deadline'),
				'priority' =>Input::get('priority'),
				'list_id' => Input::get('id')				
			));		

			header("Location: {$_SERVER['HTTP_REFERER']}"); 

		} catch(Exception $e) {
		die($e->getMessage());
		}
	} else {		
?>

		<div class="alert alert-danger text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                                   
<?php

			foreach ($validation->errors() as $error) {
			echo $error . "<br>";					
			}

?>
		</div>
<?php
			}	
			}			
?>

