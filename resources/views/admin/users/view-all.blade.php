@extends('admin.layout.main')
@section('admincontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>
    <title>All users</title>
</head>
 <!-- All User Table Start -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>Users List</h5>
                        <div class="right-options">
                            <ul>
                                <!-- <li>
                                    <a href="javascript:void(0)">import</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Export</a>
                                </li> -->
                                {{-- <li>
                                    <a class="btn btn-solid" href="{{ route('create.productview') }}">Add Product</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div>
                    <div class="table-responsive table-product">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div style="text-align: center" class="user-name">
                                            <span>{{$user->name}}</span>
                                        </div>
                                    </td>

                                    <td>{{$user->number}}</td>

                                    <td>{{$user->email}}</td>
                                    @if($user->user_status == "user_disabled")
                                    <td class="status-danger status-block">
                                        <span class="statustext">Deactive</span>
                                        <img style="display: none;" style="height:7rem;width:7rem;" src="{{asset('adminassets/images/loader/verification.gif')}}" alt="">
                                    </td>
                                        @elseif($user->user_status == "user_enabled")
                                        <td class="status-success status-block">
                                            <span class="statustext">Active</span>
                                            <img style="display: none;"  style="height:7rem;width:7rem;" src="{{asset('adminassets/images/loader/verification.gif')}}" alt="">
                                        </td>
                                        @endif
                                    <td>
                                        <ul>
                                            <li>
                                                <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                                    @csrf
                                                <button style="color:red;border:0px solid white;font-size:17px;" title="Delete User" onclick="return confirm('Are you sure you want to delete this User ?')">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                                </form>
                                                </li>
                                                {{-- <li>
                                                    @if($product->status == 1)
                                                    <button class="product-verification" data-product-id="{{$product->id}}" data-product-status="{{$product->status}}" style="border:0px solid white;background-color:transparent;">
                                                        <img alt="" style="height:2rem;width:2rem;" src="{{asset('adminassets/images/loader/unverified.svg')}}" title="Unverify product">
                                                    </button>
                                                    @elseif($product->status == 0)
                                                    <button class="product-verification" data-product-id="{{$product->id}}" data-product-status="{{$product->status}}" style="border:0px solid white;background-color:transparent;">
                                                        <img alt="" style="height:2rem;width:2rem;" src="{{asset('adminassets/images/loader/verified.svg')}}" title="Verify product">
                                                    </button>
                                                    @endif
                                                </li> --}}
                                        </ul>
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
</div>

<div class="modal fade theme-modal remove-coupon" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="remove-box text-center">
                    <div class="wrapper">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>
                    <h4 class="text-content">It's Removed.</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('adminassets/js/notify/bootstrap-notify.min.js')}}"></script>

{{-- delete user notification --}}
@if(session('successuserdelete'))
<script>
    'use strict';
    var notify = $.notify('<i class="fas fa-bell"></i></i><strong>Success</strong> task done', {
        type: 'theme',
        allow_dismiss: true,
        delay: 4000,
        showProgressbar: true,
        timer: 300,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });

    setTimeout(function() {
        notify.update('message', '<i class="fas fa-bell"></i></i><strong>User</strong> Deleted.');
    }, 1800);
</script>
@endif

@endsection