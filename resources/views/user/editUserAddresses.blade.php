@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Edit Address</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Address</li>
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

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">	<a href="{{ route('user.dashboard') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
                                            <a href="{{ route('user.orders') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
                                            <a href="{{ route('user.addresses') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
                                            
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
                                        <div class="form-body">
                                            
                                            <form method="POST" action="{{ route('address.update', ['id' => $addresses->id]) }}" class="text-white p-3">
                                                @csrf
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="inputAddressLine1" class="form-label">Address Line 1</label>
                                                        <input value="{{ old('address_first_line', $addresses->address_first_line) }}" name="address_first_line" type="text" class="form-control text-white" id="inputAddressLine1" placeholder="Enter part address here !!">
                                                        @error('address_first_line')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputAddressLine2" class="form-label">Address Line 2</label>
                                                        <input value="{{ old('address_second_line', $addresses->address_second_line) }}" name="address_second_line" type="text" class="form-control text-white" id="inputAddressLine2" placeholder="Enter Remaining address here !!">
                                                        @error('address_second_line')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="inputPinCode" class="form-label">ZIP Code</label>
                                                        <input value="{{ old('pin_code', $addresses->pin_code) }}" name="pin_code" type="number" class="form-control text-white" id="inputPinCode" placeholder="">
                                                        @error('pin_code')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="inputCity" class="form-label">City</label>
                                                        <input value="{{ old('city', $addresses->city) }}" name="city" type="text" class="form-control text-white" id="inputCity" placeholder="">
                                                        @error('city')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="inputCountry" class="form-label">Country</label>
                                                        <input value="{{ old('country', $addresses->country) }}" name="country" type="text" class="form-control text-white" id="inputCountry" placeholder="">
                                                        @error('country')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-light"><i class='bx bx-user'></i> Update Address</button>
                                                            @if (session('success'))
                                                                <div class="alert alert-success mt-3">{{ session('success') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
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