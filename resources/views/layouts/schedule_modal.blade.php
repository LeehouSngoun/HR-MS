<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="/schedule_add">
					@csrf
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Name</label>
  
						<div class="col-sm-9">
						<input type="text" class="form-control" name="name">
						</div>
				  </div>
          		  <div class="form-group">
                  	<label for="time_in" class="col-sm-3 control-label">Start Time <span class="text-danger">*</span></label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="time" class="form-control timepicker" id="time_in" name="start_time" required>
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="time_out" class="col-sm-3 control-label">End Time <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="time_out" name="end_time" required>
                      </div>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="edit_scd_action">
					@csrf
					@method('PUT')
            		<input type="hidden" id="timeid" name="id">
                <div class="form-group">
                    <label for="edit_time_in" class="col-sm-3 control-label">Name <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="edit_start_time" class="col-sm-3 control-label">Start Time <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="edit_start_time" name="start_time" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_time_out" class="col-sm-3 control-label">End Time <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="edit_end_time" name="end_time" required>
                      </div>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="del_scd_action">
					@csrf
					@method('DELETE')
            		<input type="hidden" id="del_timeid" name="id">
            		<div class="text-center">
	                	<p>DELETE SCHEDULE</p>
	                	<h2 id="del_schedule" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     