@extends('layouts.app')
@section('content')
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <h2 class=" font-weight-bold mb-4 pb-2">{{ $item->title }}</h2>
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="{{ $item->image }}" class="img-fluid" alt="">
          <br><br>
          <strong>Promotion from : </strong> <a class="btn btn-primary btn-sm"> {{ date('Y-m-d', strtotime($item->promo_start)) }}</a><br/>
          <strong>Promotion until : </strong><a class="btn btn-danger btn-sm">{{ date('Y-m-d', strtotime($item->promo_until)) }}</a>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href=""> 
                <span class="badge purple mr-1">{{ $category->name }}</span>
              </a>
              <!-- <a href="">
                <span class="badge blue mr-1">{{ $category->name }} </span>
              </a> -->
            </div>

            <h4><strong>Description</strong></h4>
            <hr>
            {!! $item->description !!}
            <!-- <p>@php
                echo htmlentities($item->description);
            @endphp 
            </p> -->

            <form class="d-flex justify-content-left">
              <!-- Default input -->
              <a  href="{{ route('web.wishlist.add', ['item_id' => $item->id]) }}" class="btn btn-primary btn-md my-0 p" >Add to Wishlist
                <i class="fas fa-shopping-cart ml-1"></i>
              </a>

            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">


      </div>
      <!--Grid row-->

    

    </div>

@endsection