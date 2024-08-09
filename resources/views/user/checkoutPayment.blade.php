@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Checkout</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Checkout</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Payments</li>
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
                                            <a class="step-item active">
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
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="border p-3">
                                            <h2 class="h5 mb-0">Payment Options</h2>
                                            <p>Select any one option from the below options</p>
                                            <div class="my-3 border-bottom"></div>
                                            <div class="form-body">
                                                <form method="POST" action="{{ route('select.payment') }}"
                                                    class="row g-3">
                                                    @csrf
                                                    <label style="cursor: pointer;" for="payment_selection1"
                                                        class="address_lists">
                                                        <div class="address_checkout_action">
                                                            <input style="width:20px;height:20px;"
                                                                id="payment_selection1" type="radio" name="payment_id"
                                                                value="1" required>
                                                        </div>
                                                        <div class="main_addresses_checkout">
                                                            COD (Cash on Delivery)
                                                        </div>
                                                    </label>
                                                    <label style="cursor: not-allowed;" for="payment_selection2"
                                                        class="address_lists">
                                                        <div class="address_checkout_action">
                                                            <input style="width:20px;height:20px;cursor: not-allowed;"
                                                                id="payment_selection2" type="radio" name="payment_id"
                                                                value="2" required disabled>
                                                        </div>
                                                        <div class="main_addresses_checkout">
                                                            Net Banking
                                                        </div>
                                                    </label>
                                                    <p class="text-danger">Currently this method is not available</p>
                                                    <label style="cursor: not-allowed;" for="payment_selection3"
                                                        class="address_lists">
                                                        <div class="address_checkout_action">
                                                            <input style="width:20px;height:20px;cursor: not-allowed;"
                                                                id="payment_selection3" type="radio" name="payment_id"
                                                                value="3" required disabled>
                                                                
                                                        </div>
                                                        <div class="main_addresses_checkout">
                                                            Credit/Debit Card <br>
                                                        </div>
                                                    </label>
                                                    <p class="text-danger">Currently this method is not available</p>
                                                    @if ($errors->has('payment_id'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('payment_id') }}
                                                    </div>
                                                @endif
                                                    <div class="col-md-6">
                                                        <div class="d-grid"> <a href="javascript:;"
                                                                class="btn btn-light btn-ecomm"><i
                                                                    class='bx bx-chevron-left'></i>Back to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button style="border: none;width: 100%;" class="d-grid"> <a
                                                                class="btn btn-white btn-ecomm">Proceed to Review and Place Order<i
                                                                    class='bx bx-chevron-right'></i></a>
                                                        </button>
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
                                                        <img style="height:6rem;width: 6rem;"
                                                            src="{{ asset($cartItem['image_1']) }}" width="130" alt="">
                                                    </div>
                                                    <br>
                                                    <div class="cart-detail text-center text-lg-start">
                                                        <h6 class="mb-2">{{$cartItem['product_name']}}</h6>
                                                        <p class="mb-0">Size: <span>{{$cartItem['size']}}</span>,
                                                            Quantity: <span>{{$cartItem['quantity']}}</span>
                                                        </p>
                                                        <h5 class="mb-0">¥ {{$cartItem['final_price']}}</h5>
                                                    </div>
                                                </div>
                                                @endforeach
                                              
                                            </div>
                                        </div>
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-0">Total Items: <span class="float-end">
                                                        {{$totalItems}}</span>
                                                </p>
                                                <p class="mb-2">Subtotal: <span class="float-end">¥
                                                        {{$totalAmount}}</span>
                                                </p>
                                                <p class="mb-2">Shipping: <span class="float-end">-</span>
                                                </p>
                                                <p class="mb-2">Taxes: <span class="float-end">-</span>
                                                </p>

                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Order Total: <span class="float-end">¥
                                                        {{$totalAmount}}.00</span></h5>
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