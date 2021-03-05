
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
        Roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Roles</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" style="float: right;"><i class="fa fa-plus"></i> New Role</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Role</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <td></td>
                  <td>
                    <button class="btn btn-success btn-sm edit" data-id=""><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm delete" data-id=""><i class="fa fa-trash"></i> Delete</button>
                  </td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  @include('layouts.footer')
  @include('layouts.role_modal')
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
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'overtime_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      var time = response.hours;
      var split = time.split('.');
      var hour = split[0];
      var min = '.'+split[1];
      min = min * 60;
      console.log(min);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.otid').val(response.otid);
      $('#datepicker_edit').val(response.date_overtime);
      $('#overtime_date').html(response.date_overtime);
      $('#hours_edit').val(hour);
      $('#mins_edit').val(min);
      $('#rate_edit').val(response.rate);
    }
  });
}
</script>
</body>
</html>
