@extends('layouts.main')
@section('content')

<head>
    <title>Online Able Plus, Hearing Aid - Ultrasonic Ltd</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
    .bannertwo {
        margin-left: 10%;
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        height: 20rem;

    }

    @media(max-width:465px) {
        .bannertwo {
            height: 20rem;
            margin-left: 1%;
        }
    }
</style>
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
                                <h3 class="h3 fw-light">Discover Top Hearing Aids with <br> Olive Air and Bluetooth
                                    Technology</h3>
                                <p class="pb-3">Explore the Best Hearing Aid Devices, Including Olive Air <br> Hearing
                                    Aids,
                                    Bluetooth Hearing Aids, and Advanced Hearing <br> Aid Machines. Experience Unmatched
                                    Sound Quality and Comfort.</p>
                                <div class=""> <a class="btn btn-light btn-ecomm" href="/#featuredProducts">Shop Now <i
                                            class='bx bx-chevron-right'></i></a></div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/slider/olive-max-hearing-aid.png') }}"
                                style="height:20rem;" class="img-fluid" alt="olive max hearing aid">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">Introducing Olive Max: Next-Gen <br>Wireless & Rechargeable
                                    <br> Hearing Aids
                                </h3>
                                <p class="pb-3">Discover the Olive Max Hearing Aid—FDA Class 2 OTC, Bluetooth<br>
                                    hearing aids with playback and streaming for Apple and Android<br> Enjoy 10 hours of
                                    use and a 30-minute quick charge with the <br> top hearing aid device.</p>
                                <div class=""> <a class="btn btn-dark btn-ecomm" href="/#featuredProducts">Shop Now <i
                                            class='bx bx-chevron-right'></i></a></div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/images/slider/olive-max-hearing-aid-machine.png') }}"
                                class="img-fluid bannertwo" alt="olive max hearing aid machine">
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
        <section
            style="background-image: url('{{ asset('assets/images/bg-themes/amazingsection.jpg') }}');background-size:100% 100%;opacity: 80%;"
            class="py-3 border-top border-bottom">

            <div class="container">
                <div class="amazing-experience">
                    <div class="amazing-desc">
                        <h1>Why <span
                                style="background-color:#7575a3;border-radius:5px;border:2px solid white;padding:2px;color:#d9d9d9;">1,00,000
                                +</span> customers
                            thinks
                            <span
                                style="background-color:white;border-radius:5px;border:2px solid white;padding:2px;color:black;">OLIVE</span>
                            delivers an amazing
                            experience
                        </h1>
                    </div>
                    <div class="amazing-points">
                        <div style="font-size:1.8rem;font-weight:bold;">Olive Max is ...</div>
                        <div class="d-flex align-items-center">
                            <div class="fs-1 text-white"> <i class="fa-regular fa-face-smile"></i></div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">Satisfying!</h6>
                                <p class="mb-0">Join over 100,000 delighted customers in 84 countries who rate Olive Max
                                    among the top hearing aids. With an 89% satisfaction rate and a 4.67/5 customer
                                    service score, see why Olive Max stands out.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="fs-1 text-white"> <i class="fa-solid fa-chart-simple"></i></div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">Easy to Use!</h6>
                                <p class="mb-0">Order Olive Max online for easy doorstep delivery and simple setup at
                                    home. Skip the offline hearing aid centers and enjoy the convenience of our top
                                    hearing aid devices.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="fs-1 text-white"> <i class="fa-solid fa-check"></i></div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">Reliable & Effective!</h6>
                                <p class="mb-0">Olive Max is a leading hearing aid machine, FDA Class 2 OTC, developed
                                    with extensive research and customer feedback to ensure reliable and effective
                                    performance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function highlightStrong(paragraphElement) {
                const strongTags = paragraphElement.querySelectorAll("strong");
                let index = 0;
                const intervalId = setInterval(() => {
                    if (index < strongTags.length) {
                        const strongTag = strongTags[index];
                        strongTag.className = "highlight";
                        index++;
                    } else {
                        clearInterval(intervalId);
                    }
                }, 1000);
            }

            const paragraphElement = document.querySelector(".container");
            highlightStrong(paragraphElement);

        </script>
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
        <br><br><br><br>
        <section id="featuredProducts" class="py-4">
            <div class="container">
                <div class="align-items-center">
                    <h2 class="text-uppercase mb-0" style="text-align:center;width:100%;">OUR CUTTING-EDGE <span
                            style="">HEARING
                            PRODUCTS</span></h2>
                    <br>
                    <p style="text-align:center;">At Ultrasonic Ltd., we offer a diverse range of products designed to
                        enhance your auditory
                        experience. From innovative hearing aids to state-of-the-art assistive listening devices and
                        accessories, our collection is tailored to meet various needs and preferences. Discover
                        top-notch technology that fits seamlessly into your lifestyle, ensuring clarity and comfort in
                        every sound</p>
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
                                        <div class="product-wishlist"> <span class="shortviewWishlist"
                                                style="position:absolute;">
                                                <div data-product-id="{{$product->id}}"
                                                    class="HeartAnimation tempHeartAnimation {{ $product->is_wished ? 'animate' : '' }}">
                                                </div>
                                            </span>
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
                                                <h3 class="mt-3 mt-lg-0 mb-0">{{$product->product_name}} <span
                                                        class="modalWishlist" style="position:absolute;">
                                                        <div data-product-id="{{$product->id}}" class="HeartAnimation tempHeartAnimation {{ $product->is_wished ? 'animate' : '' }} 
                                                    "></div>
                                                    </span></h3>
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
                                                            <select id="size_{{ $product->id }}"
                                                                style="text-transform: uppercase;"
                                                                class="form-select form-select-sm">
                                                                @foreach ($sizes as $size)
                                                                <option value="{{ $size }}"
                                                                    style="text-transform: uppercase;">{{ $size }}
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
                <!--end row-->
            </div>
        </section>
        <br><br>
        <section class="py-4">
            <div class="container">
                <div class="add-banner">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <img src="{{ asset('assets/images/promo/mainpromo/custom-hearing-aid.png') }}"
                                    class="card-img-top" alt="hearing aid remote">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">Get
                                        now</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Hearing Solutions</h5>
                                    <p class="card-text">Affordable hearing aids with modern techonology</p> <a
                                        href="/#featuredProducts" class="btn btn-light btn-ecomm">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">Get
                                        now</span>
                                </div>
                                <div class="card-body text-center mt-5">
                                    <h5 class="card-title">Hearing Aid Device</h5>
                                    <p class="card-text">seamlessly control of your hearing aid.</p> <a
                                        href="/#featuredProducts" class="btn btn-light btn-ecomm">SHOP NOW</a>
                                </div>
                                <img src="{{ asset('assets/images/promo/mainpromo/hearing-aid-remote.png') }}"
                                    class="card-img-top" alt="custom hearing aid">
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <img src="{{ asset('assets/images/promo/mainpromo/hearing-aid-assistance.png') }}"
                                    class="card-img h-100" alt="hearing aid assistance">
                                <div class="card-img-overlay text-center top-20">
                                    <div class="border border-white border-3 py-3 bg-dark-3">
                                        <h5 class="card-title">Superior ear aid</h5>
                                        <p class="card-text text-uppercase fs-1 text-white lh-1 mt-3 mb-2">newly
                                            launched
                                        </p>
                                        <p class="card-text fs-5">Olive Max</p> <a href="/#featuredProducts"
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
                                    <img src="{{ asset('assets/images/promo/mainpromo/digtial-hearing-aid.png') }}"
                                        class="card-img-top" alt="digtial hearing aid">
                                    <h5 class="card-title fs-1 text-uppercase">Health</h5>
                                    <p class="card-text text-uppercase fs-4 text-white lh-1 mb-2">Assurity</p>
                                    <p class="card-text">On Olive Products</p> <a href="/#featuredProducts"
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
                    <h5 style="margin-bottom:30px;" class="card-title fs-1">Population With Hearing Loss Is Increasing
                        As
                        The Aging Society Progress.</h5>

                    <div class="col-md-6 col-12">
                        <img style="width: 100%;border-radius:10px;"
                            src="{{ asset('assets/images/homepage/report.jpeg') }}">
                    </div>
                    <div id="reportsectiontwo" class="col-md-6 col-12">
                        <h5 class="card-title">Population with Hearing Difficulty in Percentage</h5>
                        <p class="card-text">Population with hearing loss is said to be approximately 470 million across
                            the
                            globe, and 14.3 million in Japan. This indicates that 1 in 10 Japanese experiences hearing
                            difficulties. About 58% of the population above the age 65 is said to have age-related
                            hearing
                            loss.</p>

                        <br>
                        <h5 class="card-title fs-1">Reference:</h5>
                        <p class="card-text">JapanTrak Report 2018（The rate of self-declared population with hearing
                            loss in
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
            <h4 style="text-align:center;font-size: 2.5rem;"> What Sets Us Apart</h4>
            <br>
            <br>
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
                            <p class="text-capitalize">"Invest in clear hearing with our affordable and effective ear
                                aids.
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
        <style>
            .rounded-circle {
                border-radius: 50% !important;
            }

            .apecialityimages .ourdifferenceimg {
                width: 7rem;
                height: 7rem;
                vertical-align: top;
            }

            .specialmiddleimg {
                width: 20rem;
                height: 20rem;
                vertical-align: top;
            }

            .apecialityimages {
                padding-bottom: 50px;
            }

            .sub-info {
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                color: #e7ebeee7;
            }

            .display-30 {
                font-size: 0.9rem;
            }
        </style>
        <section class="py-4">
            <div class="container">
                <div class="text-center mb-2-8 mb-lg-6">
                    <h2 class="display-18 display-md-16 display-lg-14 font-weight-700">Making Life <strong
                            class="font-weight-700" style="color:wheat;">Better</strong></h2>
                    <span>How Hearing Better Leads to Living Better</span>
                </div>
                <br>
                <br>
                <br>
                <div class="row align-items-center">
                    <div class="col-sm-6 col-lg-4 mb-2-9 mb-sm-0">
                        <div class="pr-md-3">
                            <div class="text-center text-sm-right mb-2-9 apecialityimages">
                                <div class="mb-4">
                                    <img src="{{ asset('assets/images/speciality/mental-health.png') }}"
                                        alt="mental health" class="rounded-circle ourdifferenceimg">
                                </div>
                                <h4 class="sub-info">Mental health</h4>
                                <p class="display-30 mb-0">Hearing better helps keep our minds attentive and sharp.</p>
                            </div>
                            <div class="text-center text-sm-right apecialityimages">
                                <div class="mb-4">
                                    <img src="{{ asset('assets/images/speciality/physical-health.png') }}"
                                        alt="physical health" class="rounded-circle ourdifferenceimg">
                                </div>
                                <h4 class="sub-info">Physical health</h4>
                                <p class="display-30 mb-0">Hearing better helps us maintain an active lifestyle.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="why-choose-center-image">
                            <img src="{{ asset('assets/images/speciality/special-edition-hearing-aids.png') }}"
                                alt="special edition hearing aids" class="rounded-circle specialmiddleimg">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="pl-md-3">
                            <div class="text-center text-sm-left mb-2-9 apecialityimages">
                                <div class="mb-4">
                                    <img src="{{ asset('assets/images/speciality/relationships.png') }}"
                                        alt="relationships" class="rounded-circle ourdifferenceimg">
                                </div>
                                <h4 class="sub-info">Relationships</h4>
                                <p class="display-30 mb-0">Hearing better helps keep us connected to loved ones.</p>
                            </div>

                            <div class="text-center text-sm-left apecialityimages">
                                <div class="mb-4">
                                    <img src="{{ asset('assets/images/speciality/everyday-life.png') }}"
                                        alt="everyday life" class="rounded-circle ourdifferenceimg">
                                </div>
                                <h4 class="sub-info">Everyday life</h4>
                                <p class="display-30 mb-0">Hearing better makes everyday life easier.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">Our blogs</h5>
                    <!-- <a href="blog.html" class="btn btn-light ms-auto rounded-0">View All Blogs<i
                        class='bx bx-chevron-right'></i></a> -->
                </div>
                <hr>
                <div class="product-grid">
                    <div class="latest-news owl-carousel owl-theme">
                        <div class="item">
                            <div class="card rounded-0 product-card border">
                                <div class="news-date">
                                    <div style="color:black;" class="date-number">08</div>
                                    <div style="color:black;width:2rem;" class="date-month">SEP 2024</div>
                                </div>
                                <a href="{{route('blog1')}}">
                                    <img id="blogimages"
                                        src="{{ asset('assets/images/blogs/blog1/olive-max-wireless-rechargeable-hearing-aids.webp') }}"
                                        class="card-img-top border-bottom bg-dark-1" alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="news-title">
                                        <a href="{{route('blog1')}}">
                                            <h5 class="mb-3 text-capitalize">Best Affordable Bluetooth Hearing Aids in
                                                2024: For Apple and Android Users</h5>
                                        </a>
                                    </div>
                                    <p class="news-content mb-0">If you’re in the market for a hearing aid machine,
                                        you’ve likely come across devices with Bluetooth functionality. But is Bluetooth
                                        really necessary in a hearing aid?
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-0 product-card border">
                                <div class="news-date">
                                    <div style="color:black;" class="date-number">15</div>
                                    <div style="color:black;width:2rem;" class="date-month">SEP 2024</div>
                                </div>
                                <a href="{{route('blog2')}}">
                                    <img id="blogimages"
                                        src="{{ asset('assets/images/blogs/blog2/hearing-aid-machine.webp') }}"
                                        class="card-img-top border-bottom bg-dark-1" alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="news-title">
                                        <a href="{{route('blog2')}}">
                                            <h5 class="mb-3 text-capitalize">Bluetooth Hearing Aids vs. Bluetooth
                                                Earbuds: What's the Difference? And What Should You Consider?</h5>
                                        </a>
                                    </div>
                                    <p class="news-content mb-0">As Bluetooth technology has become more widespread,
                                        people of all ages now use wireless earbuds, whether it's for music, calls, or
                                        videos.</p>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-0 product-card border">
                                <div class="news-date">
                                    <div style="color:black;" class="date-number">25</div>
                                    <div style="color:black;width:2rem;" class="date-month">AUG 2024</div>
                                </div>
                                <a href="{{route('blog3')}}">
                                    <img id="blogimages"
                                        src="{{ asset('assets/images/blogs/blog3/otc-bluetooth-hearing-aids.webp') }}"
                                        class="card-img-top border-bottom bg-dark-1" alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="news-title">
                                        <a href="{{route('blog3')}}">
                                            <h5 class="mb-3 text-capitalize">5 Important Things to Look For When Buying
                                                Affordable Hearing Aids</h5>
                                        </a>
                                    </div>
                                    <p class="news-content mb-0">If you're new to hearing aids or experiencing mild to
                                        moderate hearing loss, you may consider purchasing over-the-counter (OTC)
                                        hearing aids. While Bluetooth earbuds like AirPods have...</p>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-0 product-card border">
                                <div class="news-date">
                                    <div style="color:black;" class="date-number">03</div>
                                    <div style="color:black;width:2rem;" class="date-month">SEP 2024</div>
                                </div>
                                <a href="{{route('blog4')}}">
                                    <img id="blogimages"
                                        src="{{ asset('assets/images/blogs/blog4/best-hearing-protection-for-shooting.webp') }}"
                                        class="card-img-top border-bottom bg-dark-1"
                                        alt="best hearing protection for shooting">
                                </a>
                                <div class="card-body">
                                    <div class="news-title">
                                        <a href="{{route('blog4')}}">
                                            <h5 class="mb-3 text-capitalize">Rising Hearing Loss in Young Adults: Best
                                                Hearing Aids and Prevention Tips</h5>
                                        </a>
                                    </div>
                                    <p class="news-content mb-0">While hearing loss is commonly associated with older
                                        adults, young adults can also experience hearing loss due to congenital or
                                        acquired According to the Hearing...</p>
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
                                    <img src="{{ asset('assets/images/brands/main/1.png') }}" class="img-fluid"
                                        alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="item border-end">
                            <div class="p-4">
                                <a href="javascript:;">
                                    <img src="{{ asset('assets/images/brands/main/2.png') }}" class="img-fluid"
                                        alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="item border-end">
                            <div class="p-4">
                                <a href="javascript:;">
                                    <img src="{{ asset('assets/images/brands/main/4.png') }}" class="img-fluid"
                                        alt="...">
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