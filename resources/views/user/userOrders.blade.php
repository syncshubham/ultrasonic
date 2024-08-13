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
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Orders</li>
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
                    </style>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="list-group list-group-flush"> <a
                                                    href="{{ route('user.dashboard') }}" style="padding: .5rem 1rem;"
                                                    class=" d-flex justify-content-between align-items-center bg-transparent">Dashboard
                                                    <i class='bx bx-tachometer fs-5'></i></a>
                                                <a id="active" href="{{ route('user.orders') }}"
                                                    style="padding: .5rem 1rem;"
                                                    class=" d-flex justify-content-between align-items-center bg-transparent">Orders
                                                    <i class='bx bx-cart-alt fs-5'></i></a>
                                                <a href="{{ route('user.addresses') }}" style="padding: .5rem 1rem;"
                                                    class=" d-flex justify-content-between align-items-center bg-transparent">Addresses
                                                    <i class='bx bx-home-smile fs-5'></i></a>

                                                <a href="{{ route('user.paymentmethods') }}"
                                                    style="padding: .5rem 1rem;"
                                                    class=" d-flex justify-content-between align-items-center bg-transparent">Payment
                                                    Methods <i class='bx bx-credit-card fs-5'></i></a>

                                                <a href="{{ route('user.profile') }}" style="padding: .5rem 1rem;"
                                                    class=" d-flex justify-content-between align-items-center">Account
                                                    Details <i class='bx bx-user-circle fs-5'></i></a>
                                                <a href="#" style="padding: .5rem 1rem;"
                                                    class=" d-flex justify-content-between align-items-center bg-transparent">Logout
                                                    <i class='bx bx-log-out fs-5'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .scrollable-table-container {
                                    overflow-x: auto;
                                    overflow-y: auto;
                                    max-height: 400px;
                                }
                                .scrollable-table-container thead {
    position: sticky;
    top: 0;
    background-color: rgb(37, 30, 30);
    z-index: 1;
}
                                /* Optional styling for scrollbars */
                                .scrollable-table-container::-webkit-scrollbar {
                                    width: 8px;
                                    height: 8px;
                                }

                                .scrollable-table-container::-webkit-scrollbar-thumb {
                                    border-radius: 4px;
                                    background-color: rgba(206, 204, 204, 0.588);
                                }
                            </style>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <div class="scrollable-table-container">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->order_id}}</td>
                                                        <td>{{ $order->created_at->format('F d, Y') }}</td>
                                                        <td>
                                                            <div class="badge rounded-pill bg-light w-100">
                                                                {{$order->order_status}} / {{$order->payment_status}}
                                                            </div>
                                                        </td>
                                                        <td>¥{{$order->total_amount}} for {{$order->total_items}}
                                                            item(s)</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <a href="javascript:;"
                                                                    class="btn btn-light btn-sm rounded-0">Cancel</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

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