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
        Add New User
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Add New User</li>
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
                  <th>User Name</th>
                  <th>Role</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  
                  @forelse( $users as $user )
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->role->role ?? null }}</td>
                          <td>
                            <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#edit" 
                            data-id="{{ $user->id }}"
                            data-myname ="{{ $user->name }}"
                            data-myemail ="{{ $user->email }}"
                            data-myroleid = "{{ $user->role_id }}"
                            ><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" data-id="{{ $user->id }}"><i class="fa fa-trash"></i> Delete</button>
                          </td>
                        </tr>
                        @empty

                  @endforelse   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    

  @include('layouts.user_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var name = button.data('myname')
  var role_id = button.data('myroleid')
  var email = button.data('myemail') 
  var id = button.data('id');
  $('#edit_user_action').attr('action', '/edit_user/'+id)
  var modal = $(this)
  modal.find('.modal-body #edit_name').val(name)
  modal.find('.modal-body #edit_role_id').val(role_id)
  modal.find('.modal-body #edit_email').val(email)
})

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id');
  $('#del_user_action').attr('action', '/delete_user/'+id)
  var modal = $(this)
  // modal.find('.modal-body #delete_user').text('Delete ' '?')
})
});
</script>
</body>
</html>
