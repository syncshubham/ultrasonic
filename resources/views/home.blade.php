@extends('layouts.main')
@section('content')

<head>
    <title>Online Able Plus, Hearing Aid - Ultrasonic Ltd</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!--start slider section-->
<section class="slider-section">
    <div class="first-slider">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">Has just arrived!</h3>
                                <h1 class="h1">The Latest Collections</h1>
                                <p class="pb-3">Able aid, Able plus &amp; much more...</p>
                                <div class=""> <a class="btn btn-light btn-ecomm" href="javascript:;">Shop Now <i
                                            class='bx bx-chevron-right'></i></a></div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/slider/sliderultrasonichome2.png') }}"
                                style="height:22rem;" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">Complete your look with</h3>
                                <h1 class="h1">New Accessories</h1>
                                <p class="pb-3">Able glass, Able EQ &amp; much more...</p>
                                <div class=""> <a class="btn btn-dark btn-ecomm" href="javascript:;">Shop Now <i
                                            class='bx bx-chevron-right'></i></a></div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/slider/sliderultrasonichome.png') }}"
                                style="height:22rem;" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev"> <span
                    class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next"> <span
                    class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>
<!--end slider section-->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start information-->
        <section class="py-3 border-top border-bottom">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
                    <div class="col p-3">
                        <div class="d-flex align-items-center">
                            <div class="fs-1 text-white"> <i class='bx bx-taxi'></i></div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">CONVENIENT SHIPPING</h6>
                                <p class="mb-0">Experience hassle-free shopping with our convenient shipping options</p>
                            </div>
                        </div>
                    </div>
                    <div class="col p-3">
                        <div class="d-flex align-items-center">
                            <div class="fs-1 text-white"> <i class='bx bx-dollar-circle'></i>
                            </div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">MONEY VALUE</h6>
                                <p class="mb-0">Discover our high-quality products that blend affordability with
                                    excellence</p>
                            </div>
                        </div>
                    </div>
                    <div class="col p-3">
                        <div class="d-flex align-items-center">
                            <div class="fs-1 text-white"> <i class='bx bx-support'></i>
                            </div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
                                <p class="mb-0">Awesome Support for 24/7 Days</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <br><br><br><br>
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
                    <a id="moreproductbutton" href="javascript:;" class="btn btn-light ms-auto rounded-0">More
                        Products<i class='bx bx-chevron-right'></i></a>
                </div>
                <hr>
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        @foreach ($products as $product)
                        <div class="col">
                            <div class="border card rounded-0 product-card">
                                <div class="card-header bg-transparent border-bottom-0">
                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                        @if($product->disc_rate)
                                        @if ($product->disc_rate <= 20) <div class="product-compare"><span>Save
                                                {{$product->disc_rate}}%</span>
                                    </div>
                                    @else
                                    <div class="product-compare"><span>Super Saver {{$product->disc_rate}}%</span>
                                    </div>
                                    @endif
                                    @endif
                                    <a href="javascript:;">
                                        <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('product/view', ['id' => $product->id]) }}">
                                <img src="{{ asset($product->image_1) }}" class="card-img-top product_image_homepage"
                                    alt="...">
                            </a>
                            <div class="card-body">
                                <div class="product-info">
                                    <p class="product-catergory font-13 mb-1">Hearing Aid</p>
                                    <a href="{{ url('product/view', ['id' => $product->id]) }}">
                                        <h6 class="product-name mb-2">{{$product->product_name}}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 product-price">
                                            @if ($product->disc_price > 0 || $product->price == null)
                                            <span class="me-1 text-decoration-line-through">¥{{$product->price}}</span>
                                            @endif

                                            <span class="text-white fs-5">¥{{$product->final_price}}</span>
                                        </div>
                                        <div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="d-grid gap-2">
                                            <a data-product-id="{{$product->id}}" href="javascript:;"
                                                class="btn btn-light btn-ecomm add-to-cart-button confetti-button">
                                                <i class='bx bxs-cart-add'></i>Add to Cart
                                                <div class="spinner" style="display: none;"></div>
                                                <div class="success-overlay" style="display: none;"><i
                                                        class="success-tick"></i></div>
                                            </a>
                                            <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal"
                                                data-bs-target="#QuickViewProduct{{$product->id}}"><i
                                                    class='bx bx-zoom-in'></i>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="QuickViewProduct{{$product->id}}">
                        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                            <div class="modal-content bg-dark-4 rounded-0 border-0">
                                <div class="modal-body">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                    <div class="row g-0">
                                        <div class="col-12 col-lg-6">
                                            <div class="image-zoom-section">
                                                <div class="product-gallery owl-carousel owl-theme border mb-3 p-3"
                                                    data-slider-id="1">
                                                    @for($i = 1; $i <= 5; $i++) @php $imageVariable="image_" . $i;
                                                        $imageUrl=$product->$imageVariable;
                                                        @endphp

                                                        @if($imageUrl != null)
                                                        <div class="item quickviewimagesection">
                                                            <img src="{{ asset($imageUrl) }}"
                                                                class="img-fluid quickviewimages" alt="">
                                                        </div>
                                                        @endif
                                                        @endfor


                                                </div>

                                                <div class="owl-thumbs d-flex justify-content-center"
                                                    data-slider-id="1">
                                                    @for($i = 1; $i <= 5; $i++) @php $imageVariable="image_" . $i;
                                                        $imageUrl=$product->$imageVariable;
                                                        @endphp

                                                        @if($imageUrl != null)
                                                        <button class="owl-thumb-item">
                                                            <img src="{{ asset($imageUrl) }}"
                                                                class="quickviewbuttonimages" alt="">
                                                        </button>
                                                        @endif
                                                        @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="product-info-section p-3">
                                                <h3 class="mt-3 mt-lg-0 mb-0">Able Aid</h3>
                                                <div class="product-rating d-flex align-items-center mt-2">
                                                    <div class="rates cursor-pointer font-13"> <i
                                                            class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                    </div>
                                                    <div class="ms-1">
                                                        <p class="mb-0">(24 Ratings)</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 gap-2">
                                                    @if ($product->disc_price > 0 || $product->disc_price == null)
                                                    <h5 class="mb-0 text-decoration-line-through text-light-3">
                                                        ¥{{$product->price}}</h5>
                                                    @endif
                                                    <h4 class="mb-0">¥{{$product->final_price}}</h4>
                                                </div>
                                                @if($product->disc_rate)
                                                @if ($product->disc_rate <= 20) <p>(Save @ {{$product->disc_rate}}%)</p>
                                                    @else
                                                    <p>(Super Saver @ {{$product->disc_rate}}%)</p>
                                                    @endif
                                                    @endif
                                                    <div class="mt-3">
                                                        <h6>Description :</h6>
                                                        <p class="mb-0">{{$product->short_desc}}</p>

                                                    </div>
                                                    <dl class="row mt-3">
                                                        <dt class="col-sm-3">Delivery</dt>
                                                        <dd class="col-sm-9">All over the world</dd>
                                                    </dl>
                                                    <div class="row row-cols-auto align-items-center mt-3">
                                                        <div class="col quantity-picker">
                                                            <label class="form-label" for="quantity">Quantity</label>
                                                            <div class="input-group">
                                                                <button style="font-size:26px;"
                                                                    class="btn btn-decrement" type="button">-</button>
                                                                <input id="quantity_{{ $product->id }}"
                                                                    style="width:80px;text-align:center;border-top:1px solid white;border-bottom:1px solid white;"
                                                                    type="number" class="form-control quantity-input"
                                                                    min="1" value="1">
                                                                <button class="btn btn-increment"
                                                                    type="button">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-label">Size</label>
                                                            @php
                                                            $sizes = explode(',', $product->sizes);
                                                            @endphp
                                                            <select id="size_{{ $product->id }}" style="text-transform: uppercase;"
                                                                class="form-select form-select-sm">
                                                                @foreach ($sizes as $size)
                                                                <option value="{{ $size }}" style="text-transform: uppercase;">{{ $size }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- <div class="col">
                                                            <label class="form-label">Colors</label>
                                                            <div
                                                                class="color-indigators d-flex align-items-center gap-2">
                                                                <div class="color-indigator-item bg-primary"></div>
                                                                <div class="color-indigator-item bg-danger"></div>
                                                                <div class="color-indigator-item bg-success"></div>
                                                                <div class="color-indigator-item bg-warning"></div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <!--end row-->
                                                    <div class="d-flex gap-2 mt-3">
                                                        @if ($product->refundable == 1)
                                                        Refundable
                                                        @else
                                                        Non - refundable
                                                        @endif

                                                        @if ($product->exchangeable == 1)
                                                        , Exchangeable
                                                        @else
                                                        , Non - Exchangeable
                                                        @endif
                                                    </div>
                                                    <div class="d-flex gap-2 mt-3">
                                                        <a href="javascript:;" data-product-id="{{$product->id}}"
                                                            class="btn btn-white btn-ecomm add-to-cart-button confetti-button">
                                                            <i class="bx bxs-cart-add"></i>Add to Cart <div
                                                                class="spinner" style="display: none;"></div>
                                                            <div class="success-overlay" style="display: none;"><i
                                                                    class="success-tick"></i></div>
                                                        </a> <a href="javascript:;" class="btn btn-light btn-ecomm"><i
                                                                class="bx bx-heart"></i>Add to Wishlist</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end quick view product-->
                    @endforeach
                </div>
                <!--end row-->
            </div>
    </div>
    </section>
    <br><br>
    <section class="py-4">
        <div class="container">
            <div class="add-banner">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100">
                            <img src="{{ asset('assets/images/promo/mainpromo/two.png') }}" class="card-img-top"
                                alt="...">
                            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">Get
                                    now</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Able Aid</h5>
                                <p class="card-text">Check our our newly released Able Aid</p> <a href="javascript:;"
                                    class="btn btn-light btn-ecomm">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100">
                            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">Get
                                    now</span>
                            </div>
                            <div class="card-body text-center mt-5">
                                <h5 class="card-title">Hearing Aid</h5>
                                <p class="card-text">Buy our hearing aid products at reasonable cost</p> <a
                                    href="javascript:;" class="btn btn-light btn-ecomm">SHOP NOW</a>
                            </div>
                            <img src="{{ asset('assets/images/promo/mainpromo/three.png') }}" class="card-img-top"
                                alt="...">
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100">
                            <img src="{{ asset('assets/images/promo/mainpromo/first.jpg') }}" class="card-img h-100"
                                alt="...">
                            <div class="card-img-overlay text-center top-20">
                                <div class="border border-white border-3 py-3 bg-dark-3">
                                    <h5 class="card-title">Superior ear aid</h5>
                                    <p class="card-text text-uppercase fs-1 text-white lh-1 mt-3 mb-2">newly launched
                                    </p>
                                    <p class="card-text fs-5">Able plus</p> <a href="javascript:;"
                                        class="btn btn-white btn-ecomm">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100">
                            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""></span>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/images/promo/mainpromo/four.png') }}" class="card-img-top"
                                    alt="...">
                                <h5 class="card-title fs-1 text-uppercase">Health</h5>
                                <p class="card-text text-uppercase fs-4 text-white lh-1 mb-2">Assurity</p>
                                <p class="card-text">On Able EQ</p> <a href="javascript:;"
                                    class="btn btn-light btn-ecomm">HURRY UP!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>

    <br>
    <section class="py-4 bg-dark-1">
        <div class="container">
            <div class="row">
                <h5 style="margin-bottom:30px;" class="card-title fs-1">Population With Hearing Loss Is Increasing As
                    The Aging Society Progress.</h5>

                <div class="col-md-6 col-12">
                    <img style="width: 100%;border-radius:10px;"
                        src="{{ asset('assets/images/homepage/report.jpeg') }}">
                </div>
                <div id="reportsectiontwo" class="col-md-6 col-12">
                    <h5 class="card-title">Population with Hearing Difficulty in Percentage</h5>
                    <p class="card-text">Population with hearing loss is said to be approximately 470 million across the
                        globe, and 14.3 million in Japan. This indicates that 1 in 10 Japanese experiences hearing
                        difficulties. About 58% of the population above the age 65 is said to have age-related hearing
                        loss.</p>

                    <br>
                    <h5 class="card-title fs-1">Reference:</h5>
                    <p class="card-text">JapanTrak Report 2018（The rate of self-declared population with hearing loss in
                        percentage), Japan Hearing Aid Industrial Association JGS Journal volume 51, issue 1,
                        2014（Hearing Impairment in the Elderly), THE JAPAN GERIATRICS SOCIETY</p>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>

    <br>
    <br>

    <!--start support info-->
    <section class="py-4 bg-dark-1">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white"> <i class='bx bx-cart'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Timely delivery</h2>
                        <p class="text-capitalize">Ultrasoinc delivery, always on time.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white"> <i class='bx bx-credit-card'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
                        <p class="text-capitalize">We possess SSL / Secure сertificate</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white"> <i class='bx bx-dollar-circle'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Health Investment</h2>
                        <p class="text-capitalize">"Invest in clear hearing with our affordable and effective ear aids.
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50 text-white"> <i class='bx bx-support'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
                        <p class="text-capitalize">Friendly 24/7 customer support</p>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!--end support info-->
    <!--start News-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Our blogs</h5>
                <a href="blog.html" class="btn btn-light ms-auto rounded-0">View All Blogs<i
                        class='bx bx-chevron-right'></i></a>
            </div>
            <hr>
            <div class="product-grid">
                <div class="latest-news owl-carousel owl-theme">
                    <div class="item">
                        <div class="card rounded-0 product-card border">
                            <div class="news-date">
                                <div class="date-number">24</div>
                                <div class="date-month">FEB</div>
                            </div>
                            <a href="javascript:;">
                                <img id="blogimages" src="{{ asset('assets/images/blogs/main/blog1.webp') }}"
                                    class="card-img-top border-bottom bg-dark-1" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="news-title">
                                    <a href="javascript:;">
                                        <h5 class="mb-3 text-capitalize">Blog Short Title</h5>
                                    </a>
                                </div>
                                <p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
                            </div>
                            <div class="card-footer border-top">
                                <a href="javascript:;">
                                    <p class="mb-0"><small class="text-white">0 Comments</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card rounded-0 product-card border">
                            <div class="news-date">
                                <div class="date-number">10</div>
                                <div class="date-month">MARCH</div>
                            </div>
                            <a href="javascript:;">
                                <img id="blogimages" src="{{ asset('assets/images/blogs/main/blog2.jpg') }}"
                                    class="card-img-top border-bottom bg-dark-1" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="news-title">
                                    <a href="javascript:;">
                                        <h5 class="mb-3 text-capitalize">Blog Short Title</h5>
                                    </a>
                                </div>
                                <p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
                            </div>
                            <div class="card-footer border-top">
                                <a href="javascript:;">
                                    <p class="mb-0"><small class="text-white">0 Comments</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card rounded-0 product-card border">
                            <div class="news-date">
                                <div class="date-number">15</div>
                                <div class="date-month">APRIL</div>
                            </div>
                            <a href="javascript:;">
                                <img id="blogimages" src="{{ asset('assets/images/blogs/main/blog3.webp') }}"
                                    class="card-img-top border-bottom bg-dark-1" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="news-title">
                                    <a href="javascript:;">
                                        <h5 class="mb-3 text-capitalize">Blog Short Title</h5>
                                    </a>
                                </div>
                                <p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
                            </div>
                            <div class="card-footer border-top">
                                <a href="javascript:;">
                                    <p class="mb-0"><small class="text-white">0 Comments</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card rounded-0 product-card border">
                            <div class="news-date">
                                <div class="date-number">26</div>
                                <div class="date-month">MAY</div>
                            </div>
                            <a href="javascript:;">
                                <img id="blogimages" src="{{ asset('assets/images/blogs/main/blog4.webp') }}"
                                    class="card-img-top border-bottom bg-dark-1" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="news-title">
                                    <a href="javascript:;">
                                        <h5 class="mb-3 text-capitalize">Blog Short Title</h5>
                                    </a>
                                </div>
                                <p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
                            </div>
                            <div class="card-footer border-top">
                                <a href="javascript:;">
                                    <p class="mb-0"><small class="text-white">0 Comments</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card rounded-0 product-card border">
                            <div class="news-date">
                                <div class="date-number">19</div>
                                <div class="date-month">AUG</div>
                            </div>
                            <a href="javascript:;">
                                <img id="blogimages" src="{{ asset('assets/images/blogs/main/blog5.jpg') }}"
                                    class="card-img-top border-bottom bg-dark-1" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="news-title">
                                    <a href="javascript:;">
                                        <h5 class="mb-3 text-capitalize">Blog Short Title</h5>
                                    </a>
                                </div>
                                <p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
                            </div>
                            <div class="card-footer border-top">
                                <a href="javascript:;">
                                    <p class="mb-0"><small class="text-white">0 Comments</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end News-->
    <!--start brands-->
    <section class="py-4">
        <div class="container">
            <h3 class="d-none">Brands</h3>
            <div class="brand-grid">
                <div class="brands-shops owl-carousel owl-theme border">
                    <div class="item border-end">
                        <div class="p-4">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/images/brands/main/1.png') }}" class="img-fluid" alt="...">
                            </a>
                        </div>
                    </div>
                    <div class="item border-end">
                        <div class="p-4">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/images/brands/main/2.png') }}" class="img-fluid" alt="...">
                            </a>
                        </div>
                    </div>
                    <div class="item border-end">
                        <div class="p-4">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/images/brands/main/3.png') }}" class="img-fluid" alt="...">
                            </a>
                        </div>
                    </div>
                    <div class="item border-end">
                        <div class="p-4">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/images/brands/main/4.png') }}" class="img-fluid" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end brands-->
</div>
</div>
<!--end page wrapper -->

@endsection