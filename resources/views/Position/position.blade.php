
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
        Positions
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Positions</li>
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
                  <th>Position Title</th>
                  <th>Department</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  @foreach($positions as $pos)
                  <tr>
                  <td>{{ $pos->position }}</td>
                  <td>{{ $pos->department->department }}</td>
                  <td>
                    <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#edit" 
                      data-id="{{ $pos->id }}"
                      data-myposition = "{{ $pos->position }}"
                      data-mydepartment_id ="{{ $pos->department_id }}"
                      data-mydepartment = "{{ $pos->department->department }}"
                    ><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" 
                      data-id="{{ $pos->id }}"
                      data-myposition="{{ $pos->position }}"
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
  @include('layouts.position_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var position = button.data('myposition')
  var department_id = button.data('mydepartment_id')
  var department = button.data('mydepartment') 
  var id = button.data('id');
  $('#edit_pos_action').attr('action', '/edit_pos/'+id)
  var modal = $(this)
  modal.find('.modal-body #edit_position').val(position)
  modal.find('.modal-body #edit_department_id').val(department_id)
  modal.find('.modal-body #edit_department').val(department)
})

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var position = button.data('myposition') 
  var id = button.data('id');
  $('#del_pos_action').attr('action', '/del_pos/'+id)
  var modal = $(this)
  modal.find('.modal-body #del_pos').text('Delete ' + position + '?')
})
});

// function getRow(id){
//   $.ajax({
//     type: 'POST',
//     url: 'position_row.php',
//     data: {id:id},
//     dataType: 'json',
//     success: function(response){
//       $('#posid').val(response.id);
//       $('#edit_title').val(response.description);
//       $('#edit_rate').val(response.rate);
//       $('#del_posid').val(response.id);
//       $('#del_position').html(response.description);
//     }
//   });
// }
</script>
</body>
</html>
