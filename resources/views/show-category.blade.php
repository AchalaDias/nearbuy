@extends('layouts.app')
@section('content')

<div class="container mt-5">


  <!--Section: Content-->
  <section class="magazine-section mx-md-5 dark-grey-text">

  	<!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-6 col-md-12">

        <!-- Featured news -->
        <div class="single-news mb-lg-0 mb-4">

          <!-- Image -->
          <div class="view overlay rounded z-depth-1-half mb-4">
            <!-- <img class="img-thumbnail" src="{{ $category->image_path}}" alt="Sample image" style="width: 200px"> -->
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Excerpt -->
          <h3 class="font-weight-bold dark-grey-text mb-3"><a>{{ $category->name}}</a></h3>

        </div>
        <!-- Featured news -->

        <!--Panel-->
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
            @if(!is_null($sub_list))
                Empty List
            @endif
            @foreach($sub_list as $sub_cat)
            <a href="{{ route('web.sub.items.list', ['main_id' => $category->id, 'sub_id' => $sub_cat->id ]) }}">
                <li class=" waves-effect list-group-item d-flex justify-content-between align-items-center">
                    {{ $sub_cat->name }}
                <span class="badge badge-primary badge-pill">{{ $sub_cat->item_count }}</span>
                </li>
            </a>
            @endforeach
            

            </ul>
            </div>
        </div>
        <!--/.Panel-->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-6 col-md-12">
    @foreach($items_list as $items)
        <!-- Small news -->
        <div class="single-news mb-4">

          <!-- Grid row -->
          <div class="row">
            <a href="{{ route('web.show.item', ['id' => $items->id ]) }}" >
            <!-- Grid column -->
            <div class="col-md-3">

              <!--Image-->
              <div class="view overlay rounded z-depth-1 mb-4">
                <img class="img-fluid" src="{{ $items->image }}" alt="Sample image">
                <a href="{{ route('web.show.item', ['id' => $items->id ]) }}">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-9">

              <!-- Excerpt -->
              <p class="font-weight-bold dark-grey-text" > <button class="btn peach-gradient">Expiary Date : {{ date('Y-m-d', strtotime($items->promo_until)) }}</button> </p>
              <div class="d-flex justify-content-between">
                <div class="col-11 text-truncate pl-0 mb-3">
                  <a href="{{ route('web.show.item', ['id' => $items->id ]) }}" class="dark-grey-text"><strong>{{ $items->title }}</strong></a>
                </div>
                <a href="{{ route('web.show.item', ['id' => $items->id ]) }}"><i class="fas fa-angle-double-right"></i></a>
              </div>

            </div>
            <!-- Grid column -->
            </a>
          </div>
          <!-- Grid row -->

        </div>
        <!-- Small news -->
        <hr>
    @endforeach
      </div>
      <!--Grid column-->

    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->


</div>

<br>
<br>
@endsection