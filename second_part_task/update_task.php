<?php
	
	require_once 'core/init.php';

	if(Input::exists()) {		

			$id = Input::get('id');

			$validate = new Validate();

			$validation = $validate->check($_POST, array(				
				'task_name' => array(
					'required' => true,
					'min' => 5,
					'max' => 150
				),
				'priority' => array(
					'required' => true					
				),
				'deadline' => array(
					'required' => true
				)
			));				
             
			if($validation->passed()) {
				$task = new Task();
				try {					
					$task->update($id, array(
						'task_name' => Input::get('task_name'),						
						'priority' => Input::get('priority'),
						'deadline' => Input::get('deadline')						
				));
								
				header("Location: tasks.php?id={$id}"); 
			
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


