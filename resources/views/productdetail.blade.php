@extends('layouts.main')
@section('content')
<head>
<title>buy {{$meta_name}} online</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .product_image_homepage{
        min-height:15rem;
        max-height:15rem;
        min-width: 100%;
        max-width: 100%;
    }

    .quickviewbuttonimages{
        min-height:5rem;
        max-height:5rem;
        min-width: 5rem;
        max-width: 5rem;
    }

    .quickviewimagesection{
        display: flex;
        justify-content: center;
    }
    .quickviewimages{
        width: 100% !important;
        height: 19rem;
    }

    .quantity-picker .btn {
        width: 20px;
        color: white;
        border: 1px solid #ccc;
        padding: 0 5px;
    }

    @media(max-width:565px)
    {
        .product_image_homepage
        {
        min-height:18rem;
        max-height:18rem;
        min-width: 100%;
        max-width: 100%;
        }
        
        .quickviewimages{
        width: 100% !important;
        height: 16rem;
        }

        .quickviewbuttonimages{
        min-height:3rem;
        max-height:3rem;
        min-width: 3rem;
        max-width: 3rem;
    }

    }
</style>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">{{$product->product_name}}</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start product detail-->
        <section class="py-4">
            <div class="container">
                <div class="product-detail-card">
                    <div class="product-detail-body">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5">
                                <div class="image-zoom-section">
                                    <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                        @for($i = 1; $i <= 5; $i++)
                                            @php
                                                $imageVariable = "image_" . $i;
                                                $imageUrl = $product->$imageVariable;
                                            @endphp

                                            @if($imageUrl != null)
                                            <div class="item quickviewimagesection">
                                                <img src="{{ asset($imageUrl) }}" class="img-fluid quickviewimages" alt="">
                                            </div>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                        @for($i = 1; $i <= 5; $i++)
                                        @php
                                            $imageVariable = "image_" . $i;
                                            $imageUrl = $product->$imageVariable;
                                        @endphp

                                        @if($imageUrl != null)
                                        <button class="owl-thumb-item">
                                            <img src="{{ asset($imageUrl) }}" class="quickviewbuttonimages" alt="">
                                        </button>
                                        @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="product-info-section p-3">
                                    <h3 class="mt-3 mt-lg-0 mb-0">{{$product->product_name}}</h3>
                                    <div class="product-rating d-flex align-items-center mt-2">
                                        <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
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
                                        <h5 class="mb-0 text-decoration-line-through text-light-3">¥{{$product->price}}</h5>
                                        @endif 
                                        <h4 class="mb-0">¥{{$product->final_price}}</h4>
                                    </div>
                                    @if($product->disc_rate)
                                    @if ($product->disc_rate <= 20)
                                    <p>(Save @ {{$product->disc_rate}}%)</p>
                                    @else
                                    <p>(Super Saver @ {{$product->disc_rate}}%)</p>
                                    @endif
                                    @endif
                                    <div class="mt-3">
                                        <h6>Description :</h6>
                                        <p class="mb-0">{{$product->short_desc}}.</p>
                                    </div>
                                    <dl class="row mt-3">	
                                        <dt class="col-sm-3">Delivery</dt>
                                        <dd class="col-sm-9">All over the world</dd>
                                    </dl>
                                    <div class="row row-cols-auto align-items-center mt-3">
                                        <div class="col">
                                            <div class="col quantity-picker">
                                                <label class="form-label" for="quantity">Quantity</label>
                                                <div class="input-group">
                                                    <button style="font-size:26px;" class="btn btn-decrement" type="button">-</button>
                                                    <input id="quantity_{{ $product->id }}" style="width:80px;text-align:center;border-top:1px solid white;border-bottom:1px solid white;" type="number" class="form-control quantity-input" min="1" value="1">
                                                    <button class="btn btn-increment" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Size</label>
                                                @php
                                                $sizes = explode(',', $product->sizes);
                                                @endphp
                                            <select id="size_{{ $product->id }}" style="text-transform: uppercase;" class="form-select form-select-sm">
                                                @foreach ($sizes as $size)
                                                <option style="text-transform: uppercase;">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col">
                                            <label class="form-label">Colors</label>
                                            <div class="color-indigators d-flex align-items-center gap-2">
                                                <div class="color-indigator-item bg-primary"></div>
                                                <div class="color-indigator-item bg-danger"></div>
                                                <div class="color-indigator-item bg-success"></div>
                                                <div class="color-indigator-item bg-warning"></div>
                                            </div>
                                        </div> --}}
                                    </div>
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
                                    <!--end row-->
                                    <div class="d-flex gap-2 mt-3">
                                        <a data-product-id="{{$product->id}}" href="javascript:;" class="btn btn-white btn-ecomm confetti-button add-to-cart-button" id="">	<i class="bx bxs-cart-add"></i>Add to Cart
                                            <div class="spinner" style="display: none;"></div>
                                            <div class="success-overlay" style="display: none;"><i class="success-tick"></i></div></a>
                                        <a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                    </div>
                                    <hr>
                                    <div class="product-sharing">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-facebook'></i></a>
                                            </li>
                                            <li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-linkedin'></i></a>
                                            </li>
                                            <li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-twitter'></i></a>
                                            </li>
                                            <li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-instagram'></i></a>
                                            </li>
                                            <li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-google'></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end product detail-->
        <!--start product more info-->
        <section class="py-4">
            <div class="container">
                <div class="product-more-info">
                    <ul class="nav nav-tabs mb-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title text-uppercase fw-500">Description</div>
                                </div>
                            </a>
                        </li>                            
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#more-info" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title text-uppercase fw-500">More Info</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title text-uppercase fw-500">(3) Reviews</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="discription" role="tabpanel">
                             @if ($product->more_details)
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
                            @else
                            <p>No info available</p>
                            @endif
                         </div>
                        <div class="tab-pane fade" id="more-info" role="tabpanel">
                            <ul>
                                @if ($product->bulletin_1 || $product->bulletin_2 || $product->bulletin_3 || $product->bulletin_4 || $product->bulletin_5)
                                <ul>
                                    @if ($product->bulletin_1)
                                        <li>{{ $product->bulletin_1 }}</li>
                                    @endif
                                    @if ($product->bulletin_2)
                                        <li>{{ $product->bulletin_2 }}</li>
                                    @endif
                                    @if ($product->bulletin_3)
                                        <li>{{ $product->bulletin_3 }}</li>
                                    @endif
                                    @if ($product->bulletin_4)
                                        <li>{{ $product->bulletin_4 }}</li>
                                    @endif
                                    @if ($product->bulletin_5)
                                        <li>{{ $product->bulletin_5 }}</li>
                                    @endif
                                </ul>
                                    @else
                                        <p>No records found</p>
                                    @endif

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col col-lg-8">
                                    <div class="product-review">
                                        <h5 class="mb-4">3 Reviews For The Product</h5>
                                        <div class="review-list">
                                            <div class="d-flex align-items-start">
                                                <div class="review-user">
                                                    <img src="assets/images/avatars/avatar-1.png" width="65" height="65" class="rounded-circle" alt="">
                                                </div>
                                                <div class="review-content ms-3">
                                                    <div class="rates cursor-pointer fs-6">	<i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h6 class="mb-0">James Caviness</h6>
                                                        <p class="mb-0 ms-auto">February 16, 2021</p>
                                                    </div>
                                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-start">
                                                <div class="review-user">
                                                    <img src="assets/images/avatars/avatar-2.png" width="65" height="65" class="rounded-circle" alt="">
                                                </div>
                                                <div class="review-content ms-3">
                                                    <div class="rates cursor-pointer fs-6"> <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h6 class="mb-0">David Buckley</h6>
                                                        <p class="mb-0 ms-auto">February 22, 2021</p>
                                                    </div>
                                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-start">
                                                <div class="review-user">
                                                    <img src="assets/images/avatars/avatar-3.png" width="65" height="65" class="rounded-circle" alt="">
                                                </div>
                                                <div class="review-content ms-3">
                                                    <div class="rates cursor-pointer fs-6">	<i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h6 class="mb-0">Peter Costanzo</h6>
                                                        <p class="mb-0 ms-auto">February 26, 2021</p>
                                                    </div>
                                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="add-review bg-dark-1">
                                        <div class="form-body p-3">
                                            <h4 class="mb-4">Write a Review</h4>
                                            <div class="mb-3">
                                                <label class="form-label">Your Name</label>
                                                <input type="text" class="form-control rounded-0">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Your Email</label>
                                                <input type="text" class="form-control rounded-0">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Rating</label>
                                                <select class="form-select rounded-0">
                                                    <option selected="">Choose Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="3">4</option>
                                                    <option value="3">5</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Example textarea</label>
                                                <textarea class="form-control rounded-0" rows="3"></textarea>
                                            </div>
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-light btn-ecomm">Submit a Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
<!--end page wrapper -->
@endsection