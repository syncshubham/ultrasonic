@extends('admin.layout.main')
@section('admincontent')
<!-- Order Tracking Seation starts-->
<style>
    .order-image-contain {
        padding-left: 15px;
        border-left: 2px solid #b4b7b7;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Order Details # {{$order->order_id}}</h5>
                            </div>
                            @if($order->order_status == "Cancelled")
                            <h2 class="text-danger">This order has been Cancelled</h2>
                            <br>
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
                            <ol class="progtrckr">
                                <li class="{{ $currentStatus >= 1 ? 'progtrckr-done' : 'progtrckr-todo' }}">
                                    <h5>Order Placed</h5>
                                </li>
                                <li class="{{ $currentStatus >= 2 ? 'progtrckr-done' : 'progtrckr-todo' }}">
                                    <h5>Order Confirmed</h5>
                                </li>
                                <li class="{{ $currentStatus >= 3 ? 'progtrckr-done' : 'progtrckr-todo' }}">
                                    <h5>Order Processing</h5>
                                </li>
                                <li class="{{ $currentStatus >= 4 ? 'progtrckr-done' : 'progtrckr-todo' }}">
                                    <h5>Shipped</h5>
                                </li>
                                <li class="{{ $currentStatus >= 5 ? 'progtrckr-done' : 'progtrckr-todo' }}">
                                    <h5>Delivered</h5>
                                </li>
                            </ol>
                            @endif
                            <div class="row">
                                @foreach($productDetails as $product)
                                <div style="padding: 14px 0px 14px 0px;
                                    border: 1px solid #c4b9b9;" class="col-12 overflow-hidden">
                                    <div class="order-left-image">
                                        <div class="tracking-product-image">
                                            <img style="height:8rem;" src="{{asset($product['image_1'])}}"
                                                class="img-fluid w-100 blur-up lazyload" alt="">
                                        </div>
                                        <div class="order-image-contain">
                                            <h4>{{$product['product_name']}}</h4>
                                            <div class="tracker-number">
                                                <p>Size : <span>{{$product['size']}}</span></p>
                                                <p>Quantity : <span>{{$product['quantity']}}</span></p>
                                                <p>Price : <span>¥ {{$product['final_price']}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="save-details-box">
                                        <div class="row g-4">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="card-header-2 mb-3">
                                                    <h5>Shipping Details</h5>
                                                </div>
                                                <div class="save-details">
                                                    <div class="save-name">
                                                        <h5 style="font-weight:bold;">{{ $order->user->name }}</h5>
                                                    </div>

                                                    <div class="save-position">
                                                        <h6>Personal</h6>
                                                    </div>

                                                    <div class="save-address">
                                                        <p>{{ $order->address }}</p>
                                                    </div>

                                                    <div class="mobile">
                                                        <p class="mobile"><span style="font-weight:bold;">Mobile No.</span> {{ $order->user->number }}</p>
                                                    </div>
                                                    <div style="margin-top:-20px;" class="mobile">
                                                        <p class="mobile"><span style="font-weight:bold;">Email ID.</span> {{ $order->user->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="card-header-2 mb-3">
                                                    <h5>Payment Mode</h5>
                                                </div>
                                                <div class="save-details">
                                                    <div style="margin-bottom: 0px !important;" class="save-name">
                                                        <h5 style="font-weight:bold;">COD (CASH ON DELIVERY)</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="save-details-box">
                                        <div class="row g-4">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="card-header-2 mb-3">
                                                    <h5>Other Details</h5>
                                                </div>
                                                <div class="save-details">
                                                    <div class="mobile">
                                                        <p class="mobile"><span style="font-weight:bold;">Total Items
                                                                :</span> {{ $order->total_items }}</p>
                                                    </div>
                                                    <div style="margin-top:-20px;" class="mobile">
                                                        <p class="mobile"><span style="font-weight:bold;">Total Amount
                                                                :</span> ¥ {{ $order->total_amount }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .selection {
                                width: 100% !important;
                            }
                        </style>

                        @if($order->order_status == "Cancelled")
                        <p><strong>Order Status:</strong> Cancelled</p>
                        <p><strong>Payment Status:</strong> Cancelled</p>
                        @else
                        @if($order->payment_status === 'Paid' && $order->order_status === 'Delivered')
                        <div>
                            <p><strong>Order Status:</strong> {{ ucfirst($order->order_status) }}</p>
                            <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
                        </div>
                        @elseif($order->payment_status === 'Paid' && $order->order_status !== 'Delivered')
                        <form method="post" action="{{ route('update.order') }}" class="mb-4 row align-items-center">
                            @csrf
                            <label class="col-sm-12 col-form-label form-label-title">
                                <span style="color:red;font-size:20px;display:inline-block;">*</span>Payment Status : {{
                                ucfirst($order->payment_status) }}
                            </label>
                            <label class="col-sm-3 col-form-label form-label-title">
                                <span style="color:red;font-size:20px;display:inline-block;">*</span>Order Status
                            </label>
                            <div class="col-sm-9">
                                <select style="width:100%;" name="order_status" class="js-example-basic-single w-100">
                                    <option disabled selected>Order Status</option>
                                    <option value="Placed" {{ $order->order_status == 'Placed' ? 'selected' : ""
                                        }}>Placed</option>
                                    <option value="Confirmed" {{ $order->order_status == 'Confirmed' ? 'selected' : ""
                                        }}>Confirmed</option>
                                    <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : ""
                                        }}>Processing</option>
                                    <option value="Shipped" {{ $order->order_status == 'Shipped' ? 'selected' : ""
                                        }}>Shipped</option>
                                    @if($order->payment_status === 'Paid')
                                    <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : ""
                                        }}>Delivered</option>
                                    @endif
                                </select>
                            </div>

                            <input type="hidden" name="order_id" value="{{ $order->order_id }}">

                            <div class="card-footer text-end border-0 pb-0 d-flex justify-content-end">
                                <button class="btn btn-primary me-3">Submit</button>
                            </div>
                        </form>
                        @else
                        <form method="post" action="{{ route('update.order') }}" class="mb-4 row align-items-center">
                            @csrf
                            <label class="col-sm-3 col-form-label form-label-title">
                                <span style="color:red;font-size:20px;display:inline-block;">*</span>Payment Status
                            </label>
                            <div class="col-sm-9">
                                <select style="width:100%;" name="payment_status" class="js-example-basic-single w-100">
                                    <option disabled selected>Payment Status</option>
                                    <option value="Pending" {{ $order->payment_status == 'Pending' ? 'selected' : ""
                                        }}>Pending</option>
                                    <option value="Paid" {{ $order->payment_status == 'Paid' ? 'selected' : "" }}>Paid
                                    </option>
                                </select>
                                @if ($errors->has('payment_status'))
                                <div class="alert alert-danger">{{ $errors->first('payment_status') }}</div>
                                @endif
                            </div>

                            <label class="col-sm-3 col-form-label form-label-title">
                                <span style="color:red;font-size:20px;display:inline-block;">*</span>Order Status
                            </label>
                            <div class="col-sm-9">
                                <select style="width:100%;" name="order_status" class="js-example-basic-single w-100">
                                    <option disabled selected>Order Status</option>
                                    <option value="Placed" {{ $order->order_status == 'Placed' ? 'selected' : ""
                                        }}>Placed</option>
                                    <option value="Confirmed" {{ $order->order_status == 'Confirmed' ? 'selected' : ""
                                        }}>Confirmed</option>
                                    <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : ""
                                        }}>Processing</option>
                                    <option value="Shipped" {{ $order->order_status == 'Shipped' ? 'selected' : ""
                                        }}>Shipped</option>
                                    <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : ""
                                        }}>Delivered</option>
                                </select>
                            </div>

                            <input type="hidden" name="order_id" value="{{ $order->order_id }}">


                            <div class="card-footer text-end border-0 pb-0 d-flex justify-content-end">
                                <button class="btn btn-primary me-3">Submit</button>
                            </div>
                        </form>
                        @endif
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
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
<script src="{{ asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
@endsection