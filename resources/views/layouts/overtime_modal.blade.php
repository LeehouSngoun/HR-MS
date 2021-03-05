<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Overtime</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="/add_over">
                @csrf
                <div class="form-group">
                  <input type="text" class="hidden" name="employee_id" id="add_employee_id">
                </div>
          		  <div class="form-group">
                  	<label for="start_date" class="col-sm-3 control-label">Start Date</label>

                  	<div class="col-sm-9">
                      <div class="date">
                    	<input type="date" class="form-control" id="add_start_date" name="start_date" required>
                  	</div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">End Date</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="add_end_date" name="end_date" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="hours" class="col-sm-3 control-label">No. of Hours</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="hour" name="hour">
                  	</div>
                </div>
                
                 <div class="form-group">
                    <label for="rate" class="col-sm-3 control-label">Rate per Hour</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="rate" name="rate" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="reason" class="col-sm-3 control-label">Reason</label>
                  <div class="col-sm-9">
                    <textarea name="reason" id="add_reason" cols="20" rows="5" class="form-control"></textarea>
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
            	<h4 class="modal-title"><b><span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="edit_over_action">
                @csrf
                @method('PUT')
            		<input type="hidden" class="otid" id="edit_employee_id" name="employee_id">
                <div class="form-group">
                    <label for="start_date" class="col-sm-3 control-label">Start Date</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="end_date" class="col-sm-3 control-label">End Date</label>

                  <div class="col-sm-9"> 
                    <div class="date">
                      <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
                    </div>
                  </div>
              </div>
                <div class="form-group">
                    <label for="hour" class="col-sm-3 control-label">No. of Hours</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_hour" name="hour">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rate" class="col-sm-3 control-label">Rate</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_rate" name="rate">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="reason" class="col-sm-3 control-label">Reason</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_reason" name="reason" required>
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
            	<h4 class="modal-title"><b><span id="overtime_date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="del_over_action">
                @csrf
                @method('DELETE')
            		<input type="hidden" class="otid" name="id">
            		<div class="text-center">
	                	<p>DELETE OVERTIME</p>
	                	<h2 class="bold " ></h2>
                    <input type="text" class="hidden" id="del_employee_id" name="employee_id" >
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


     