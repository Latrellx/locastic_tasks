<?php

    require_once("core/init.php");

    $list = new Todo();
    $user = new User();

    if($user->isLoggedIn()) {
?>

<!DOCTYPE html>    
<html>
<head>
    <?php include("includes/meta.php"); ?>
    <link rel="shortcut icon" href="assets/images/favicon_1.ico">
    <title>To-Do Task | Dashboard</title>
    <?php include("includes/styles.php"); ?>
</head>
<body>
    <?php include("includes/navigation.php"); ?>
    <div class="wrapper">
    <div class="container">  
    <?php include("tasks_list.php") ?>
    <?php include("modals/add_task.php") ?>
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
