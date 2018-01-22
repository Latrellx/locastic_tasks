<?php

	require_once "core/init.php";

	$user = new User();

	if(Input::exists()) {

	$validate = new Validate();
	$validation = $validate->check($_POST, array(				
		'list_name' => array(
			'required' => true,
			'min' => 2,
			'max' => 150
		)			
	));	

	if($validation->passed()) {
		$list = new Todo();
			try {					
				$list->create(array(
					'list_name' => Input::get('list_name'),
					'user_id' => $user->data()->id						
			));
			// Session::flash('home', 'You have been registered and now you can log in');
			Redirect::to('index.php');

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

