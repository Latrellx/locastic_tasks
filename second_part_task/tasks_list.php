<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="btn-group pull-right m-t-15">
		<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addTaskModal">Add Task</button> 		       
		</div>
		<h4 class="page-title">List Details</h4>
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">List Details	</li>
		</ol>
	</div>
</div>

<div class="row">

	<?php 

	require_once 'core/init.php';

		$lists = new Todo();	
		$list = $lists->getTasksByList(Input::get('id'));

		foreach($list->results() as $item) {
	?>

	<div class="col-md-6 col-sm-6 col-lg-4">
	<div class="card-box widget-box-1 bg-white">
	<i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Number of Tasks in the List"></i>
	<h4 class="text-dark">Number of Tasks</h4>
	<h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo $item->tasks_number ?></span></h2>
	</div>
	</div>

	<div class="col-md-6 col-sm-6 col-lg-4">
	<div class="card-box widget-box-1 bg-white">
	<i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Number of Unfinished Tasks in the List"></i>
	<h4 class="text-dark">Unfinished Tasks</h4>
	<h2 class="text-danger text-center"><span data-plugin="counterup"><?php echo $item->unfinished_tasks ?></span></h2>                           
	</div>
	</div>

	<div class="col-md-6 col-sm-6 col-lg-4">
	<div class="card-box widget-box-1 bg-white">
	<i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Statistic of Completed Tasks in the List Calculated by Percentage"></i>
	<h4 class="text-dark">Completion</h4>
	<h2 class="text-success text-center"><span data-plugin="counterup"><?php echo $item->completed ?></span>%</h2>                            
	</div>
	</div>                 
	<div class="col-xs-12">
		<div class="card-box product-detail-box">
			<div class="row">
				<div class="col-sm-12">
					<div class="product-right-info">
						<h3><b><?php echo $item->list_name ?></b></h3>
						<h4><b><?php echo date("d.m.Y", strtotime($item->list_date_created)); ?></b></h4>					

						<?php } ?>

						<hr/>
					</div>
				</div>
			</div>
			

		<div class="row">										
			<div class="col-xs-12">
				<h4><b>List of tasks : </b></h4>
				<div class="table-responsive m-t-20">
					<table class="table table-bordered table-actions-bar">
						<thead>
							<tr>
								<th>Task Name</th>
								<th class="text-center">Priority</th>
								<th class="text-center">Date Created</th>
								<th class="text-center">Status</th>
								<th class="text-center">Deadline</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>

						<?php 

							$task = new Todo();
							$tasks = $task->getTasksPerList($item->id);

							

							foreach($tasks->results() as $task) {
						?>

						<tr>
							<td><?php echo $task->task_name ?></td>
							<td class="text-center"><?php echo $task->priority ?></td>
							<td class="text-center"><?php echo date("d.m.Y", strtotime($task->task_date_created)); ?></td>
							<td class="text-center"><?php echo $task->status ?></td>
							<td class="text-center"><?php echo $task->diffdays ?></td>
							<td class="text-center">											   
								<a href="delete_task.php/?id=<?php echo $task->id ?>" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" class="table-action-btn"><i class="fa fa-trash"></i></a>       
								<a href="task_status.php/?id=<?php echo $task->id ?>" data-toggle="tooltip" data-placement="top" title="Change Status" class="table-action-btn"><i class="fa fa-cogs"></i></a>							
							</td>
							</td>
						<tr>

						<?php 

							}
							
						 ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>


		</div> <!-- end card-box/Product detai box -->
	</div> <!-- end col -->
</div> <!-- end row -->






