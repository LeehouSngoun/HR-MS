
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
                  @foreach ( $roles as $role)
                     <tr>
                  
                  <td>{{ $role->role }}</td>
                  <td>
                    <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#edit"
                     data-id="{{ $role->id }}"
                     data-myrole="{{ $role->role }}"
                     ><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm "data-toggle="modal" data-target="#delete"
                     data-id="{{ $role->id }}"
                     data-myrole="{{ $role->role }}"
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
  @include('layouts.role_modal')
</div>
@include('layouts.scripts')
<script>

$(function(){
 
 $('#edit').on('show.bs.modal', function (event) {
 var button = $(event.relatedTarget) 
 var role = button.data('myrole') 
 var id = button.data('id');
    $('#edit_role_action').attr('action', '/edit_role/'+id)
 var modal = $(this)
 modal.find('.modal-body #role_edit').val(role)
})

 $('#delete').on('show.bs.modal', function (event) {
 var button = $(event.relatedTarget) 
 var role = button.data('myrole') 
 var id = button.data('id');
    $('#delete_role_action').attr('action', '/delete_role/'+id)
 var modal = $(this)
 modal.find('.modal-body #dep_role').text('Delete ' + role + '?')
})

});
</script>
</body>
</html>
