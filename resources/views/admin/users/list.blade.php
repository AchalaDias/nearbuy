@extends('layouts.admin-panel')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users 
        <!-- @isset($notification)
        {{ $notification['message'] }}
        @endisset -->
        <small>List</small>
        <a href="{{ route('admin.users.create') }}" class="btn bg-maroon btn-flat margin">Create New User</a>
      </h1>
      <br>

        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Role</th>
                  <th>Created Date</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                <tr>
                  <td class="center">{{ $user->id }}</td>
                  <td class="center">{{ $user->name }}</td>
                  <td class="center">{{ $user->email }}</td>
                  <td class="center">{{ App\Role::find($user->role_id)->role_name }}</td>
                  <td class="center">{{ $user->created_at }}</td>
                  <td>
                  @if($user->role_id != 1)
                  <div class="btn-group">
                  <!-- <button type="button" class="btn btn-info">Action</button> -->
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('admin.users.edit', ['id' => $user->id ]) }}">Edit</a></li>
                    <li> 
                      <a onclick="delUser( {{ $user->id }} )"  data-toggle="modal" data-target="#modal-info">
                        Delete
                      </a>
                    </li>
                
                  </ul>
                </div>
                  @endif
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </section>
</div>
@endsection

<!-- @component('components.delete-model')
  @solt('body')
   /admin/user/delete
  @endsolt
  @solt('item_id')
    $delete_item_id
  @endsolt
@endcomponent -->
<script>
function delUser(item_id) {
  document.getElementById('item_id').value=item_id;
}
</script>
<div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <form method="POST" action="{{ route('admin.users.delete') }}">
              @csrf
              <div class="modal-body">
                <p>Are you sure that you want to delete this <strong>User</strong> ? </p>
                <input type="text" id="item_id" name="item_id" hidden>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Yes Delete</button>
              </div>

            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal --



 

