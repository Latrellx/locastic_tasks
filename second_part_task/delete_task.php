<?php 

	require_once 'core/init.php';

	$task = new Task();

	$task->delete(Input::get('id'));

	header("Location: {$_SERVER['HTTP_REFERER']}");
?>