<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Employee</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="/employee_add" enctype="multipart/form-data">
                @csrf
          		  <div class="form-group">
                  	<label for="first_name" class="col-sm-3 control-label">Firstname <span class="text-danger">*</span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="first_name" name="first_name" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="last_name" class="col-sm-3 control-label">Lastname <span class="text-danger">*</span></label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="last_name" name="last_name" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="datepicker_add" class="col-sm-3 control-label">Birthdate <span class="text-danger">*</span></label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="birthdate" required>
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact Info <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender <span class="text-danger">*</span></label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="gender" required>
                        <option value="" selected>- Select -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position_id" class="col-sm-3 control-label">Position </label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position_id" id="position_id">
                        @foreach($positions as $pos)
                          <option value="{{ $pos->id }}" >{{ $pos->position }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="schedule_id" class="col-sm-3 control-label">Schedule</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="schedule_id" name="schedule_id">
                        @foreach($schedules as $scd)
                        <option value="{{ $scd->id }}" >{{ $scd->start_time ." - ". $scd->end_time }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" id="photo">
                    </div>
                </div>
                <div class="form-group">
                  <label for="identity" class="col-sm-3 control-label">Identity Card <span class="text-danger">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="identity" name="identity" required>
                  </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>

                <div class="col-sm-9">
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
                <div class="form-group">
                  <label for="address" class="col-sm-3 control-label">Address <span class="text-danger">*</span></label>

                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" id="address" required></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Education</label>

                <div class="col-sm-9">
                  <textarea class="form-control" name="education" id="education"></textarea>
                </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-3 control-label">Skill</label>

              <div class="col-sm-9">
                <textarea class="form-control" name="skill" id="skill"></textarea>
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
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="edit_emp_action">
                @csrf
                @method('PUT')
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="first_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="last_name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Birthdate <span class="text-danger">*</span></label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="edit_birthdate" name="birthdate" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="edit_identity" class="col-sm-3 control-label">Identity <span class="text-danger">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_identity" name="identity" required>
                  </div>
              </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact Info <span class="text-danger">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="edit_email" class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>

                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="edit_email" name="email" required>
                  </div>
              </div>
                <div class="form-group">
                    <label for="edit_gender" class="col-sm-3 control-label">Gender <span class="text-danger">*</span></label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="edit_gender" required>
                        <option selected id="gender_val"></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position_id" id="edit_position" >
                        @foreach($positions as $pos)
                        <option value="{{ $pos->id }}" 
                          @if($emp->position_id === $pos->id)
                          selected="selected"
                          @endif
                          >{{ $pos->position }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_schedule" class="col-sm-3 control-label">Schedule</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_schedule" name="schedule_id" >
                        @foreach($schedules as $scd)
                        <option value="{{ $scd->id }}"
                          @if($scd->id === $emp->schedule_id)
                            selected="selected"
                          @endif
                        >{{ $scd->start_time ." - " . $scd->end_time }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="edit_address" class="col-sm-3 control-label">Address <span class="text-danger">*</span></label>

                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" id="edit_address" required></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label for="edit_address" class="col-sm-3 control-label">Education</label>

                <div class="col-sm-9">
                  <textarea class="form-control" name="education" id="edit_ecducation"></textarea>
                </div>
            </div>
            <div class="form-group">
              <label for="edit_address" class="col-sm-3 control-label">Skill</label>

              <div class="col-sm-9">
                <textarea class="form-control" name="skil" id="edit_skill"></textarea>
              </div>
          </div>
          <div class="form-group">
            <label for="edit_rank" class="col-sm-3 control-label">Rank</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_rank" name="rank">
            </div>
        </div>
        <div class="form-group">
          <label for="edit_status" class="col-sm-3 control-label">Status <span class="text-danger">*</span></label>

          <div class="col-sm-9">
            <select name="status" id="edit_status" class="form-control">
              <option value="pro-Active">Pro-Active</option>
              <option value="active">Active</option>
              <option value="resigned">Resigned</option>
            </select>
          </div>
      </div>
      <div class="form-group">
        <label for="edit_resign_date" class="col-sm-3 control-label">Resigned Date</label>

        <div class="col-sm-9">
          <input type="date" class="form-control" id="edit_resign_date" name="resign_date">
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
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" id="del_emp_action">
                @csrf
                @method('DELETE')
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE EMPLOYEE</p>
	                	<h4 class="bold " id ="del_emp"></h4>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="edit_emp_photo_action" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <div style="background-color: grey;border-box:2px; border-color:black; border-radius:8px; width:100px; height:100px;">
                        <img style="height:100px" id="src_photo" >
                      </div><br>  
                      <input type="file" id="edit_photo" name="photo">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    