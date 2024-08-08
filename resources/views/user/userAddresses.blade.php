@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Addresses</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Addresses</li>
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
                                            <a id="active" href="{{ route('user.addresses') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
                                            
                                            <a href="{{ route('user.paymentmethods') }}"  style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
                                        
                                            <a href="{{ route('user.profile') }}"  style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>
                                            <a href="#" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
        <button style="background-color: #2e4a5575;
        height: 38px;
        color: white;
        font-size: 16px;"><span style="font-size:22px;">+ &nbsp;</span><a href="{{route('add.address')}}">Add More Address</a></button>
        <br>
        <br>
        <style>
            .address_lists{
                background-color: #252d7c30;
                border-left: 5px solid #3e4853;
                padding: 10px;
                display: flex;
                gap: 20px;
                justify-content: center;
                align-items: center;
            }

            .main_addresses{
                width: 80%;
            }

            .address_action{
                display: flex;
                background-color: #252d7c30;
                border-left: 5px solid #3e4853;
                height: 6rem;
                font-size: 20px;
                width: 20%;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 20px;
            }

            .address_action > i, .address_action > form{
                cursor: pointer;
            }
        </style>
                                        <h6 class="mb-4">You can select any of the addresses while placing the order, as per availability</h6>
                                        <div class="row">
                                            <div class="col-12 col-lg-12">
                                                <h5 class="mb-3">Shipping Addresses</h5>
                                                @if($address_count <=0)
                                                <p class="text-danger">No Addresses found, kindly add from above button</p>
                                                @else
                                        @foreach ($addresses as $address)
                                                <address class="address_lists">
                                                    <div class="main_addresses">
                                                        <div>Address Line 1 : {{$address->address_first_line}}</div>
                                                        <div>Address Line 2 : {{ $address->address_second_line ? $address->address_second_line : '' }}</div>
                                                        <div>ZIP Code : {{$address->pin_code}}</div>
                                                        <div>City Code : {{$address->city}}</div>
                                                        <div>Country : {{$address->country}}</div>
                                                    </div>
                                                    <div class="address_action">
                                                        <a href="{{ route('address.edit', $address->id) }}"><i title="Modify Address" class="fa-regular fa-pen-to-square"></i></a>

                                                        <form title="Delete address" id="delete_address_form" action="{{ route('address.delete', $address->id) }}" method="POST">
                                                            @csrf
                                                            <button style="background-color: transparent;
                                                            color: white;
                                                            border: none;" type="submit">
                                                                   <i id="delete_address" onclick="return confirm('Are you sure you want to delete this address?');" title="Delete Address" class="fa-solid fa-delete-left"></i>
                                                                </button>
                                                        </form>
                                                    </div>
                                              </address>
                                                      @endforeach
                                                      @endif
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