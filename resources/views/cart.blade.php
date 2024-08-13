@extends('layouts.main')
@section('content')

<head>
    <title>Online Able Plus, Hearing Aid - Ultrasonic Ltd</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/#featuredProducts">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
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
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="shop-cart-list mb-3 p-3">
    @if($cartItems->isEmpty())
    <p>No items in the cart.</p>
    <br>
@else
<div class="card bg-transparent rounded-0 shadow-none">
    <div class="card-body">
        <div class="steps steps-light">
            <a class="step-item active">
                <div class="step-progress"><span class="step-count">1</span>
                </div>
                <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
            </a>
            <a class="step-item">
                <div class="step-progress"><span class="step-count">2</span>
                </div>
                <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
            </a>
            <a class="step-item">
                <div class="step-progress"><span class="step-count">3</span>
                </div>
                <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
            </a>
            <a class="step-item">
                <div class="step-progress"><span class="step-count">4</span>
                </div>
                <div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
            </a>
        </div>
    </div>
</div>
    @foreach($cartItems as $cartItem)
                                <div data-cart-item-id="{{$cartItem->cart_id ? $cartItem->cart_id : $cartItem->product->id}}" class="row align-items-center g-3 product-card-adjst">
                                    <div class="col-12 col-lg-9">
                                    <div class="loader-delete-product" style="display: none;"></div>

                                        <div class="d-lg-flex align-items-center gap-2">
                                            <div class="cart-img text-center text-lg-start">
                                                <img style="height:8rem;" src="{{ asset($cartItem->product->image_1) }}" width="130" alt="">
                                            </div>
                                            <br>
                                            <div class="cart-detail text-center text-lg-start">
                                                <h6 class="mb-2">{{$cartItem->product->product_name}}</h6>
                                                <p class="mb-0">Size: <span>{{$cartItem->size}}</span>, Quantity: <span>{{$cartItem->quantity}}</span>
                                                </p>
                                                <p class="mb-2">Description: <span>{{$cartItem->product->short_desc}}</span>
                                                </p>
                                                <h5 class="mb-0">¥ {{$cartItem->product->final_price}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <br>
                                        <div class="text-center">
                                            <div class=""> <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm delete-cart-item"><i class='bx bx-x-circle'></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
    @endif

                                <div class="d-lg-flex align-items-center gap-2"><a href="/#featuredProducts" class="btn btn-light btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
                                    <!-- <a href="javascript:;" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a> -->
                                </div>
                            </div>
                        </div>
                        @if(!$cartItems->isEmpty())
                        <div id="mainCheckoutPanelCartPage" class="col-12 col-xl-4">
                            <div class="checkout-form p-3 bg-dark-1">
                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                            <div id="checkoutLayoutLoader" class="loader-delete-product" style="display: none;"></div>
                                    <form method="post" action="{{ route('main.checkout') }}" class="card-body">
                                        @csrf
                                        <p class="mb-2">Total Items: <span id="cartPageTotalProducts" class="float-end">{{$totalNumberOfProducts}}</span>
                                        </p>
                                        <input type="hidden" value="{{$totalNumberOfProducts}}" name="totalnumberproducts">
                                        <input type="hidden" value="{{$totalAmount}}" name="totalamount">
                                        <input type="hidden" value="20%" name="discount">

                                        <p class="mb-2">Subtotal: <span id="cartSubTotalAmount" class="float-end">¥ {{$totalAmount}}</span>
                                        </p>
                                        <p class="mb-2">Shipping: <span class="float-end">-</span>
                                        </p>
                                        <p class="mb-0">Taxes: <span class="float-end">-</span>
                                        </p>
                                        <div class="my-3 border-top"></div>
                                        <h5 class="mb-0">Order Total: <span id="cartTotalAmount" class="float-end">¥ {{$totalAmount}}.00</span></h5>
                                        <div class="my-4"></div>
                                        <button style="width:100%;" type="submit" class="d-grid"> <a class="btn btn-white btn-ecomm">Proceed to Checkout</a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.delete-cart-item');
            buttons.forEach(button => {
                button.removeEventListener('click', handleDeleteClick); // Remove existing listener
                button.addEventListener('click', handleDeleteClick, { once: true }); // Add new listener
            });
        });
        
        async function handleDeleteClick(e) {
            const card = e.currentTarget.closest('.product-card-adjst');
            const cartItemId = card.getAttribute('data-cart-item-id');
            const loader = card.querySelector('.loader-delete-product');
            const checkoutLoader= document.getElementById('checkoutLayoutLoader');
            loader.style.display = 'block'; // Show loader
            checkoutLoader.style.display = 'block'; // Show loader
        
            try {
                const response = await fetch('/delete-cart-products', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // if using Laravel
                    },
                    body: JSON.stringify({ cartItemId })
                });
        
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
        
                let result;
                try {
                    result = await response.json();
                } catch (jsonError) {
                    throw new Error('Failed to parse JSON');
                }
        
                if (result.success) {
                    // Animate and remove the element
                    card.style.transition = 'all 0.7s ease';
                    card.style.transform = 'scaleY(0)';
                    card.style.opacity = '30%';
                    
                    await updateCartAfterDeletion();
                    
                    setTimeout(() => {
                        card.remove();
                    }, 700); // Match the CSS transition duration
                } else {
                    alert(result.message || 'Error removing item.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while trying to remove the item.');
            } finally {
                loader.style.display = 'none'; // Hide loader after operation
                checkoutLoader.style.display = 'none'; // Show loader

            }
        }
        
        async function updateCartAfterDeletion() {
            try {
                const totalsResponse = await fetch('/api/cart-totals');
                const totalsData = await totalsResponse.json();
                const layoutPanel = document.getElementById("mainCheckoutPanelCartPage");

                if(totalsData.totalItems >= 1)
                {
                document.getElementById('cartPageTotalProducts').innerText = totalsData.totalItems;
                document.getElementById('cartSubTotalAmount').textContent = `¥${totalsData.totalAmount}`;
                document.getElementById('cartTotalAmount').textContent = `¥${totalsData.totalAmount}`;
                console.log("panel available")
                console.log(totalsData);
                }else{
                    console.log("panel removed")
                    layoutPanel.remove();
                    const shopCartList = document.querySelector('.shop-cart-list');
                    const newParagraph = document.createElement('p');
                    newParagraph.textContent = 'No items in the cart';
                    shopCartList.insertBefore(newParagraph, shopCartList.firstChild);
                }
            } catch (error) {
                console.error('Error fetching updated cart totals:', error);
            }
        }

    </script>
@endsection
