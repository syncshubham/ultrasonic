@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Profile</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
                                            <a href="{{ route('user.addresses') }}" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
                                            
                                            <a href="{{ route('user.paymentmethods') }}"  style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
                                        
                                            <a id="active" href="{{ route('user.profile') }}"  style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>
                                            <a href="#" style="padding: .5rem 1rem;" class=" d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    <!-- Profile Information -->
                                                    <div class="card mb-4">
                                                        <div class="card-header">{{ __('Profile Information') }}</div>
                                                        <div class="card-body">
                                                            <form method="POST" action="{{ route('user-profile-information.update') }}">
                                                                @csrf
                                                                @method('PUT')
                                        
                                                                <div class="form-group">
                                                                    <label for="name">{{ __('Name') }}</label>
                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <label for="email">{{ __('Email') }}</label>
                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Update Password -->
                                                    <div class="card mb-4">
                                                        <div class="card-header">{{ __('Update Password') }}</div>
                                                        <div class="card-body">
                                                            <form method="POST" action="{{ route('user-password.update') }}">
                                                                @csrf
                                                                @method('PUT')
                                        
                                                                <div class="form-group">
                                                                    <label for="current_password">{{ __('Current Password') }}</label>
                                                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                                                    @error('current_password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <label for="password">{{ __('New Password') }}</label>
                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Two Factor Authentication -->
                                                    <div class="card mb-4">
                                                        <div class="card-header">{{ __('Two Factor Authentication') }}</div>
                                                        <div class="card-body">
                                                            @if (auth()->user()->two_factor_secret)
                                                                <form method="POST" action="{{ route('two-factor.disable') }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <p>{{ __('Two-factor authentication is currently enabled.') }}</p>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-danger">{{ __('Disable Two-Factor Authentication') }}</button>
                                                                    </div>
                                                                </form>
                                                            @else
                                                                <form method="POST" action="{{ route('two-factor.enable') }}">
                                                                    @csrf
                                                                    <p>{{ __('Two-factor authentication is currently disabled.') }}</p>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">{{ __('Enable Two-Factor Authentication') }}</button>
                                                                    </div>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Log Out from Other Browser Sessions -->
                                                   
                                        
                                                    <!-- Account Deletion -->
                                                    <div class="card mb-4">
                                                        <div class="card-header">{{ __('Delete Account') }}</div>
                                                      
                                                    </div>
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
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
@endsection