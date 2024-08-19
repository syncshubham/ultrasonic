@extends('layouts.main')
@section('content')
<style>

    .md\:grid-cols-3 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .md\:col-span-2 {
        grid-column: span 3 / span 3 !important;
    }

    .sm\:col-span-4 {
        grid-column: span 6 !important;
    }

    .text-gray-600 {
    --tw-text-opacity: 1;
    color: whitesmoke !important;   
    }

    .text-gray-500 {
    --tw-text-opacity: 1;
    color: white !important;
    }

    .bg-gray-100 {
    --tw-bg-opacity: 1;
    background-color: transparent !important;
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color:transparent !important;
}

.text-gray-700 {
    --tw-text-opacity: 1;
    color: whitesmoke !important;
}

.bg-gray-50 {
    --tw-bg-opacity: 1;
    background-color:transparent !important;
}

[type=text], input:where(:not([type])), [type=email], [type=url], [type=password], [type=number], [type=date], [type=datetime-local], [type=month], [type=search], [type=tel], [type=time], [type=week], [multiple], textarea, select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent !important;
    border-color: #6b7280;
    border-width: 1px;
    border-radius: 4px;
    padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 1.5rem;
    --tw-shadow: 0 0 #0000;
    columns: black !important;
}

.bg-gray-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(0 8 25 / 97%) !important;
}

.opacity-75 {
    opacity: 93% !important;
}

.text-gray-900 {
    --tw-text-opacity: 1;
    color: floralwhite !important;
}

    .lg\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem;
        margin-top: -81px !important;
    }

</style>
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
                                        <x-app-layout>
                                            <div>
                                                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                                        @livewire('profile.update-profile-information-form')
                                        
                                                        <x-section-border />
                                                    @endif
                                        
                                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                                        <div class="mt-10 sm:mt-0">
                                                            @livewire('profile.update-password-form')
                                                        </div>
                                        
                                                        <x-section-border />
                                                    @endif
                                        
                                                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                                        <div class="mt-10 sm:mt-0">
                                                            @livewire('profile.two-factor-authentication-form')
                                                        </div>
                                        
                                                        <x-section-border />
                                                    @endif
                                        
                                                    <div class="mt-10 sm:mt-0">
                                                        @livewire('profile.logout-other-browser-sessions-form')
                                                    </div>
                                        
                                                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                                        <x-section-border />
                                        
                                                        <div class="mt-10 sm:mt-0">
                                                            @livewire('profile.delete-user-form')
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </x-app-layout>
                                        
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