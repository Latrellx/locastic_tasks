<?php
	
	require_once 'core/init.php';

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {

			$validate = new Validate();

			$validation = $validate->check($_POST, array(
            	'email' => array('required' => true),
            	'password' => array('required' => true)
        	));

			if($validation->passed()) {
				$user = new User();
				$login = $user->login(Input::get('email'), Input::get('password'));

				if($login) {

					// Update last login with current datetime 
					// $user->update(array('last_login' => date('Y-m-d H-i-s')));
					Redirect::to('index.php');
					// Session message
				} else {
					echo "Sorry Login Failed";
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
	}

?>


<!DOCTYPE html>
<html>
<head>
	<?php include "includes/meta.php"; ?>
	<link rel="shortcut icon" href="assets/images/favicon_1.ico">
	<title>To-Do Task | Log In</title>
	<?php include "includes/styles.php"; ?>
</head>
<body>
	<div class="account-pages"></div>
	<div class="clearfix"></div>
	<div class="wrapper-page">
		<div class="card-box m-t-p-50">
			<div class="panel-heading"> 
				<h3 class="text-center"><strong class="text-custom">Sign In</strong> </h3>
			</div>
		<div class="panel-body">
			<form class="form-horizontal m-t-20" action="" method="post">
				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" id="email" name="email" type="email" placeholder="Email" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<input class="form-control" id="password" name="password" type="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group text-center m-t-40">
					<div class="col-xs-12">
						<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
						<button class="btn btn-default btn-block text waves-effect waves-light" type="submit">Log In</button>
					</div>
				</div>
			</form> 
		</div>   
		</div>                              
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>Don't have an account? <a href="register.php" class="text-primary m-l-5"><b>Sign Up</b></a></p>
			</div>
		</div>
	</div>

	<script>
	var resizefunc = [];
	</script>

	<?php include "includes/scripts.php"; ?>

</body>
</html>