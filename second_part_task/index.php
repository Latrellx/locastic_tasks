<?php

require_once 'core/init.php';

if(Session::exists('home')) {
echo Session::flash('home');
}   

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
          <div class="row">
              <div class="col-sm-12">
                  <div class="btn-group pull-right m-t-15">
                      <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addListModal">Add List</button>
                  </div>
                  <h4 class="page-title">Lists</h4>
                  <ol class="breadcrumb">
                      <li class="active">Dashboard</li>                    
                  </ol>
              </div>
          </div>
              <div class="row">
                  <div class="col-sm-12">
                      <div class="card-box p-b-10">
                          <div class="row m-t-10 m-b-10">
                              <div class="col-sm-6 col-lg-4">
                                  <div class="h5 m-0">
                                  <span class="vertical-middle">Sort By:</span>
                                      <div class="btn-group vertical-middle" data-toggle="buttons">                                           
                                          <button onclick="sortTable(0)" class="btn btn-default btn-md waves-effect" type="button"> Name </button>
                                          <button onclick="sortTable(2)" class="btn btn-default btn-md waves-effect" type="button"> Date </button>  
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </br>
                          <table id="lists" class="table table-bordered table-actions-bar">
                          <thead>
                              <tr>
                                  <th>List Name</th>                                        
                                  <th>User</th>
                                  <th class="text-center">Date Created</th>
                                  <th class="text-center">Number of Tasks</th>
                                  <th class="text-center">Unfinished Tasks</th>                                      
                                  <th class="text-center">Actions</th>                                                            
                              </tr>
                          </thead>
                          <tbody> 
                          <?php 
                              $list = new Todo();
                              $lists = $list->getListsByUser($user->data()->id);
                              foreach ($lists->results() as $list) {
                          ?>
                              <tr>
                                  <td><?php echo $list->list_name  ?></td>  
                                  <td><?php echo $list->fullname ?></td>    
                                  <td class="text-center"><?php echo date("d.m.Y", strtotime($list->list_date_created)); ?></td>
                                  <td class="text-center"><?php echo $list->tasks_number ?></td>
                                  <td class="text-center"><?php echo $list->unfinished_tasks ?></td>     
                                  <td class="text-center">          
                                  <a href="delete_list.php/?id=<?php echo $list->id ?>" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" class="table-action-btn"><i class="fa fa-trash"></i></a>       
                                  <a href="tasks.php?id=<?php echo $list->id ?>" data-toggle="tooltip" data-placement="top" title="Manage Tasks" class="table-action-btn"><i class="fa fa-cogs"></i></a>     
                                  </td>
                              </tr>   
                          <?php } ?>   
                          </tbody> 
                          </table>                                                                             
                      </div>
                  </div>
              </div>
      <?php include("modals/add_list.php")  ?>    
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