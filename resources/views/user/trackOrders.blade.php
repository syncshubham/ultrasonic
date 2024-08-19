@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">TracK Orders</h3>
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
                    <div class="col-9 col-md col-12 order-4 order-md-2">
                        <form method="get" action="{{ route('track-order-number') }}"
                            class="input-group flex-nowrap px-xl-4">
                            @csrf
                            <input style="height:80px;" type="text" name="order_id" class="form-control w-100"
                                placeholder="Enter the Order Number" required>
                            <button class="input-group-text cursor-pointer">Search</button>
                        </form>
                        <br>
                        <br>
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
        </section>
        <!--end shop cart-->
    </div>
</div>
@endsection