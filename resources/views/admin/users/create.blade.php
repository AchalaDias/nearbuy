@extends('layouts.admin-panel')
@section('content')
<section class="content">
<div class="col-md-12">
<div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Create User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="{{ route('admin.user.submit') }}">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                  <span style="color:red">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                  <label for="Email">Name</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                  <span style="color:red">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <span style="color:red">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group">
                  <label for="ConfirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <div class="form-group">
                  <label for="Password">Select Role</label>
                  <div class="form-group">
                  <select class="form-control" id="role" name="role" value="{{ old('role') }}" required>
                  <option  disabled selected>Select....</option>
                    @foreach($roles as $role)
                        @if($role->id != 1)
                            @if (old('role')  == $role->id)
                                <option value="{{ $role->id }}" selected>{{  $role->role_name }}</option>
                            @else
                                <option value="{{ $role->id }}">{{  $role->role_name }}</option>
                            @endif
                        @endif
                    @endforeach
                  </select>
                  <span style="color:red">{{ $errors->first('role') }}</span>
                </div>
                </div>


                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
</section>
@endsection