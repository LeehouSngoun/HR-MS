<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Salary</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="/add_sal">
					@csrf
          		  <div class="form-group">
                  	<label for="employee" class="hidden col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="hidden form-control" id="add_employee_id" name="employee_id" required readonly>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-3 control-label">Amount</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="salary" name="salary" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="edit_effective_date" class="col-sm-3 control-label">Effective Date <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <div class="date">
                        <input type="date" class="form-control" id="add_effective_date" name="effective_date" required>
                      </div>
                    </div>
                </div>
				<div class="form-group">
                    <label for="edit_end_date" class="col-sm-3 control-label">End Date <span class="text-danger">*</span></label>

                    <div class="col-sm-9"> 
						<div class="date">
						  <input type="date" class="form-control" id="add_end_date" name="end_date" required>
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
            	<h4 class="modal-title"><b><span class="date"></span> - <span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="edit_sal_action">
					@csrf
					@method('PUT')
            		<input type="hidden" class="caid" id="edit_employee_id" name="employee_id">
                <div class="form-group">
                    <label for="edit_salary" class="col-sm-3 control-label">Amount</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_salary" name="salary" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="edit_effective_date" class="col-sm-3 control-label">Effective Date <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <div class="date">
                        <input type="date" class="form-control" id="edit_effective_date" name="effective_date" required>
                      </div>
                    </div>
                </div>
				<div class="form-group">
                    <label for="edit_end_date" class="col-sm-3 control-label">End Date <span class="text-danger">*</span></label>

                    <div class="col-sm-9"> 
						<div class="date">
						  <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
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
            	<h4 class="modal-title"><b><span class="date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="del_sal_action">
					@csrf
					@method('DELETE')
            		<input type="hidden" class="caid" id="del_employee_id" name="employee_id">
            		<div class="text-center">
	                	<p>DELETE SALARY</p>
	                	<h4 class=" bold" id="del_salary"></h4>
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


     