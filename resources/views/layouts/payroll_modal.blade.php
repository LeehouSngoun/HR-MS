<!-- Add -->
<div class="modal fade" id="generate">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Generate Payrolls</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" id="generate_payroll_action" action="/payroll_generate">
				@csrf
          		 <h4>Are you sure? You want to Generate Payrolls!</h4>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> No</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Yes</button>
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


     