@extends('layouts.app')
@section('content')

<div class="container mt-5">


  <!--Section: Content-->
  <section class="mx-md-5 dark-grey-text text-center">
    
    <!-- Section heading -->
    <h3 class="font-weight-bold mb-4 pb-2">All Categories</h3>
    <!-- Section description -->


  	<!-- Grid row -->
    <div class="row">

    @foreach($main_categories as $main_category)
    @if($main_category->id != 1 && $main_category->status == 1)
      <a href="{{ route('web.items.list', ['id' => $main_category->id ]) }}">
      <!-- Grid column -->
      <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
        <!-- Collection card -->
        <div class="card collection-card z-depth-1-half">
          <!-- Card image -->
          <div class="view zoom">
            <img src="{{ $main_category->image_path }}" class="img-fluid"
              alt="">
            <div class="stripe dark">
              <a>
                <p>{{ $main_category->name }}
                  <i class="fas fa-angle-right"></i>
                </p>
              </a>
            </div>
          </div>
          <!-- Card image -->
        </div>
        <!-- Collection card -->
      </div>
      <!-- Grid column -->
      </a>
      @endif
    @endforeach
    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->


</div>

<br><br>
@endsection