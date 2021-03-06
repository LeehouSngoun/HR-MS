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
        Salary List of {{ $employee->first_name .' ' . $employee->last_name .' ID: PAPA-'. sprintf("%05d",$employee->id)}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/employee"> Employees</a></li>
        <li class="active">Salary</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h4>Current Salary of {{ $employee->first_name . ' ' . 
                $employee->last_name .' is '}}
                @if(!is_null($last_date))
                {{ $last_date->salary }}
                @endif
              </h4>
              <button data-id="{{ $employee->id }}" data-target="#addnew" data-toggle="modal" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> New</button>
            </div>
            <div class="box-body">
              
              <table id="example2" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  
                  <th>Amount</th>
                  <th>Effective Date</th>
                  <th>End Date</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <tr>
                    @if(!is_null($filters))
                  @foreach( $filters as $filter)
                  <td>{{ $filter->salary }}</td>
                  <td>{{ $filter->effective_date }}</td>
                  <td>{{ $filter->end_date }}</td>
                  <td>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit"
                      data-id="{{ $filter->id }}"
                      data-myemployeeid = "{{ $filter->employee_id }}"
                      data-mysalary ="{{ $filter->salary }}"
                      data-myeffectivedate = "{{ $filter->effective_date }}"
                      data-myenddate ="{{ $filter->end_date }}"
                    ><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"
                      data-id="{{ $filter->id }}"
                      data-myemployeeid = "{{ $filter->employee_id }}"
                      data-mysalary ="{{ $filter->salary }}"
                      data-myeffectivedate = "{{ $filter->effective_date }}"
                      data-myenddate ="{{ $filter->end_date }}"
                    ><i class="fa fa-trash"></i> Delete</button>
                  </td>
                </tr>
                  @endforeach
                  @endif
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
