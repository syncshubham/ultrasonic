@extends('layouts.main')
@section('meta')
<title>Explore Top Bluetooth & Digital Hearing Aids - Ultrasonic Ltd.</title>
<meta name="description"
    content="Ultrasonic Ltd. offers an exceptional range of affordable digital, Bluetooth, and rechargeable hearing aids, including popular models like Olive Air and Olive Max.">
<meta name="keywords"
    content="hearing aid devices, affordable hearing aids, bluetooth hearing aids, digital hearing aids, rechargeable hearing aids, olive hearing aids, olive max, olive air, wireless hearing aids, buy hearing aid, ear hearing aid.">
<link rel="canonical" href="https://ultra-sonicltd.com/products">
<meta content="en_US" property="og:locale">
<meta content="Ultrasonic Ltd." property="og:site_name">
<meta content="website" property="og:type">
<meta content="https://ultra-sonicltd.com/products" property="og:url">
<meta content="Explore Top Bluetooth & Digital Hearing Aids - Ultrasonic Ltd." property="og:title">
<meta
    content="Ultrasonic Ltd. offers an exceptional range of affordable digital, Bluetooth, and rechargeable hearing aids, including popular models like Olive Air and Olive Max."
    property="og:description">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@ultrasonicltd">
<meta name="twitter:creator" content="@ultrasonicltd">
<meta name="twitter:title" content="Explore Top Bluetooth & Digital Hearing Aids - Ultrasonic Ltd.">
<meta name="twitter:description"
    content="Ultrasonic Ltd. offers an exceptional range of affordable digital, Bluetooth, and rechargeable hearing aids, including popular models like Olive Air and Olive Max.">

<meta property="og:title" content="Explore Top Bluetooth & Digital Hearing Aids - Ultrasonic Ltd." />
<meta property="og:description"
    content="Ultrasonic Ltd. offers an exceptional range of affordable digital, Bluetooth, and rechargeable hearing aids, including popular models like Olive Air and Olive Max." />
<meta property="og:url" content="https://ultra-sonicltd.com/products" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{ asset('assets/images/company-ultrasonic.png') }}" />
<meta property="og:image:alt" content="our logo" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="google-site-verification" content="-2ZwcqqQ5IHFac-40jdazbioO2DYghzTRLsZaIUV8xc" />

@endsection
@section('schema')
<script type="application/ld+json">
    {
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Ultrasonic Ltd.",
  "url": "https://ultra-sonicltd.com",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+81-9093651168",
    "contactType": "Customer Service"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "3-33-6, Nishi-ikebukuro",
    "addressLocality": "Toshima-ku",
    "addressRegion": "Tokyo",
    "postalCode": "171-0021",
    "addressCountry": "Japan"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 35.731310,
    "longitude": 139.714231
  }
}
  </script>
@endsection
@section('content')
<style>
    .shortviewWishlist>.HeartAnimation {
        position: relative;
        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png');
        background-repeat: no-repeat;
        background-size: 2900%;
        background-position: left;
        height: 90px;
        width: 100px;
        margin: 0 auto;
        cursor: pointer;
    }

    /* Parts are from twitter.com */
    .modalWishlist>.HeartAnimation {
        position: relative;
        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png');
        background-repeat: no-repeat;
        background-size: 2900%;
        background-position: left;
        height: 90px;
        width: 150px;
        left: -37px;
        bottom: 37px;
        margin: 0 auto;
        cursor: pointer;
    }

    .animate {
        animation: heart-burst 1s steps(28) forwards;
    }

    @keyframes heart-burst {
        0% {
            background-position: left;
        }

        100% {
            background-position: right;
        }
    }
</style>
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Shop List Left Sidebar</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop List Left Sidebar
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop area-->
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="product-wrapper">
                            <div class="product-grid">
                                @foreach ($products as $product)
                                <div class="card rounded-0 product-card">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <a
                                                href="{{ url('viewproduct', ['id' => $product->id, 'slug' => strtolower(str_replace(' ', '-', $product->product_name))]) }}">
                                                <img style="        min-height: 14rem;
                                                max-height: 14rem;" src="{{ asset($product->image_1) }}"
                                                    class="card-img-top product_image_homepage"
                                                    alt="{{$product->alt_image_1}}">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="product-info">

                                                    <span
                                                        style="display:flex;align-items:center;gap:10px;margin-bottom:15px;"><span
                                                            class="product-catergory font-13 mb-1">Hearing
                                                            Aid</span> <a href="javascript:;">
                                                            <div class="product-wishlist"> <span
                                                                    class="shortviewWishlist"
                                                                    style="position:absolute;">
                                                                    <div data-product-id="{{$product->id}}"
                                                                        class="HeartAnimation tempHeartAnimation {{ $product->is_wished ? 'animate' : '' }}">
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </a></span>
                                                    <a
                                                        href="{{ url('viewproduct', ['id' => $product->id, 'slug' => strtolower(str_replace(' ', '-', $product->product_name))]) }}">
                                                        <h6 class="product-name mb-2">{{ $product->product_name
                                                            }}
                                                        </h6>
                                                    </a>
                                                    <p class="card-text">{{$product->short_desc}}</p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mb-1 product-price">
                                                            @if ($product->disc_price > 0 || $product->price == null)
                                                            <span
                                                                class="me-1 text-decoration-line-through">¥{{$product->price}}</span>
                                                            @endif

                                                            <span
                                                                class="text-white fs-5">¥{{$product->final_price}}</span>
                                                        </div>
                                                        <div class="cursor-pointer ms-auto"> <i
                                                                class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="product-action mt-2">
                                                        <div class="d-flex gap-2">
                                                            <a data-product-id="{{$product->id}}" href="javascript:;"
                                                                class="btn btn-light btn-ecomm add-to-cart-button confetti-button">
                                                                <i class='bx bxs-cart-add'></i>Add to Cart
                                                                <div class="spinner" style="display: none;"></div>
                                                                <div class="success-overlay" style="display: none;"><i
                                                                        class="success-tick"></i></div>
                                                            </a>
                                                            <a href="javascript:;" class="btn btn-link btn-ecomm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#QuickViewProduct{{$product->id}}"><i
                                                                    class='bx bx-zoom-in'></i>Quick View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top my-3"></div>
                                <div class="modal fade" id="QuickViewProduct{{$product->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                        <div class="modal-content bg-dark-4 rounded-0 border-0">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end"
                                                    data-bs-dismiss="modal"></button>
                                                <div class="row g-0">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="image-zoom-section">
                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3"
                                                                data-slider-id="1">
                                                                @for($i = 1; $i <= 5; $i++) @php $imageVariable="image_"
                                                                    . $i; $imagealtVariable="alt_image_" . $i;
                                                                    $imageUrl=$product->
                                                                    $imageVariable;
                                                                    $imagealttext=$product->$imagealtVariable;
                                                                    @endphp

                                                                    @if($imageUrl != null)
                                                                    <div class="item quickviewimagesection">
                                                                        <img src="{{ asset($imageUrl) }}"
                                                                            class="img-fluid quickviewimages"
                                                                            alt="{{$imagealttext}}">
                                                                    </div>
                                                                    @endif
                                                                    @endfor


                                                            </div>

                                                            <div class="owl-thumbs d-flex justify-content-center"
                                                                data-slider-id="1">
                                                                @for($i = 1; $i <= 5; $i++) @php $imageVariable="image_"
                                                                    . $i; $imagealtVariable="alt_image_" . $i;
                                                                    $imageUrl=$product->
                                                                    $imageVariable;
                                                                    $imagealttext=$product->$imagealtVariable;
                                                                    @endphp

                                                                    @if($imageUrl != null)
                                                                    <button class="owl-thumb-item">
                                                                        <img src="{{ asset($imageUrl) }}"
                                                                            class="quickviewbuttonimages"
                                                                            alt="{{$imagealttext}}">>
                                                                    </button>
                                                                    @endif
                                                                    @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="product-info-section p-3">
                                                            <h3 class="mt-3 mt-lg-0 mb-0">{{$product->product_name}}
                                                                <span class="modalWishlist" style="position:absolute;">
                                                                    <div data-product-id="{{$product->id}}" class="HeartAnimation tempHeartAnimation {{ $product->is_wished ? 'animate' : '' }} 
                                                                "></div>
                                                                </span>
                                                            </h3>
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
                                                                @if ($product->disc_price > 0 || $product->disc_price ==
                                                                null)
                                                                <h5
                                                                    class="mb-0 text-decoration-line-through text-light-3">
                                                                    ¥{{$product->price}}</h5>
                                                                @endif
                                                                <h4 class="mb-0">¥{{$product->final_price}}</h4>
                                                            </div>
                                                            @if($product->disc_rate)
                                                            @if ($product->disc_rate <= 20) <p>(Save @
                                                                {{$product->disc_rate}}%)</p>
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
                                                                        <label class="form-label"
                                                                            for="quantity">Quantity</label>
                                                                        <div class="input-group">
                                                                            <button style="font-size:26px;"
                                                                                class="btn btn-decrement"
                                                                                type="button">-</button>
                                                                            <input id="quantity_{{ $product->id }}"
                                                                                style="width:80px;text-align:center;border-top:1px solid white;border-bottom:1px solid white;"
                                                                                type="number"
                                                                                class="form-control quantity-input"
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
                                                                        <select id="size_{{ $product->id }}"
                                                                            style="text-transform: uppercase;"
                                                                            class="form-select form-select-sm">
                                                                            @foreach ($sizes as $size)
                                                                            <option value="{{ $size }}"
                                                                                style="text-transform: uppercase;">{{
                                                                                $size }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    {{-- <div class="col">
                                                                        <label class="form-label">Colors</label>
                                                                        <div
                                                                            class="color-indigators d-flex align-items-center gap-2">
                                                                            <div
                                                                                class="color-indigator-item bg-primary">
                                                                            </div>
                                                                            <div class="color-indigator-item bg-danger">
                                                                            </div>
                                                                            <div
                                                                                class="color-indigator-item bg-success">
                                                                            </div>
                                                                            <div
                                                                                class="color-indigator-item bg-warning">
                                                                            </div>
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
                                                                    <a href="javascript:;"
                                                                        data-product-id="{{$product->id}}"
                                                                        class="btn btn-white btn-ecomm add-to-cart-button confetti-button">
                                                                        <i class="bx bxs-cart-add"></i>Add to Cart <div
                                                                            class="spinner" style="display: none;">
                                                                        </div>
                                                                        <div class="success-overlay"
                                                                            style="display: none;"><i
                                                                                class="success-tick"></i></div>
                                                                    </a>
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
                            <hr>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end shop area-->
    </div>
</div>
@endsection