@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Orders</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Orders</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tracking</li>
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
                                        @if($order->order_status == "Cancelled")
                                        <h4 class="text-danger">This order has been Cancelled</h4>
                                        @else
                                        @php
                                        $statuses = [
                                        'Placed' => 1,
                                        'Confirmed' => 2,
                                        'processing' => 3,
                                        'Shipped' => 4,
                                        'Delivered' => 5
                                        ];
                                
                                        $currentStatus = $statuses[$order->order_status];
                                        @endphp
                                        <div class="steps steps-light">
                                            <a class="step-item {{ $currentStatus >= 1 ? 'active' : '' }}">
                                                <div class="step-progress"><span class="step-count">1</span></div>
                                                <div class="step-label"><i class="fa-solid fa-thumbs-up"></i>Placed
                                                </div>
                                            </a>
                                            <a class="step-item {{ $currentStatus >= 2 ? 'active' : '' }}">
                                                <div class="step-progress"><span class="step-count">2</span></div>
                                                <div class="step-label"><i class="fa-solid fa-check"></i>Confirmed</div>
                                            </a>
                                            <a class="step-item {{ $currentStatus >= 3 ? 'active' : '' }}">
                                                <div class="step-progress"><span class="step-count">3</span></div>
                                                <div class="step-label"><i
                                                        class="fa-solid fa-chalkboard-user"></i>Processed</div>
                                            </a>
                                            <a class="step-item {{ $currentStatus >= 4 ? 'active' : '' }}">
                                                <div class="step-progress"><span class="step-count">4</span></div>
                                                <div class="step-label"><i class="fa-solid fa-truck-fast"></i>Shipped
                                                </div>
                                            </a>
                                            <a class="step-item {{ $currentStatus >= 5 ? 'active' : '' }}">
                                                <div class="step-progress"><span class="step-count">5</span></div>
                                                <div class="step-label"><i
                                                        class="fa-solid fa-truck-ramp-box"></i>Delivered</div>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="border p-3">
                                            <h2 class="h5 mb-0">Order Tracking # {{$order->order_id}}</h2>
                                            <br>
                                            <div class="my-3 border-bottom"></div>
                                            <div class="form-body">
                                                <div method="POST" action="{{ route('place.order') }}" class="row g-3">
                                                    @csrf
                                                    @foreach($productDetails as $product)
                                                    <div style="margin-bottom:0px !important;margin-left: 0px;"
                                                        class="row align-items-center g-3 product-card-adjst">
                                                        <div class="col-12 col-lg-9">
                                                            <div class="loader-delete-product" style="display: none;">
                                                            </div>

                                                            <div class="d-lg-flex align-items-center gap-2">
                                                                <div class="cart-img text-center text-lg-start">
                                                                    <img style="height:8rem;"
                                                                        src="{{ asset($product['image_1']) }}"
                                                                        width="130" alt="">
                                                                </div>
                                                                <br>
                                                                <div class="cart-detail text-center text-lg-start">
                                                                    <h6 class="mb-2">{{$product['product_name']}}</h6>
                                                                    <p class="mb-0">Size:
                                                                        <span>{{$product['size']}}</span>, Quantity:
                                                                        <span>{{$product['quantity']}}</span>
                                                                    </p>
                                                                    <p class="mb-2">Description:
                                                                        <span>{{$product['short_desc']}}</span>
                                                                    </p>
                                                                    <h5 class="mb-0">¥ {{$product['final_price']}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @if($order->payment_status !== "Paid" && $order->order_status !==
                                                    "Delivered")
                                                    @if($order->order_status !== "Cancelled")
                                                    <form method="post" action="{{ route('order.cancel') }}" class="col-md-6">
                                                        @csrf
                                                        <input type="hidden" name="order_id"
                                                            value="{{ $order->order_id }}">
                                                        <button style="border:none;width:100%;" class="d-grid"> <a
                                                                class="btn btn-white btn-ecomm">Cancel Order<i
                                                                    class='bx bx-chevron-right'></i></a>
                                                        </button>
                                                    </form>
                                                    @endif
                                                    @endif

                                                    @if($order->payment_status == "Paid" && $order->order_status ==
                                                    "Delivered")
                                                    <h2 style="margin-top:40px;">Your order has been successfully delivered</h2>
                                                    @endif
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger mt-3">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
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
                                        <div class="address_lists">
                                            <div class="main_addresses_checkout">
                                                <p style="font-size:1.5rem;">-- PAYMENT MODE --</p>
                                                <span style="font-size:1rem;">COD (Cash on Delivery)</span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="address_lists">
                                            <div class="main_addresses_checkout">
                                                <p style="font-size:1.5rem;">-- SHIPPING DETAILS --</p>
                                                <span style="font-size:1rem;">
                                                    Name : {{$order->user->name}}<br>
                                                    Number : {{$order->user->number}}<br>
                                                    Email : {{$order->user->email}}<br>
                                                    Address : {{$order->address}}
                                                </span>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="address_lists">
                                            <div class="main_addresses_checkout">
                                                <p style="font-size:1.5rem;">STATUS</p>
                                                <span style="font-size:1rem;">
                                                    Order Status : {{$order->order_status}}<br>
                                                    Payment Status : {{$order->payment_status}}<br>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-0">Total Items: <span class="float-end"> {{
                                                        $order->total_items }}</span>
                                                </p>
                                                <p class="mb-2">Subtotal: <span class="float-end">¥ {{
                                                        $order->total_amount }}</span>
                                                </p>
                                                <p class="mb-2">Shipping: <span class="float-end">-</span>
                                                </p>
                                                <p class="mb-2">Taxes: <span class="float-end">-</span>
                                                </p>

                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Order Total: <span class="float-end">¥ {{
                                                        $order->total_amount }}.00</span></h5>
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