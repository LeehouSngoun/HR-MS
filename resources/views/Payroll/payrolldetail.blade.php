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
        #1 Payrolls Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/payroll"> Payrolls</a></li>
        <li class="active">Payroll Generate</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              
              <button data-id="" data-target="#addnew" data-toggle="modal" class="btn btn-primary" style="float: right;">Confirm</button>
            </div>
            <div class="box-body">
              
              <table id="example2" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  
                  <th>Employee ID</th>
                  <th>Fisrt Name</th>
                  <th>Last Name</th>
                  <th>Position</th>
                  <th>Basic Pay</th>
                  <th>Overtime Pay</th>
                  <th>Net Pay</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  @foreach ($payroll_details as $pay_detail)
                  <tr>
                    <td>PAPA-{{sprintf("%05d",$pay_detail->employee_id) }}</td>
                    <td>{{ $pay_detail->employee->first_name }}</td>
                    <td>{{ $pay_detail->employee->last_name }}</td>
                    <td>{{ $pay_detail->employee->position->position }}</td>
                    <td>{{ $pay_detail->basic_pay }}</td>
                    <td>{{ $pay_detail->overtime_allowance }}</td>
                    <td>{{ $pay_detail->net_pay }}</td>
                    <td>
                      <a href="/payroll_detail_each/view/{{ $pay_detail->id }}"><button>Print</button></a>
                      <a href="/payroll_detail_each/edit/{{ $pay_detail->id }}"><button>Edit</button></a>
                      <a href="/payroll_detail_each/delete/{{ $pay_detail->id }}"><button>Delete</button></a>
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
    
  @include('layouts.footer')
  @include('layouts.salary_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  $('#addnew').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id')
  // alert(id)
  var modal = $(this)
  modal.find('.modal-body #add_employee_id').val(id)
  });
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var salary = button.data('mysalary')
  var effective_date = button.data('myeffectivedate') 
  var end_date = button.data('myenddate')
  var employee_id = button.data('myemployeeid')
  var id = button.data('id');
    $('#edit_sal_action').attr('action', '/edit_sal/'+id)
  var modal = $(this)
  modal.find('.modal-body #edit_employee_id').val(employee_id)
  modal.find('.modal-body #edit_salary').val(salary)
  modal.find('.modal-body #edit_effective_date').val(effective_date)
  modal.find('.modal-body #edit_end_date').val(end_date)
})

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var salary = button.data('mysalary')
    var effective_date = button.data('myeffectivedate') 
    var end_date = button.data('myenddate')
    var employee_id = button.data('myemployeeid')
    var id = button.data('id');
    $('#del_sal_action').attr('action', '/del_sal/'+id)
    var modal = $(this)
    modal.find('.modal-body #del_employee_id').val(employee_id)
    modal.find('.modal-body #del_salary').text(salary + ' ' + effective_date + ' - ' + end_date)
  })
});
</script>
</body>
</html>
