@extends('layouts.main')
@section('content')

<head>
    <title>what are ultrasonic refund and cancellation policies</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Refund & Cancellation</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/#featuredProducts">Pages</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Refund & Cancellation</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <style>
            #privacy_heading {
            font-family: bebas neue;
            font-size: 46px;
            text-align: center;
            color: whitesmoke;
            margin: 0;
            padding: 0 0 6px 0;
            border-bottom: 1px solid wheat;
          }
          
          
          .privacy_h2 {
            font-family: bebas neue;
            font-size: 26px;
            line-height: 20px;
            text-align: left;
            width: auto;
            color: whitesmoke;
            margin: 0;
            padding: 20px 0 0 0;
              position: relative;
          }
          
          .privacy_h2:after {
              content: "";
              position: absolute;
              bottom: -7px;
              left: 0;
              width: 5%; /* Adjust this value as needed */
              height: 3px;
              background-color:wheat; /* Change the color as needed */
          }
          
          
          .privacy_p {
            font-family: open sans;
            font-size: 13px;
            letter-spacing: 1px;
            color: rgb(219, 220, 222);
            margin: 0;
            padding: 10px 0 0 0;
          }
          
          
          .subheadings{
            font-weight: bold;
          }
          
          </style>
        <div style="padding: 30px;">
        <h1 id="privacy_heading">Refund & Cancellation Policies</h1>
        <h2 class="privacy_h2">Cancellation Window</h2>
        <p class="privacy_p">
          Refunds and cancellations are generally eligible only before the order status has been to "SHIPPED". Most cancellations are accepted up to 24 hours before your scheduled shipment.
        </p>
        
        <h2 class="privacy_h2">Non-Refundable Services</h2>
        <p class="privacy_p">
        After the shipment process started the goods and services will be non-refundable.
        </p>
        
        <h2 class="privacy_h2">Refund Conditions</h2>
        <p class="privacy_p">
        Refunds may be issued under the following conditions:
        <ul>
        <li>The refund is made within the specified cancellation window that will be notified to user via email and also user can check from their dashboard via logging in to the portal.</li>
        <li>The cancellation is eligible for a refund based on the cancellation and refund policies of the portal.</li>
        </ul>
        </p>
        
        <h2 class="privacy_h2">Cancellation Timing</h2>
        <p class="privacy_p">
        Cancellations can be made up until the point when order shipment has been started.
        </p>
        
        <h2 class="privacy_h2">Non-Cancellable products</h2>
        <p class="privacy_p">
        Certain products may be labeled as non-cancellable due to their nature or some other circumstances. Users will be notified at the time of booking if a product is non-cancellable.
        </p>
        
        <h2 class="privacy_h2">Alert on Non-Cancellable products</h2>
        <p class="privacy_p">
        Prior to booking and payment, users will shown a clear alert if a product is non-cancellable. This alert will include information about the non-refundable nature of the product and any applicable terms and conditions.
        </p>
        
        <h2 class="privacy_h2">Exceptions</h2>
        <p class="privacy_p">
        In rare circumstances, exceptions to the cancellation policy may be considered. Users can contact our customer support team to discuss their situation and explore possible solutions.
        </p>
        
        <h2 class="privacy_h2">Communication</h2>
        <p class="privacy_p">
        We strive to communicate our cancellation policy clearly and transparently to our users. If you have any questions or concerns regarding our cancellation policy, please contact our customer support team for assistance.
        </p>
        </div>
    </div>
</div>

@endsection