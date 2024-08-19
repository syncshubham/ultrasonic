@extends('layouts.main')
@section('content')

<head>
    <title>Contact ultrasonic team</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Contact</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/#featuredProducts">Pages</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Google Map</h3>
                <div class="contact-map p-3 bg-dark-1 rounded-0 shadow-none">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12955.576281363881!2d139.69419313913252!3d35.72882363039857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d5bb9d45c6b%3A0x4f1c44deaf8c4d77!2sNishiikebukuro%2C%20Toshima%20City%2C%20Tokyo%20171-0021%2C%20Japan!5e0!3m2!1sen!2sin!4v1724084041033!5m2!1sen!2sin" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="p-3 bg-dark-1">
                            <form>
                                <div class="form-body">
                                    <h6 class="mb-0 text-uppercase">Drop us a line</h6>
                                    <div class="my-3 border-bottom"></div>
                                    <div class="mb-3">
                                        <label class="form-label">Enter Your Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Enter Email</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Message</label>
                                        <textarea class="form-control" rows="4" cols="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-light btn-ecomm">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-3 bg-dark-1">
                            <div class="address mb-3">
                                <p class="mb-0 text-uppercase text-white">Address</p>
                                <p class="mb-0 font-12">3-33-6, Nishi-ikebukuro,Toshima-ku,Tokyo,Japan,171-0021</p>
                            </div>
                            <div class="phone mb-3">
                                <p class="mb-0 text-uppercase text-white">Phone</p>
                                <p class="mb-0 font-13">Mobile :  +81 3 5962 0611</p>
                            </div>
                            <div class="email mb-3">
                                <p class="mb-0 text-uppercase text-white">Email</p>
                                <p class="mb-0 font-13">kidokoro@ultra-sonic.jp
                                </p>
                            </div>
                            <div class="working-days mb-3">
                                <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>
                                <p class="mb-0 font-13">Mon - SUN / 9:30 AM - 6:30 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
    </div>
</div>

@endsection