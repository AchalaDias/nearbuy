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
    <a href="https://mdbootstrap.com/products/jquery-ui-kit/" target="_blank" class="btn btn-danger btn-sm waves-effect waves-light" role="button">
      view more
      
    </a>
  </h2>
  <br>

<div class="row">

<!-- Grid column -->
<div class="col-lg-3 col-md-12 mb-3">

  <!-- Card Wider -->
  <div class="card card-cascade wider">

    <!-- Card image -->
    <div class="view view-cascade overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight waves-effect waves-light"></div>
      </a>
    </div>

    <div class="card-body card-body-cascade">

      <!-- Label -->
      <h5 class="blue-text pb-2 pt-1"></i> Culinary</h5>
      <!-- Button -->
      <a class="btn btn-primary waves-effect waves-light">view</a>

    </div>

  </div>
  <!-- Card Wider -->

</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-lg-3 col-md-6 mb-3">

  <!-- Card Narrower -->
  <div class="card card-cascade narrower">

    <!-- Card image -->
    <div class="view view-cascade overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight waves-effect waves-light"></div>
      </a>
    </div>

    <!-- Card content -->
    <div class="card-body card-body-cascade">

      <!-- Label -->
      <h5 class="blue-text pb-2 pt-1"></i> Culinary</h5>
      <!-- Button -->
      <a class="btn btn-primary waves-effect waves-light">Button</a>

    </div>

  </div>
  <!-- Card Narrower -->

</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-lg-3 col-md-6 mb-3">

  <!-- Card Regular -->
  <div class="card card-cascade">

    <!-- Card image -->
    <div class="view view-cascade overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/men.jpg" alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight waves-effect waves-light"></div>
      </a>
    </div>

    <div class="card-body card-body-cascade">

      <!-- Label -->
      <h5 class="blue-text pb-2 pt-1">Culinary</h5>
      <!-- Button -->
      <a class="btn btn-primary waves-effect waves-light">Button</a>

    </div>

  </div>
  <!-- Card Regular -->

</div>
<!-- Grid column -->

</div>

<hr>

<div class="container">

      <!--Section: Post-->
      <section class="mt-8">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div >

            <!--Featured Image-->
            
            <!--/.Featured Image-->

            <!--Card-->
            <div class="card mb-4 wow fadeIn">

              <!--Card content-->
              <div class="card-body text-center">

                <button class="btn btn-default">Featured Stores & Brands You Love </button>
                <br/>
                <br/>

                <p>Find all the latest offers and discounts from Local Banks, Credit Cards Discounts, Restaurant Food Menu, Hotel Offers, Food and Drink Deals, Happy Hours, Clothing Offers, Electronics Deals, Healthcare Packages, Latest Events, Holiday Deals and Local Business Details From One Place.</p>

                <!-- Logo carousel -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3500">
                  <div class="carousel-inner">
                    <!-- First slide -->
                    <div class="carousel-item">
                      <!--Grid row-->
                      <div class="row">

                        <!--First column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                         
                            <div class="avatar mn-auto white">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" width="100" height="100" class="rounded-circle" alt="woman avatar">
                            </div>
                            HSBC
                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/amazon.png" class="img-fluid px-4" alt="Amazon - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/sony.png" class="img-fluid px-4" alt="Sony - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Third column-->

                        <!--Fourth column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/samsung.png" class="img-fluid px-4" alt="Samsung - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Fourth column-->

                      </div>
                      <!--/Grid row-->
                    </div>
                    <!-- First slide -->

                    <!-- Second slide -->
                    <div class="carousel-item active carousel-item-left">
                      <!--Grid row-->
                      <div class="row">

                        <!--First column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/airbus.png" class="img-fluid px-4" alt="Airbus - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/yahoo.png" class="img-fluid px-4" alt="Yahoo - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/deloitte.png" class="img-fluid px-4" alt="Deloitte - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Third column-->

                        <!--Fourth column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/ge.png" class="img-fluid px-4" alt="GE - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Fourth column-->

                      </div>
                      <!--/Grid row-->
                    </div>
                    <!-- Second slide -->

                    <!-- Third slide -->
                    <div class="carousel-item carousel-item-next carousel-item-left">
                      <!--Grid row-->
                      <div class="row">

                        <!--First column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/kpmg.png" class="img-fluid px-4" alt="KPMG - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/unity.png" class="img-fluid px-4" alt="Unity - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/ikea.png" class="img-fluid px-4" alt="Ikea - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Third column-->

                        <!--Fourth column-->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                          <img src="https://mdbootstrap.com/img/logo/brands/aegon.png" class="img-fluid px-4" alt="Aegon - logo"
                            style="max-height: 40px">
                        </div>
                        <!--/Fourth column-->

                      </div>
                      <!--/Grid row-->
                    </div>
                    <!-- Third slide -->
                  </div>
                </div>
                <!-- Logo carousel -->

                <hr>

                <a class="btn btn-outline-primary" href=""
                  role="button" target="_blank">Show More</a>

              </div>

            </div>
            <!--/.Card-->

            <!--Card-->
            <div class="card mb-4 wow fadeIn">

              <!--Card content-->
              <div class="card-body">

                <p class="h5 my-4">That's a very long heading </p>


                <blockquote class="blockquote">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                  <footer class="blockquote-footer">Someone famous in
                    <cite title="Source Title">Source Title</cite>
                  </footer>
                </blockquote>

                <p class="h5 my-4">That's a very long heading </p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, ut rerum deserunt corporis
                  ducimus at, deleniti ea alias dolor reprehenderit sit vel. Incidunt id illum doloribus,
                  consequuntur maiores sed eligendi.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, ut rerum deserunt corporis
                  ducimus at, deleniti ea alias dolor reprehenderit sit vel. Incidunt id illum doloribus,
                  consequuntur maiores sed eligendi.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, ut rerum deserunt corporis
                  ducimus at, deleniti ea alias dolor reprehenderit sit vel. Incidunt id illum doloribus,
                  consequuntur maiores sed eligendi.</p>

              </div>

            </div>
            <!--/.Card-->

            <!--Card-->
            <div class="card mb-4 wow fadeIn">

              <div class="card-header font-weight-bold">
                <span>About author</span>
                <span class="pull-right">
                  <a href="">
                    <i class="fab fa-facebook-f mr-2"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-twitter mr-2"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-instagram mr-2"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-linkedin-in mr-2"></i>
                  </a>
                </span>
              </div>

              <!--Card content-->
              <div class="card-body">

                <div class="media d-block d-md-flex mt-3">
                  <img class="d-flex mb-3 mx-auto z-depth-1" src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg"
                    alt="Generic placeholder image" style="width: 100px;">
                  <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <h5 class="mt-0 font-weight-bold">Caroline Horwitz
                    </h5>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti
                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                    similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                    fuga.
                  </div>
                </div>

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Post-->

</div>

@endsection

