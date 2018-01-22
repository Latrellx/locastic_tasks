<?php 

	require_once 'core/init.php';

	$list = new Todo();

	$list->delete(Input::get('id'));

	Redirect::to('../index.php');
?>