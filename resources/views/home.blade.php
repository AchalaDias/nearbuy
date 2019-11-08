@extends('layouts.app')
@section('content')

<div class="container">
    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide " data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg" alt="First slide">
                        <div class="mask rgba-black-light"></div>
                    </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Light mask</h3>
                    <p>First text</p>
                </div>
            </div>
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"alt="Second slide">
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Strong mask</h3>
                    <p>Secondary text</p>
                </div>
            </div>
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
    </div>
    <!--/.Slides-->
   <hr>
   <h2 class="section-heading">
    Categories
    <a href="{{ route('web.category.list') }}" class="btn btn-danger btn-sm waves-effect waves-light" role="button">
      view more
      
    </a>
  </h2>
  <br>

<div class="row">
    @foreach($main_categories as $main_category)
    @if($main_category->id != 1 && $main_category->status == 1)
        <!-- Grid column -->
        <div class="col-lg-3 col-md-6 mb-3">

            <!-- Card Wider -->
            <div class="card card-cascade wider">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top" src="{{ $main_category->image_path }}" width="100" height="170" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight waves-effect waves-light"></div>
                    </a>
                </div>

                <div class="card-body card-body-cascade">

                <!-- Label -->
                <h5 class="blue-text pb-2 pt-1"></i> {{ $main_category->name }} </h5>
                <!-- Button -->
                <a href="{{ route('web.items.list', ['id' => $main_category->id ]) }}" class="btn btn-primary waves-effect waves-light">show</a>
                </div>
            </div>
        </div>
       <!-- Card Wider -->
       @endif
    @endforeach
</div>

<hr>

 <div class="container pt-5 my-5 z-depth-1">
  <section class="p-md-3 mx-md-5 text-lg-left">
  <div class="card-body text-center">
        <button class="btn btn-default">Featured Stores & Brands You Love </button>
    </div>
    <p class="text-center lead mb-5 pb-2 text-muted">Find all the latest offers and discounts from Local Banks, Credit Cards Discounts, Restaurant Food Menu, Hotel Offers, Food and Drink Deals, Happy Hours, Clothing Offers, Electronics Deals, Healthcare Packages, Latest Events, Holiday Deals and Local Business Details From One Place.</p>
    <div class="row">
    @foreach($vendors as $vendor)
    <div class="col-lg-4 col-sm-6 mb-5">
        <div class="row d-flex align-items-center">
          <div
            class="col-5 avatar w-100 white d-flex justify-content-center align-items-center"
          >
            <img
              src="{{ $vendor->image }}"
              class="img-fluid rounded-circle z-depth-1" />
          </div>
          <div class="col-7">
            <h6 class="font-weight-bold pt-2">{{ $vendor->name }}</h6>
            <p class="text-muted">
                <a  href="{{ route('web.show.vendor', ['id' => $vendor->id ]) }}" target="_blank"><span class="badge brown mr-2">Profile <i class="fas fa-id-card-alt"></i></span></a>
              <!-- Software Engineer -->
            </p>
          </div>
        </div>
    </div>
    @endforeach

  </section>
</div>




<div class="container my-5">


  <!--Section: Content-->
  <section class="p-5 z-depth-1 white-text grey">
    
    <h3 class="text-center font-weight-bold mb-4 pb-2">Counter</h3>

    <div class="row mb-4">

      <div class="col-md-4">
        <div class="row">
          <div class="col-6 pr-0">
            <h4 class="display-4 text-right mb-0 count-up" data-from="0" data-to="42" data-time="2000">42</h4>
          </div>

          <div class="col-6">
            <p class="text-uppercase font-weight-normal mb-1">Projects</p>
            <p class="mb-0"><i class="fas fa-briefcase fa-2x mb-0"></i></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="row">
          <div class="col-6 pr-0">
            <h4 class="display-4 text-right mb-0 count1" data-from="0" data-to="3500" data-time="2000">3,500</h4>
          </div>

          <div class="col-6">
            <p class="text-uppercase font-weight-normal mb-1">Customers</p>
            <p class="mb-0"><i class="fas fa-user fa-2x mb-0"></i></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="row">
          <div class="col-6 pr-0">
            <h4 class="display-4 text-right"><span class="d-flex justify-content-end"><span class="count2" data-from="0" data-to="100" data-time="2000">0</span> %</span></h4>
          </div>

          <div class="col-6">
            <p class="text-uppercase font-weight-normal mb-1">Satisfaction</p>
            <p class="mb-0"><i class="fas fa-smile fa-2x mb-0"></i></p>
          </div>
        </div>
      </div>

    </div>

  </section>
  <!--Section: Content-->


</div>

@endsection

