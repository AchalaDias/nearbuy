@extends('layouts.admin-panel')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Items 
        <!-- @isset($notification)
        {{ $notification['message'] }}
        @endisset -->
        <small>List</small>
        <a href="{{ route('admin.items.create') }}" class="btn bg-maroon btn-flat margin">Create New Item</a>
      </h1>
      <br>

        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Title</th>
                  <th>Promotion Starts</th>
                  <th>Promotion Until</th>
                  <th>Created Date</th>
                  <th>Banner</th>
                  <th>Display Status</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($items as $item)
                <tr>
                  <td class="center">{{ $item->id }}</td>
                  <td class="center">{{ $item->title }}</td>
                  <td class="center">{{ $item->promo_start }}</td>
                  <td class="center">{{ $item->promo_until }}</td>
                  <td class="center">{{ $item->created_at }}</td>
                  <td class="center"><img src="{{ $item->image }}" width="100" height="100"></td>
                  <td>
                  @if($item->status == 0)
                    <span class="badge bg-red">off</span>
                  @else
                    <span class="badge bg-green">on</span>
                  @endif
                  </td>
                  <td>
                  <div class="btn-group">
                  <!-- <button type="button" class="btn btn-info">Action</button> -->
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('admin.items.edit', ['id' => $item->id ]) }}">Edit</a></li>
                    <li> 
                      <a onclick="delUser( {{ $item->id }} )"  data-toggle="modal" data-target="#modal-info">
                        Delete
                      </a>
                    </li>
                
                  </ul>
                </div>
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
              <form method="POST" action="{{ route('admin.items.delete') }}">
              @csrf
              <div class="modal-body">
                <p>Are you sure that you want to delete this <strong>Item</strong> ? </p>
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



 

