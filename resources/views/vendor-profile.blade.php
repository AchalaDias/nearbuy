@extends('layouts.app')
@section('content')
<div class="container py-5 my-5">
  <section class="p-md-5 mx-md-5 text-center text-lg-left grey z-depth-1"
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background2.jpg);">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body m-3">
            <div class="row">
              <div class="col-lg-4 d-flex mb-2 align-items-center">
                <div class="avatar mx-4 w-100 white d-flex justify-content-center align-items-center">
                  <img src="{{ $vendor->image }}" class="rounded-circle img-fluid z-depth-1" alt="woman avatar">
                </div>
              </div>
              <div class="col-lg-8">
                <p class="font-weight-bold lead mb-2"><strong>{{ $vendor->name }} </strong></p>
                <p class="font-weight-bold text-muted mb-0"><a class="btn btn-primary btn-sm"><i class="fas fa-phone"></i> : {{ $vendor->contact_no }}</a></p>
                <p class="text-muted font-weight-light mb-4"> <a class="btn btn-primary btn-sm" href="{{ $vendor->web_url }}" target="_blank" ><i class="fas fa-mouse-pointer"></i> : Visit Website </a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection