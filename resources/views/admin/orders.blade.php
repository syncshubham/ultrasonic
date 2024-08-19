@extends('admin.layout.main')
@section('admincontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>
    <title>All Orders</title>
</head>
<style>
    #orders_action_button:hover{
        color: white !important;
        background-color: rgba(19, 33, 45, 0.65) !important;
    }
</style>
<!-- All User Table Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>Orders List</h5>
                    </div>
                    <div>
                        <div class="table-responsive table-product">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>User</th>
                                        <th>Total Products</th>
                                        <th>Total Amount</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td style="text-align:center;">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{$order->order_id }}
                                        </td>
                                        <td>{{ $order->created_at->format('F d, Y') }}</td>

                                        <td>{{$order->user->name}}</td>
                                        <td>
                                            {{$order->total_items }}
                                        </td>
                                        <td>
                                            ¥{{$order->total_amount }}
                                        </td>

                                        <td>{{ ucfirst($order->order_status) }}</td>
                                        <td>{{ ucfirst($order->payment_status) }}</td>
                                        <td><a id="orders_action_button" class="btn btn-solid" href="{{ url('admin/orders/update', ['id' => $order->order_id]) }}">View/Update</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('adminassets/js/notify/bootstrap-notify.min.js')}}"></script>

   

    @endsection