
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
        Overtime List of {{ $employee->first_name . ' ' . $employee->last_name }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/employee"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Overtime</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <button data-target="#addnew" data-toggle="modal" class="btn btn-primary" style="float: right;" data-id="{{ $employee->id }}"
              ><i class="fa fa-plus"></i> New</button>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  
                  <th>No. of Hours</th>
                  <th>Rate per Hour</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Reason</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  @if(!is_null($filters))
                  @foreach($filters as $filter)
                    <tr>
                      <td>{{ $filter->hour }}</td>
                      <td>{{ $filter->rate }}</td>
                      <td>{{ $filter->start_date }}</td>
                      <td>{{ $filter->end_date }}</td>
                      <td>{{ Str::limit($filter->reason,80) }}</td>
                  
                      <td>
                        @if($filter->status === 'unpaid')
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit" data-id="{{ $filter->id }}"
                          data-myemployeeid = "{{ $filter->employee_id }}"
                          data-myhour="{{ $filter->hour }}"
                          data-myrate="{{ $filter->rate }}"
                          data-mystartdate="{{ $filter->start_date }}"
                          data-myenddate="{{ $filter->end_date }}"
                          data-myreason="{{ $filter->reason }}"
                        ><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" data-id="{{ $filter->id }}"
                          data-myemployeeid = "{{ $filter->employee_id }}"
                          ><i class="fa fa-trash"></i> Delete</button>
                          @endif
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
  @include('layouts.overtime_modal')
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
  var hour = button.data('myhour')
  var rate = button.data('myrate')
  var start_date = button.data('mystartdate') 
  var end_date = button.data('myenddate')
  var reason = button.data('myreason')
  var employee_id = button.data('myemployeeid')
  var id = button.data('id');
  // alert(id)
    $('#edit_over_action').attr('action', '/edit_over/'+id)
  var modal = $(this)
  modal.find('.modal-body #edit_employee_id').val(employee_id)
  modal.find('.modal-body #edit_hour').val(hour)
  modal.find('.modal-body #edit_rate').val(rate)
  modal.find('.modal-body #edit_start_date').val(start_date)
  modal.find('.modal-body #edit_reason').val(reason)
  modal.find('.modal-body #edit_end_date').val(end_date)
});

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var employee_id = button.data('myemployeeid')
    var id = button.data('id');
    $('#del_over_action').attr('action', '/del_over/'+id)
    var modal = $(this)
    modal.find('.modal-body #del_employee_id').val(employee_id)
  });
});
</script>
</body>
</html>
