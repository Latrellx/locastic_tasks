<?php 

	require_once 'core/init.php';

	$task = new Task();	

	if($task->find(Input::get('id'))->status == 0) {
		$task->update(Input::get('id'), array('status' => 1));
	} else {
		$task->update(Input::get('id'), array('status' => 0));
	}

	header("Location: {$_SERVER['HTTP_REFERER']}"); 

?>