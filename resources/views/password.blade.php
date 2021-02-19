
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
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Password</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <button type="submit" class="btn btn-success" name="save"><i class="fa fa-check-square-o"></i> Save Change</button>
          </div>
        </div>
      </div>
    </div>
    
      <!-- Add -->
<div >
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
                {{-- <span aria-hidden="true">&times;</span></button> --}}
            <h4 class="modal-title"><b>Change Your Password</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
              
              <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password</label>

                  <div class="col-sm-9"> 
                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Your Current Password">
                  </div>
              </div>
              
              
              
              <hr>
              <div class="form-group">
                  <label for="curr_password" class="col-sm-3 control-label">New Password:</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input new password to save changes" required>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"> Clear</button>
            
            </form>
          </div>
      </div>
  </div>
</div>
</section>
  </div>
    
  @include('layouts.footer')
  {{-- @include('layouts.role_modal') --}}
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
