<div id="addTaskModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" style="margin-top: 15%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Create Task</h4>
			</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<form id="todo" class="form-horizontal" role="form" method="POST" action="create_task.php?id=<?php echo Input::get('id') ?>">
						<div class="form-group">
							<label class="col-md-2 control-label">Task Name</label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="task_name" id="task_name" placeholder="Insert Task Name">
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
					<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		</div>                                         
	</div>                
</div>
<!-- /.modal -->