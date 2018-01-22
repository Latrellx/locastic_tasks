<div id="addListModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="margin-top: 15%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Create To-Do List</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="todo" class="form-horizontal" role="form" method="POST" action="create_list.php">
                            <div class="form-group">
                                <label class="col-md-2 control-label">List Name</label>
                                <div class="col-md-10">
                                    <input type="text" id="list_name" name="list_name" class="form-control" placeholder="Insert List Name">
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