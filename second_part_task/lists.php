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
         <div class="row">
            <div class="col-sm-12">
            <h4 class="page-title">Lists</h4>
            <ol class="breadcrumb">
               <li class="active">Dashboard</li>                    
            </ol>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <div class="card-box p-b-10">
               <h4 class="m-t-0 header-title"><b>To-Do List</b></h4>
               <p class="text-muted font-13">Lists</p></br>
               <table class="table table-bordered table-actions-bar">
               <thead>
                  <tr>
                     <th>List Name</th>                                        
                     <th>User</th>
                     <th class="text-center">Date Created</th>
                     <th class="text-center">Number of Tasks</th>
                     <th class="text-center">Unfinished Tasks</th> 
                     <th class="text-center">Completion Rate(%)</th>                                                           
                  </tr>
               </thead>
               <tbody>                           
               <?php 
                  $list = new Todo();
                  $lists = $list->getAllData();
                  foreach ($lists->results() as $list) {
                  ?>
                  <tr>
                     <td><?php echo $list->list_name  ?></td>  
                     <td><?php echo $list->fullname ?></td>    
                     <td class="text-center"><?php echo date("d.m.Y", strtotime($list->list_date_created)); ?></td>              
                     <td class="text-center"><?php echo $list->tasks_number ?></td>
                     <td class="text-center"><?php echo $list->unfinished_tasks ?></td>  
                     <td class="text-center"><?php if($list->tasks_number == 0) { echo 'No Tasks Available'; } else { echo $list->completed; } ?></td>
                  </tr>  
                  <?php } ?>  
               </tbody>  
               </table>                                                                             
               </div>
            </div>
         </div> 
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