@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Checkout</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
                <div class="shop-cart">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="checkout-details">
                                <div class="card bg-transparent rounded-0 shadow-none">
                                    <div class="card-body">
                                        <div class="steps steps-light">
                                            <a class="step-item active">
                                                <div class="step-progress"><span class="step-count">1</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                            </a>
                                            <a class="step-item active">
                                                <div class="step-progress"><span class="step-count">2</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
                                            </a>
                                            <a class="step-item">
                                                <div class="step-progress"><span class="step-count">3</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
                                            </a>
                                            <a class="step-item">
                                                <div class="step-progress"><span class="step-count">4</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <img src="assets/images/avatars/avatar-1.png" width="90" alt="" class="rounded-circle p-1 border">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0">Jhon Michle</h6>
                                                <p class="mb-0">michle@example.com</p>
                                            </div>
                                            <div class="ms-auto">	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="border p-3">
                                            <h2 class="h5 mb-0">Shipping Address</h2>
                                            <br>
                                            @if($addresses_count <= 0) <p>No Addresses found kindly add by clicking
                                                below button</p>
                                                @else
                                                <p>Select any one address from the below addresses</p>
                                                @endif
                                                <div class="my-3 border-bottom"></div>
                                                <div class="form-body">
                                                    <form method="POST" action="{{ route('select.address') }}"  class="row g-3">
                                                        @csrf
                                                        @foreach ($addresses as $address)
                                                        <label style="cursor: pointer;"
                                                            for="address_selection{{$address->id}}"
                                                            class="address_lists">
                                                            <div class="address_checkout_action">
                                                                <input style="width:20px;height:20px;"
                                                                    id="address_selection{{$address->id}}" type="radio"
                                                                    name="address_id" value="{{$address->id}}" required>
                                                            </div>
                                                            <div class="main_addresses_checkout">
                                                                <div>Address Line 1: {{$address->address_first_line}}
                                                                </div>
                                                                <div>Address Line 2: {{ $address->address_second_line ?:
                                                                    '' }}</div>
                                                                <div>ZIP Code: {{$address->pin_code}}</div>
                                                                <div>City: {{$address->city}}</div>
                                                                <div>Country: {{$address->country}}</div>
                                                            </div>
                                                        </label>
                                                        @endforeach
                                                        @if ($errors->has('address_id'))
                                                        <div class="alert alert-danger">
                                                            {{ $errors->first('address_id') }}
                                                        </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <div class="d-grid">	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-grid">	<a href="javascript:;" class="btn btn-white btn-ecomm">Proceed to Checkout<i class='bx bx-chevron-right'></i></a>
                                                        </div>
                                                    </div>
                                                    </form>

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="order-summary">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="card rounded-0 border bg-transparent shadow-none">
                                            <div class="card-body">
                                                <p class="fs-5 text-white">Apply Discount Code</p>
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded-0"
                                                        placeholder="Enter discount code">
                                                    <button class="btn btn-light btn-ecomm" type="button">Apply
                                                        Discount</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded-0 border bg-transparent shadow-none">
                                            <div class="card-body">
                                                <p class="fs-5 text-white">Order summary</p>
                                                @forEach($cartItems as $cartItem)
                                                <div class="my-3 border-top"></div>
                                                <div class="d-lg-flex align-items-center gap-2">
                                                    <div class="cart-img text-center text-lg-start">
                                                        <img style="height:6rem;width: 6rem;" src="{{ asset($cartItem['image_1']) }}" width="130" alt="">
                                                    </div>
                                                    <br>
                                                    <div class="cart-detail text-center text-lg-start">
                                                        <h6 class="mb-2">{{$cartItem['product_name']}}</h6>
                                                        <p class="mb-0">Size: <span>{{$cartItem['size']}}</span>, Quantity: <span>{{$cartItem['quantity']}}</span>
                                                        </p>
                                                        <h5 class="mb-0">¥ {{$cartItem['final_price']}}</h5>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-0">Total Items: <span class="float-end"> {{$totalItems}}</span>
                                                </p>
                                                <p class="mb-2">Subtotal: <span class="float-end">¥ {{$totalAmount}}</span>
                                                </p>
                                                <p class="mb-2">Shipping: <span class="float-end">-</span>
                                                </p>
                                                <p class="mb-2">Taxes: <span class="float-end">-</span>
                                                </p>
                                               
                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Order Total: <span class="float-end">¥ {{$totalAmount}}.00</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
@endsection