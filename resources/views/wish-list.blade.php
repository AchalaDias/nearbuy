@extends('layouts.app')
@section('content')

<div class="container mt-5">
<!-- Grid row -->
<div class="row">

<!-- Grid column -->
<div class="col-lg-12 col-md-12">

</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-lg-12 col-md-12">
@if(empty($items))
                No Items in Wishlist
@else 

<table class="table product-table mb-0">

            <!-- Table head -->
            <thead class="mdb-color lighten-5">
              <tr>
                <th></th>
                <th class="font-weight-bold">
                  <strong></strong>
                </th>
                
                <th class="font-weight-bold center">
                  <strong>Action</strong>
                </th>
                <th></th>
              </tr>
            </thead>
            <!-- /.Table head -->

            <!-- Table body -->
            <tbody>
           
            @foreach($items as $item)
                <tr>
                    <td>
                         <!-- Small news -->
                            <div class="single-news mb-4">

                                <!-- Grid row -->
                                <div class="row">

                                <!-- Grid column -->
                                    <div class="col-md-3">

                                        <!--Image-->
                                        <div class="view overlay rounded z-depth-1 mb-4">
                                            <img class="img-fluid" src="{{ $item->image }}" alt="Sample image">
                                                <a>
                                                <div class="mask rgba-white-slight"></div>
                                                </a>
                                        </div>

                                    </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-9">

                                <!-- Excerpt -->
                                <p class="font-weight-bold dark-grey-text">Promotion until : {{ date('Y-m-d', strtotime($item->promo_start)) }}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="col-11 text-truncate pl-0 mb-3">
                                        <a href="#!" class="dark-grey-text">{{ $item->title }}</a>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>
                        <!-- Small news -->
                    </td>
                    <td></td>
                    <td>
                      <a href="{{ route( 'web.show.item', [ 'id' => $item->id ]) }}"  class="btn btn-sm  btn-primary" ><i class="fas fa-eye"></i></a>
                      <a href="{{ route( 'web.wishlist.delete', [ 'id' => $item->id ]) }}"  class="btn btn-sm btn-danger" > <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </thead>
</table>


@endif
 

</div>
<!--Grid column-->

</div>
<!-- Grid row -->

 

</div>

<br><br>

@endsection