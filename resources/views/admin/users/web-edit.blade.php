@extends('layouts.admin-panel')
@section('content')
<section class="content">
<div class="col-md-12">
<div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Edit Web User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="{{ route('admin.web-users.edit.submit') }}">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Name">Name</label>
                  @if(old('name'))
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                  @else
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Name" required>
                  @endif
                  <input type="text" value="{{$user->id }}" name="id" id="id" hidden>
                  <span style="color:red">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email" required readonly>
                  <span style="color:red">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                  <label for="Password">New Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <span style="color:red">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group">
                  <label for="ConfirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
</section>

@endsection