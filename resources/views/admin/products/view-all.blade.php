@extends('admin.layout.main')
@section('admincontent')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>Products List</h5>
                        <div class="right-options">
                            <ul>
                                <!-- <li>
                                    <a href="javascript:void(0)">import</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Export</a>
                                </li> -->
                                <li>
                                    <a class="btn btn-solid" href="{{ route('create.productview') }}">Add Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        @if($productCount !== 0)
                        <div class="table-responsive">
                            <table class="table all-package theme-table table-product" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="table-image">
                                                <img src="{{ asset($product->image_1)}}" class="img-fluid product_image" alt="">
                                            </div>
                                        </td>

                                        <td>{{$product->product_name}}</td>
                                        <td>12</td>
                                        <td class="td-price">{{$product->price}}</td>
                                        @if($product->status == 0)
                                        <td class="status-danger status-block">
                                            <span class="statustext">Unverified</span>
                                            <img style="display: none;" style="height:7rem;width:7rem;" src="{{asset('adminassets/images/loader/verification.gif')}}" alt="">
                                        </td>
                                        @elseif($product->status == 1)
                                        <td class="status-success status-block">
                                            <span class="statustext">Verified</span>
                                            <img style="display: none;"  style="height:7rem;width:7rem;" src="{{asset('adminassets/images/loader/verification.gif')}}" alt="">
                                        </td>
                                        @endif
                                        <td>
                                            <ul>
                                                <li>
                                                    <a title="edit product" href="{{ url('admin/product/edit', ['id' => $product->id]) }}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                                        @csrf
                                                    <button style="color:red;border:0px solid white;font-size:17px;" title="Delete product" onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    @if($product->status == 1)
                                                    <button class="product-verification" data-product-id="{{$product->id}}" data-product-status="{{$product->status}}" style="border:0px solid white;background-color:transparent;">
                                                        <img alt="" style="height:2rem;width:2rem;" src="{{asset('adminassets/images/loader/unverified.svg')}}" title="Unverify product">
                                                    </button>
                                                    @elseif($product->status == 0)
                                                    <button class="product-verification" data-product-id="{{$product->id}}" data-product-status="{{$product->status}}" style="border:0px solid white;background-color:transparent;">
                                                        <img alt="" style="height:2rem;width:2rem;" src="{{asset('adminassets/images/loader/verified.svg')}}" title="Verify product">
                                                    </button>
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h3 class="text-danger">No Records found</h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Delete Modal Box Start -->
    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>You Want to delete it permanently</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
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
    <!-- Delete Modal Box End -->
    <script src="{{ asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('adminassets/js/notify/bootstrap-notify.min.js')}}"></script>
@if(session('successproductupdation'))
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
        notify.update('message', '<i class="fas fa-bell"></i></i><strong>Product</strong> Updated.');
    }, 1800);
</script>
@endif


@if(session('successproductdelete'))
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
        notify.update('message', '<i class="fas fa-bell"></i></i><strong>Product</strong> Deleted.');
    }, 1800);
</script>
@endif

<script>
   $(document).ready(function () {
    $('.product-verification').on('click', function () {
        var tempbutton = $(this);
        var mainsection = $(this).closest('tr').find('.status-block');
        var statusText = $(this).closest('tr').find('.status-block .statustext');
        var statuscode = tempbutton.attr('data-product-status');
        var productid = $(this).data('product-id');
        var statusLoader = $(this).closest('tr').find('.status-block img').css({
            'height': '3rem',
            'width': '3.5rem'
        });
        var newSrc = (statuscode == 1) ? '{{ asset('adminassets/images/loader/verified.svg') }}' : '{{ asset('adminassets/images/loader/unverified.svg') }}';
        var url = "{{ route('product-update-status', ['id' => ':id', 'status' => ':status']) }}";
        url = url.replace(':id', productid).replace(':status', statuscode);
        console.log(statuscode);
        var csrfToken = '{{ csrf_token() }}';

        statusText.hide();
        statusLoader.show();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrfToken,
            },
            success: function (response) {
                setTimeout(function () {
                    console.log(response.success);
                    if (response.success == "verified") {
                        console.log("test done")
                        tempbutton.attr('data-product-status', '1');
                        statusText.show();
                        statusText.text("Verified");
                        mainsection.removeClass('status-danger');
                        mainsection.addClass('status-success');
                        statusLoader.hide();
                        tempbutton.find('img').attr('src', newSrc);
                        tempbutton.find('img').attr('title', "Unverify product");
                    }
                    if (response.success == "notverified") {
                        console.log("test not done")
                        tempbutton.attr('data-product-status', '0');
                        statusText.show();
                        statusText.text("Unverified");
                        mainsection.removeClass('status-success');
                        mainsection.addClass('status-danger');
                        statusLoader.hide();
                        tempbutton.find('img').attr('src', newSrc);
                        tempbutton.find('img').attr('title', "Verify product");
                    }
                }, 1300);
            },
            error: function () {
                alert('There might be some problem happened while updating status');
            }
        });
    });
});

</script>
@endsection