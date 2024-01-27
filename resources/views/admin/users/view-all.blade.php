@extends('admin.layout.main')
@section('admincontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- All User Table Start -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
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
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
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
<!-- All User Table Ends-->
<script src="{{ asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('adminassets/js/notify/bootstrap-notify.min.js')}}"></script>
@endsection