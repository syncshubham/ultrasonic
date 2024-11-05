@extends('layouts.main')
@section('meta')
<title>Contact us - Ultrasonic Ltd | Get in Touch for Hearing Aid Solutions</title>
<meta name="description"
    content="Contact Ultrasonic Ltd for expert advice on hearing aids, assistive listening devices, and accessories. We're here to help with your auditory health needs.">
<meta name="keywords"
    content="contact ultrasonic ltd, hearing aid contact, support hearing aids, ear aid help, customer support hearing devices">
<link rel="canonical" href="https://ultra-sonicltd.com/contact-us">
<meta content="en_US" property="og:locale">
<meta content="Ultrasonic Ltd." property="og:site_name">
<meta content="website" property="og:type">
<meta content="https://ultra-sonicltd.com/contact-us" property="og:url">
<meta content="Contact us - Ultrasonic Ltd | Get in Touch for Hearing Aid Solutions" property="og:title">
<meta
    content="Contact Ultrasonic Ltd for expert advice on hearing aids, assistive listening devices, and accessories. We're here to help with your auditory health needs."
    property="og:description">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@ultrasonicltd">
<meta name="twitter:creator" content="@ultrasonicltd">
<meta name="twitter:title" content="Contact us - Ultrasonic Ltd | Get in Touch for Hearing Aid Solutions">
<meta name="twitter:description"
    content="Contact Ultrasonic Ltd for expert advice on hearing aids, assistive listening devices, and accessories. We're here to help with your auditory health needs.">

<meta property="og:title" content="Contact us - Ultrasonic Ltd | Get in Touch for Hearing Aid Solutions" />
<meta property="og:description"
    content="Contact Ultrasonic Ltd for expert advice on hearing aids, assistive listening devices, and accessories. We're here to help with your auditory health needs." />
<meta property="og:url" content="https://ultra-sonicltd.com/contact-us" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{ asset('assets/images/company-ultrasonic.png') }}" />
<meta property="og:image:alt" content="our logo" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
@endsection
@section('schema')
<script type="application/ld+json">
    {
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Ultrasonic Ltd.",
  "url": "https://ultra-sonicltd.com/",
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
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h1 class="breadcrumb-title pe-3">Contact Us</h1>
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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12955.576281363881!2d139.69419313913252!3d35.72882363039857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d5bb9d45c6b%3A0x4f1c44deaf8c4d77!2sNishiikebukuro%2C%20Toshima%20City%2C%20Tokyo%20171-0021%2C%20Japan!5e0!3m2!1sen!2sin!4v1724084041033!5m2!1sen!2sin"
                        class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                                <p class="mb-0 font-13">Mobile : +81 90-9365-1168</p>
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