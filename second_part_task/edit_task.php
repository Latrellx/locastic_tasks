<?php

require_once 'core/init.php';

$user = new User();

if($user->isLoggedIn()) {
?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/meta.php"); ?>
<link rel="shortcut icon" href="assets/images/favicon_1.ico">
<title>To-Do Task | Edit Task</title>
<?php include("includes/styles.php"); ?>
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="wrapper">
<div class="container"> 
<div class="row">
<div class="col-sm-6">
<div class="card-box">                            
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" role="form" method="post" action="update_task.php?id=<?php echo Input::get('id') ?>">
<div class="form-group">
<label class="col-md-2 control-label">Text</label>
<div class="col-md-10">
<input type="text" id="task_name" name="task_name" class="form-control" placeholder="Insert New Task Name">
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">Priority</label>
<div class="col-md-10">
<select name="priority" id="priority" class="form-control select2">
<option id="0">Low</option>
<option id="1">Normal</option>
<option id="2">High</option>                                
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">Date To</label>
<div class="col-md-10">
<input type="date" class="form-control" name="deadline" id="deadline" placeholder="Insert To-Do Deadline Date">
</div>
</div>  
<div class="col-md-12">  
                                    <div class="text-right m-b-0">                                         
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                    </div>
                                 </div>                     



</form>
</div>

</div>
</div>
</div>
</div>        
</div><!-- end container -->
</div><!-- end wrapper -->
<?php include("includes/footer.php"); ?>
</div>
</div>
<?php include("includes/scripts.php"); ?>

</body>
</html>

<?php
} else {
Redirect::to('login.php');
}
?>  



