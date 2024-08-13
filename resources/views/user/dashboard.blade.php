@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Dashboard</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                        #active {
                            background-color: rgb(255 255 255 / 12%) !important;
                            border: 1px solid rgb(255 255 255 / 12%) !important;
                        }

                        @media(max-width:565px){
                            .mobileadjdashlogout{
                                margin-left: 13.8rem !important;
                            }
                        }
                    </style>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="list-group list-group-flush"> <a
                                                href="{{ route('user.dashboard') }}" id="active"
                                                style="padding: .5rem 1rem;"
                                                class=" d-flex justify-content-between align-items-center bg-transparent">Dashboard
                                                <i class='bx bx-tachometer fs-5'></i></a>
                                            <a href="{{ route('user.orders') }}" style="padding: .5rem 1rem;"
                                                class=" d-flex justify-content-between align-items-center bg-transparent">Orders
                                                <i class='bx bx-cart-alt fs-5'></i></a>
                                            <a href="{{ route('user.addresses') }}" style="padding: .5rem 1rem;"
                                                class=" d-flex justify-content-between align-items-center bg-transparent">Addresses
                                                <i class='bx bx-home-smile fs-5'></i></a>

                                            <a href="{{ route('user.paymentmethods') }}" style="padding: .5rem 1rem;"
                                                class=" d-flex justify-content-between align-items-center bg-transparent">Payment
                                                Methods <i class='bx bx-credit-card fs-5'></i></a>

                                            <a href="{{ route('user.profile') }}" style="padding: .5rem 1rem;"
                                                class=" d-flex justify-content-between align-items-center">Account
                                                Details <i class='bx bx-user-circle fs-5'></i></a>


                                            <form href="#" style="padding: .5rem 1rem;"
                                                class=" d-flex justify-content-between align-items-center bg-transparent"
                                                method="POST" action="{{ route('logout') }}" x-data>@csrf
                                                <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                    href="{{ route('logout') }}">
                                                    Logout <i style="margin-left:13rem;"
                                                        class='mobileadjdashlogout bx bx-log-out fs-5'></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <p>Hello <strong>{{$userName}}</strong></p>
                                        <form style="margin-top:-12px;" method="POST" action="{{ route('logout') }}"
                                            x-data>
                                            @csrf
                                            <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                href="{{ route('logout') }}">
                                                ( not <strong>you ?</strong> Logout )
                                            </a>
                                        </form>
                                        <br>
                                        <p>From your account dashboard you can view your Recent Orders, manage your
                                            shipping and billing addesses and edit your password and account details</p>
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