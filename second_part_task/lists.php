<?php

    require_once 'core/init.php';

    $user = new User();

    if($user->isLoggedIn()) {
    ?>

<!DOCTYPE html>
<html>
<head>
    <?php include("includes/meta.php") ?>
    <link rel="shortcut icon" href="assets/images/favicon_1.ico">
    <title>To-Do Task | Lists</title>
    <?php include("includes/styles.php") ?>
</head>
<body>
    <?php include("includes/navigation.php") ?>
    <div class="wrapper">      
        <div class="container">
            <?php include("includes/lists_inner.php")  ?>   
        </div>
    </div>
    <?php include("includes/footer.php") ?>
    <?php include("includes/scripts.php") ?>
</body>
</html>

<?php
  } else {
      Redirect::to('login.php');
  }
?>  