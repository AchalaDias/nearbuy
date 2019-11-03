@extends('layouts.admin-panel')
@section('content')
<section class="content">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <vendor-profile :user="{{ Auth::user() }}" :vendor_loarded="{{ $vendor }}" ></vendor-profile>
        </div>
    </div>
</section>
@endsection