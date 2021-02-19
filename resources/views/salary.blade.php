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
        Salary
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Salary</li>
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
                  <th class="hidden"></th>
                  
                  <th>Employee ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Amount</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
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
  @include('layouts.salary_modal')
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
    url: 'cashadvance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      console.log(response);
      $('.date').html(response.date_advance);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.caid').val(response.caid);
      $('#edit_amount').val(response.amount);
    }
  });
}
</script>
</body>
</html>
