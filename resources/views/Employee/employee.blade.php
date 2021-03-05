@include('layouts.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.navbar')
  @include('layouts.menubar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee List
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Employee List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                  <th>Employee ID</th>
                  <th>Photo</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Position</th>
                  <th>Schedule</th>
                  <th>BirthDate</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  @foreach($employees as $emp)
                        <tr>
                          <td>PAPA-{{ sprintf("%05d",$emp->id) }}</td>
                          <td><img src="{{ isset($emp->photo)?asset('images/photo/'.$emp->photo):asset('images/profile.jpg') }}" width="30px" height="30px"> 
                            <a href="#edit_photo"  data-toggle="modal" class="pull-right photo" data-id="{{ $emp->id }}"
                                data-myphoto="{{ $emp->photo }}"
                              ><span class="fa fa-edit"></span></a></td>
                          <td>{{ $emp->first_name }}</td>
                          <td>{{ $emp->last_name }}</td>
                          <td>{{ $emp->position->position }}</td>
                          <td>{{ $emp->schedule->start_time." - ".$emp->schedule->end_time }}</td>
                          <td>{{ $emp->birthdate }}</td>
                          <td>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit" 
                            data-id="{{ $emp->id }}"
                              data-myfirstname="{{ $emp->first_name }}"
                              data-mylastname= "{{ $emp->last_name }}"
                              data-myposition_id="{{ $emp->position_id }}"
                              data-myposition="{{ $emp->position->position }}"
                              data-myschedule_id ="{{ $emp->schedule_id }}"
                              data-mystarttime="{{ $emp->schedule->start_time }}"
                              data-myendtime="{{ $emp->schedule->end_time }}"
                              data-mybirthdate="{{ $emp->birthdate }}"
                              data-mygender="{{ $emp->gender }}"
                              data-myidentity="{{ $emp->identity }}"
                              data-mycontact="{{ $emp->contact }}"
                              data-myemail="{{ $emp->email }}"
                              data-myaddress="{{ $emp->address }}"
                              data-myeducation="{{ $emp->education }}"
                              data-myskill="{{ $emp->skill }}"
                              data-myrank="{{ $emp->rank }}"
                              data-mystatus="{{ $emp->status }}"
                              data-myresign="{{ $emp->resign_date }}"
                            
                            ><i class="fa fa-edit"></i> </button>
                            <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#delete"
                              data-id="{{ $emp->id }}"
                              data-myfirstname="{{ $emp->first_name }}"
                              data-mylastname= "{{ $emp->last_name }}"
                              data-myposition="{{ $emp->position->position }}"
                              ><i class="fa fa-trash"></i> </button>
                            <a href="/salary/{{ $emp->id }}"><button class="btn btn-primary btn-sm">Salary</button></a>
                            <a href="/overtime/{{ $emp->id }}"><button class="btn btn-info btn-sm">OT</button></a>
                            {{-- <a href="/payslip/{{ $emp->id }}" ><button class="btn btn-secondary btn-sm">Pay</button></a> --}}
                          </td>
                        </tr>
                  @endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    

  @include('layouts.employee_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var first_name = button.data('myfirstname')
  var last_name = button.data('mylastname')
  var position_id = button.data('mypositionid')
  var position = button.data('myposition')
  var schedule_id = button.data('myscheduleid')
  var start_time = button.data('mystarttime')
  var end_time = button.data('myendtime')
  var birthdate = button.data('mybirthdate')
  var gender = button.data('mygender')
  var identity = button.data('myidentity')
  var contact = button.data('mycontact')
  var email = button.data('myemail')
  var address = button.data('myaddress')
  var skill = button.data('myskill')
  var education = button.data('myeducation')
  var rank = button.data('myrank')
  var status = button.data('mystatus')
  var resign_date = button.data('myresign')
  var id = button.data('id');
  $('#edit_emp_action').attr('action', '/edit_emp/'+id)
  var modal = $(this)

  modal.find('.modal-body #edit_firstname').val(first_name)
  modal.find('.modal-body #edit_lastname').val(last_name)
  modal.find('.modal-body #edit_start_time').val(start_time)
  modal.find('.modal-body #edit_end_time').val(end_time)
  modal.find('.modal-body #edit_birthdate').val(birthdate)
  modal.find('.modal-body #edit_gender').val(gender)
  modal.find('.modal-body #edit_identity').val(identity)
  modal.find('.modal-body #edit_contact').val(contact)
  modal.find('.modal-body #edit_email').val(email)
  modal.find('.modal-body #edit_address').val(address)
  modal.find('.modal-body #edit_skill').val(skill)
  modal.find('.modal-body #edit_education').val(education)
  modal.find('.modal-body #edit_rank').val(rank)
  modal.find('.modal-body #edit_status').val(status)
  modal.find('.modal-body #edit_resign_date').val(resign_date)
  if(status == 'resigned'){
    modal.find('.modal-body #edit_resign_date').prop("readonly",true);
  }
  else
    modal.find('.modal-body #edit_resign_date').prop("readonly",false);
})

  $('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var first_name = button.data('myfirstname')
  var last_name = button.data('mylastname')
  var position = button.data('myposition') 
  var id = button.data('id');
  $('#del_emp_action').attr('action', '/del_emp/'+id)
  var modal = $(this)
  modal.find('.modal-body #del_emp').text('Delete ' + first_name + ' ' + last_name + ' Position ' + position + '?')
})

  $('.photo').click(function(e){
    e.preventDefault();
    // var a = $(event.relatedTarget) 
    var photo = $(this).data('myphoto')
    alert(photo)
    
    // alert(id);
    // var src = "{{ url('images/photo/" + photo +  "') }}";
    // alert(src);
    // $('#src_photo').attr('src',src);
    var id = $(this).data('id');
    $('#edit_emp_photo_action').attr('action', '/edit_emp_photo/'+id)
    var modal = $(this)
    
    // getRow(id);
  });

});
</script>
</body>
</html>
