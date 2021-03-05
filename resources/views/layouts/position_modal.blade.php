<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Position</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="/add_pos">
					@csrf
          		  <div class="form-group">
                  	<label for="title" class="col-sm-3 control-label">Position Title <span class="text-danger">*</span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="title" name="position" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="rate" class="col-sm-3 control-label">Department <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
						<select class="form-control" name="department_id" id="">
							@foreach($departments as $dep)
							<option value="{{ $dep->id }}">{{ $dep->department }}</option>
							@endforeach
						</select>
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
            	<h4 class="modal-title"><b>Update Position</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="edit_pos_action">
					@csrf
					@method('PUT')
            		<input type="hidden" id="posid" name="id">
                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Position Title <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_position" name="position">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_rate" class="col-sm-3 control-label">Department <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
						<select class="form-control" name="department_id" id="edit_department_id">
							@foreach($departments as $dep)
							<option value="{{ $dep->id }}"
								@if($dep->id === $pos->department_id)
									selected ="selected"
									{{-- value="{{ $dep->id }}" --}}
								@endif
								{{-- value="{{ $pos->department_id }}" --}}
							>{{ $dep->department }}</option>
							@endforeach
						</select>
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
            	<form class="form-horizontal" id="del_pos_action" method="POST" >
					@csrf
					@method('DELETE')
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p >DELETE POSITION</p>
	                	<h2 id="del_pos" class="bold"></h2>
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


     