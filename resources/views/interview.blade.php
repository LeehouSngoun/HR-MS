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
        Interview
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cadidate </li>
        <li class="active">Interview List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                  <th>Photo</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Apply for Position</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Verify</th>
                </thead>
                <tbody>
                  
                        <tr>
                          <td><img src="{{ asset('images/profile.jpg') }}" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id=""><span class="fa fa-edit"></span></a></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <a href="" Class="btn btn-success">Accept</a>
                            <a href="" Class="btn btn-danger">Reject</a>
                          </td>
                        </tr>
                      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    

  @include('layouts.cadidate_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#position_val').val(response.position_id).html(response.description);
      $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
