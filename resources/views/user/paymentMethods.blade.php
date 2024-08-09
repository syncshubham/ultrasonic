@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Payment Methods</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Methods</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Account</h3>
                <div class="card">
                    <style>
                        #active{
                            background-color: rgb(255 255 255 / 12%) !important;
    border: 1px solid rgb(255 255 255 / 12%) !important;
                        }
                    </style>
<div class="card-body">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-none mb-3 mb-lg-0">
                <div class="card-body">
                    <div class="list-group list-group-flush">	<a href="{{ route('user.dashboard') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
                        <a href="{{ route('user.orders') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
                        <a href="{{ route('user.addresses') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
                        
                        <a id="active" href="{{ route('user.paymentmethods') }}"  style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
                    
                        <a href="{{ route('user.profile') }}"  style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>
                        <a href="#" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow-none mb-0">
                <div class="card-body">
                    <h6 class="mb-4">You can select any of the payment methods while placing the order.</h6>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <h5 class="mb-3">Payment methods</h5>
                            <address class="address_lists">
                                <div>COD (Cash on Delivery)</div>
                            </address>
                            <address class="address_lists">
                            <div>Net Banking</div>
                            </address>
                            <address class="address_lists">
                                <div>Credit/Debit Card</div>
                            </address>  
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
@endsection