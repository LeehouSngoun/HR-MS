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
        Schedules
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Schedules</li>
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
                  <th>Name</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  @foreach($schedules as $scd)
                  <tr>
                  <td>{{ $scd->name }}</td>
                  <td>{{ $scd->start_time }}</td>
                  <td>{{ $scd->end_time }}</td>
                  <td>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit"
                      data-id="{{ $scd->id }}"
                      data-myname = "{{ $scd->name }}"
                      data-mystarttime = "{{ $scd->start_time }}"
                      data-myendtime="{{ $scd->end_time }}"
                    ><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"
                      data-id="{{ $scd->id }}"
                      data-myname="{{ $scd->name }}"
                      data-mystarttime="{{ $scd->start_time }}"
                      data-myendtime="{{ $scd->end_time }}"
                    ><i class="fa fa-trash"></i> Delete</button>
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
  @include('layouts.schedule_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var name = button.data('myname')
  var start_time = button.data('mystarttime') 
  var end_time = button.data('myendtime')
  var id = button.data('id');
    $('#edit_scd_action').attr('action', '/edit_scd/'+id)
  var modal = $(this)
  modal.find('.modal-body #edit_name').val(name)
  modal.find('.modal-body #edit_start_time').val(start_time)
  modal.find('.modal-body #edit_end_time').val(end_time)
})

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var name = button.data('myname') 
    var start_time = button.data('mystarttime')
    var end_time = button.data('myendtime')
    var id = button.data('id');
    $('#del_scd_action').attr('action', '/del_scd/'+id)
    var modal = $(this)
    modal.find('.modal-body #del_schedule').text('Delete ' + name + ' ' + start_time + ' - ' + end_time + '?')
  })
});

</script>
</body>
</html>
