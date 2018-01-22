<?php
	
	require_once 'core/init.php';

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {

			$validate = new Validate();

			$validation = $validate->check($_POST, array(				
				'email' => array(
					'required' => true,
					'unique' => 'users'
				),
				'password' => array(
					'required' => true,
					'min' => 6
				),
				'password_again' => array(
					'required' => true,
					'matches' => 'password'
				),
				'name' => array(
					'required' => true,
					'min' => 3,
					'max' => 50
				),
				'surname' => array(
					'required' => true,
					'min' => 3,
					'max' => 30
				)
			));	

			if($validation->passed()) {
				$user = new User();
				try {					
					$user->create(array(
						'email' => Input::get('email'),
						'password' => Hash::make(Input::get('password')),
						'name' => Input::get('name'),
						'surname' => Input::get('surname'),
						'status' => 0
				));

				// sortout Session::flash('home', 'You have been registered and now you can log in');
				Redirect::to('login.php');
			
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
	}

?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/meta.php"); ?>
	<link rel="shortcut icon" href="assets/images/favicon_1.ico">
	<title>To-Do Task | Register</title>
	<?php include("includes/styles.php"); ?>
</head>
<body>

	<div class="account-pages"></div>
	<div class="clearfix"></div>
	<div class="wrapper-page">
		<div class="card-box m-t-p-50">
			<div class="panel-heading">
				<h3 class="text-center"><strong class="text-custom">Sign Up</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal m-t-20" method="post" action="">
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" id="email" name="email" type="email" placeholder="Email" value="<?php escape(Input::get('email')); ?>" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" id="password" name="password" type="password" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" name="password_again" type="password" placeholder="Repeat your password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" name="name" type="text" placeholder="Name" value="<?php escape(Input::get('name')); ?>" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" name="surname" type="text" placeholder="Surname" value="<?php escape(Input::get('surname')); ?>" autocomplete="off">
						</div>
					</div>
					<div class="form-group text-center m-t-40">
						<div class="col-xs-12">
							<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
							<button class="btn btn-default btn-block text waves-effect waves-light" type="submit">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>Already have account?<a href="login.php" class="text-primary m-l-5"><b>Sign In</b></a></p>
			</div>
		</div>
	</div>

	<script>
	var resizefunc = [];
	</script>

	<?php include("includes/scripts.php"); ?>

</body>
</html>