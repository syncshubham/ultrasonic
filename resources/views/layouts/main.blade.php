<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ===================================== Meta site ================================================ -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- ============================== GOOGLE WEB FONT ========================== -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto:300,400" rel="stylesheet">
    <!-- =============================== BASE CSS stylesheet ======================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}"
        media="all" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pace.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    @media(min-width:515px) {
        .mobile-item {
            display: none;
        }
    }

    @media(max-width:515px) {
        .desktop-item {
            display: none;
        }
    }




    .loadercartdeletion {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100px;
        height: 20px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .loadercartdeletion .dot {
        width: 8px;
        height: 8px;
        background-color: #e0e0e0;
        /* Change color as needed */
        border-radius: 50%;
        margin: 0 2px;
        animation: pulse 1.2s infinite linear;
    }

    .loadercartdeletion .dot:nth-child(1) {
        animation-delay: 0s;
    }

    .loadercartdeletion .dot:nth-child(2) {
        animation-delay: 0.15s;
    }

    .loadercartdeletion .dot:nth-child(3) {
        animation-delay: 0.3s;
    }

    @keyframes pulse {

        0%,
        80%,
        100% {
            transform: scale(0.6);
        }

        40% {
            transform: scale(1);
        }
    }

    .dropdown-item {
        position: relative;
        /* Ensure sufficient height and other styling */
    }
</style>

<body class="bg-theme bg-theme2">

    <b class="screen-overlay"></b>
    <!--wrapper-->
    <div class="wrapper">

        <div class="discount-alert bg-dark-1 d-none d-lg-block">
            <div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">
                <div class="d-lg-flex align-items-center gap-2 justify-content-center">
                    <p class="mb-0 text-white">Discover the power of <strong>crystal-clear sound</strong> with our
                        premium</p>
                    <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Hearing Aids</a>
                    <p class="mb-0 font-13 text-light-3">*Get it now</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <!--start top header wrapper-->
        <div class="header-wrapper bg-dark-1">
            <div class="top-menu border-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand">
                        <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Welcome to hearing
                            aid online store!</div>
                        <ul class="navbar-nav ms-auto d-none d-lg-flex">
                            <li class="nav-item"> <a class="nav-link" href="order-tracking.html">Track Order</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="about-us.html">About</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="blog.html">Blog</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="javascript:;">Help & FAQs</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">USD</a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item" href="#">USD</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">EUR</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    <div class="lang d-flex gap-1">
                                        <div><i class="flag-icon flag-icon-um"></i>
                                        </div>
                                        <div><span>ENG</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-end">
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"> <i
                                            class="flag-icon flag-icon-de me-2"></i><span>German</span>
                                    </a> <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-fr me-2"></i><span>French</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-um me-2"></i><span>English</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-in me-2"></i><span>Hindi</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-cn me-2"></i><span>Chinese</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-ae me-2"></i><span>Arabic</span></a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                            <li style="color: white;font-weight:bold;margin-right:20px;border-bottom:1px solid white;"
                                class="nav-item mobile-item">@if ($userName)
                                Hello, {{$userName}}
                                @else
                                <a href="{{route('login')}}">Sign in Now</a>
                                @endif
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="javascript:;"><i
                                        class='bx bxl-facebook'></i></a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="javascript:;"><i
                                        class='bx bxl-twitter'></i></a>
                            </li>
                            @if ($userName)
                            <li class="nav-item mobile-item">
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a onclick="event.preventDefault(); this.closest('form').submit();"
                                        href="{{ route('logout') }}">
                                        <i style="color:#ff4d4d;font-size:30px;" class="fa-solid fa-right-from-bracket">
                                        </i>
                                    </a>
                                </form>
                            </li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header-content pb-3 pb-md-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-auto">
                            <div class="d-flex align-items-center">
                                <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i
                                        class='fa-solid fa-bars'></i></div>
                                <div style="margin-left:40px;" class="logo d-lg-flex">
                                    <a href="index.html">
                                        <img style="width:4rem;" src="{{ asset('assets/images/logo-icon.png') }}"
                                            class="logo-icon" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md order-4 order-md-2">
                            <div class="input-group flex-nowrap px-xl-4">
                                <input type="text" class="form-control w-100" placeholder="Search for Products">
                                <select class="form-select flex-shrink-0" aria-label="Default select example"
                                    style="width: 10.5rem;">
                                    <option selected="">All Categories</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span>
                            </div>
                        </div>
                        <div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
                            <div class="fs-1 text-white"><a href="{{route('login')}}" class="nav-link cart-link"><i
                                        class='bx bx-user'></i></a></div>
                            <div class="ms-2">
                                @if ($userName)
                                <p class="mb-0 font-13"><a href="{{route('login')}}">Hello, {{$userName}}</a></p>
                                <h5 class="mb-0"><a href="{{route('login')}}">Welcome again</a></h5>
                                @else
                                <p class="mb-0 font-13"><a href="{{route('login')}}">Hello, Sign in to</a></p>
                                <h5 class="mb-0"><a href="{{route('login')}}">Accounts</a></h5>
                                @endif

                            </div>
                        </div>
                        <div class="col col-md-auto order-2 order-md-4">
                            <div class="top-cart-icons">
                                <nav class="navbar navbar-expand">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item"><a href="wishlist.html" class="nav-link cart-link"><i
                                                    class='bx bx-heart'></i></a></li>

                                        <li class="nav-item dropdown dropdown-large">
                                            <a href="#" id="cart-link"
                                                class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link"
                                                data-bs-toggle="dropdown">
                                                <span id="productCount" class="alert-count">@if($cart>0)
                                                    {{$cart}} @else {{'?'}} @endif</span>
                                                <i class='bx bx-shopping-bag'></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" id="cartDropdown">
                                                <div id="cartLoader"
                                                    style="display: none; text-align: center; padding: 20px;">
                                                    <div class="spinner-border" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <div id="cartContent" style="display: none;">

                                                </div>
                                                <div class="d-grid p-3 border-top">
                                                    <a href="javascript:;" class="btn btn-light btn-ecomm">CHECKOUT</a>
                                                </div>
                                            </div>
                                        </li>
                                        @if($userName)
                                        <li style="margin-left:10px;margin-top:10px;" class="nav-item desktop-item">
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                    href="{{ route('logout') }}">
                                                    <i style="color:#ff4d4d;font-size:40px;"
                                                        class="fa-solid fa-right-from-bracket">
                                                    </i>
                                                </a>
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>

            <script>

                document.querySelectorAll('.dropdown-menu').forEach(function (menu) {
                    menu.addEventListener('click', function (event) {
                        console.log("propagation stopped");
                        event.stopPropagation();
                    });
                });


                document.querySelector('#cart-link').addEventListener('show.bs.dropdown', async function (event) {
                    console.log("cart button clicked");
                    const cartDropdown = document.getElementById('cartDropdown');
                    const cartLoader = document.getElementById('cartLoader');
                    const cartContent = document.getElementById('cartContent');

                    // Show loader
                    cartLoader.style.display = 'block';
                    cartContent.style.display = 'none';

                    try {
                        // Await the fetching of cart data
                        const cartData = await fetchCartData();
                        console.log(cartData);
                        populateCartDropdown(cartData);

                        // Hide loader and show content
                        cartLoader.style.display = 'none';
                        cartContent.style.display = 'block';
                    } catch (error) {
                        console.error('Failed to load cart data:', error);
                        // cartLoader.innerHTML = 'Failed to load data';
                    }
                });

                async function fetchCartData() {
                    try {
                        // Directly fetch cart data, backend will handle the source based on user authentication
                        const response = await fetch('/api/cart');
                        const data = await response.json();
                        // console.log(data);

                        if (data.hasOwnProperty('original')) {
                            console.log(data.original.cartItems);
                            return [data.original];
                        } else {
                            console.log(data);
                            return data;
                        }

                    } catch (error) {
                        console.error('Failed to fetch cart data:', error);
                        throw error;  // Rethrow to allow the caller to handle it
                    }
                }

                function populateCartDropdown(cartData) {
                    const cartContent = document.getElementById('cartContent');
                    cartContent.innerHTML = ''; // Clear existing content
                    let productHTML = `<a href="https://exportersway.com">
													<div class="cart-header">
														<p id="cartTotalCount" class="cart-header-title mb-0">${cartData[0].totalItems} ITEMS</p>
														<p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
													</div>
												</a>`
                    cartData[0].cartItems.forEach(item => {
                        productHTML += `
                                        <a class="dropdown-item" id="dropdown-item-temp" href="javascript:;">
                                            <div class="d-flex align-items-center" data-cart-item-id="${item.id || item.product_id + '|' + item.size}">
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title">${item.product_name}</h6>
                                                    <p class="cart-product-price">${item.quantity} X ¥${item.final_price}</p>
                                                </div>
                                                <div class="position-relative tempimagescart">
                                                    <div class="cart-product-cancel position-absolute" data-delete-cart-item-id="${item.id || item.product_id + '|' + item.size}"><i class='bx bx-x'></i></div>
                                                    <div class="cart-product">
                                                        <img src="{{asset('${item.image_1}')}}" class="" alt="product image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>`;
                    });


                    productHTML += `<a href="javascript:;">
													<div class="text-center cart-footer d-flex align-items-center">
														<h5 class="mb-0">TOTAL</h5>
														<h5 id="cartTotalAmount" class="mb-0 ms-auto">¥${cartData[0].totalAmount}</h5>
													</div>
												</a>`

                    cartContent.insertAdjacentHTML('beforeend', productHTML);

                }

                function createPulsatingDotsLoader() {
                    const loader = document.createElement('div');
                    loader.className = 'loadercartdeletion';

                    // Create dots
                    for (let i = 0; i < 3; i++) {
                        const dot = document.createElement('div');
                        dot.className = 'dot';
                        loader.appendChild(dot);
                    }

                    return loader;
                }
                // Assuming the dropdown that contains the cart items is always present in the DOM
                document.querySelector('.dropdown-menu-end').addEventListener('click', async function (event) {
                    // Check if the clicked element has the class 'cart-product-cancel'
                    console.log("delete click try ")
                    if (event.target.closest('.cart-product-cancel')) {
                        const button = event.target.closest('.cart-product-cancel');
                        const cartItemId = button.dataset.deleteCartItemId;
                        const cartItemElement = button.closest('.dropdown-item');
                        console.log(cartItemId);

                        const loader = createPulsatingDotsLoader();
                        cartItemElement.appendChild(loader);

                        loader.className = 'loadercartdeletion';
                        console.log("loader should be played")

                        try {
                            const response = await fetch('/delete-cart-item', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ cart_item_id: cartItemId })
                            })
                            const data = await response.json()
                            if (data.message) {
                                // Animate and remove the cart item
                                animateAndRemoveCartItem(cartItemElement);
                                await updateCartTotals();
                            } else if (data.errormessage) {
                                alert(data.errormessage);
                            }
                            cartItemElement.removeChild(loader);
                        }
                        catch (error) {
                            console.error('Error removing cart item:', error);
                            alert('Failed to remove item. Please try again.');
                            cartItemElement.classList.remove('loading');
                        };
                    }
                });

                function animateAndRemoveCartItem(cartItemElement) {
                    cartItemElement.style.transition = 'all 0.5s ease-out';
                    cartItemElement.style.transform = 'translateX(-270px)';
                    cartItemElement.style.opacity = '0';
                    setTimeout(() => {
                        cartItemElement.remove();
                    }, 500);
                }

                async function updateCartTotals() {
                    try {
                        const totalsResponse = await fetch('/api/cart-totals');
                        const totalsData = await totalsResponse.json();
                        document.getElementById('cartTotalCount').textContent = `${totalsData.totalItems} ITEMS`;
                        document.getElementById('cartTotalAmount').textContent = `¥${totalsData.totalAmount}`;
                        document.getElementById('productCount').innerText = totalsData.totalItems;
                    } catch (error) {
                        console.error('Error fetching updated cart totals:', error);
                    }
                }
            </script>

            <div class="primary-menu border-top">
                <div class="container">
                    <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
                        <div class="offcanvas-header">
                            <button class="btn-close float-end"></button>
                            <img style="width:4rem;" src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon"
                                alt="">
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item active"> <a class="nav-link" href="index.html">Home </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="blog.html">Blog </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="about-us.html">About Us </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact Us </a>
                            </li>
                            <!-- <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a>
                            </li> -->
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="#" data-bs-toggle="dropdown">My Account <i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="account-dashboard.html">Dashboard</a>
                                    </li>
                                    <li><a class="dropdown-item" href="account-downloads.html">Downloads</a>
                                    </li>
                                    <li><a class="dropdown-item" href="account-orders.html">Orders</a>
                                    </li>
                                    <li><a class="dropdown-item" href="account-payment-methods.html">Payment Methods</a>
                                    </li>
                                    <li><a class="dropdown-item" href="account-user-details.html">User Details</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--end top header wrapper-->

        <!-- main Content of the page starts from here except than header and footer -->
        @yield('content')
        <!-- main content ends here -->

        <!--start footer section-->
        <style>
            @media(min-width:565px) {
                #footerappdownload {
                    display: flex !important;
                    flex-direction: column;
                    justify-content: flex-start !important;
                    align-items: flex-start !important;
                }
            }
        </style>
        <footer>
            <section class="py-4 bg-dark-1">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                        <div class="col">
                            <div class="footer-section1 mb-3">
                                <h6 class="mb-3 text-uppercase">Contact Info</h6>
                                <div class="address mb-3">
                                    <p class="mb-0 text-uppercase text-white">Address</p>
                                    <p class="mb-0 font-12">3-33-6, Nishi-ikebukuro,Toshima-ku,Tokyo,Japan,171-0021</p>
                                </div>
                                <div class="phone mb-3">
                                    <p class="mb-0 text-uppercase text-white">Phone</p>
                                    <!-- <p class="mb-0 font-13">Toll Free (123) 472-796</p> -->
                                    <p class="mb-0 font-13">Mobile : +81 3 5962 0611</p>
                                </div>
                                <div class="email mb-3">
                                    <p class="mb-0 text-uppercase text-white">Email</p>
                                    <p class="mb-0 font-13">kidokoro@ultra-sonic.jp</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-section2 mb-3">
                                <div class="download-app mt-3">
                                    <h6 class="mb-3 text-uppercase">Download our app</h6>
                                    <div id="footerappdownload" class="d-flex align-items-center gap-2">
                                        <a href="javascript:;">
                                            <img src="{{ asset('assets/images/icons/apple-store.png') }}" class=""
                                                width="160" alt="">
                                        </a>
                                        <a href="javascript:;">
                                            <img src="{{ asset('assets/images/icons/play-store.png') }}" class=""
                                                width="160" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-section3 mb-3">
                                <h6 class="mb-3 text-uppercase">Popular Tags</h6>
                                <div class="tags-box"> <a href="javascript:;" class="tag-link">Able</a>
                                    <a href="javascript:;" class="tag-link">Able Plus</a>
                                    <a href="javascript:;" class="tag-link">Able Aid</a>
                                    <a href="javascript:;" class="tag-link">Hearing Aid</a>
                                    <a href="javascript:;" class="tag-link">Ear Problem</a>
                                    <a href="javascript:;" class="tag-link">Able EQ</a>
                                    <a href="javascript:;" class="tag-link">Able Glass</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-section4 mb-3">
                                <h6 class="mb-3 text-uppercase">Stay informed</h6>
                                <div class="subscribe">
                                    <input type="text" class="form-control radius-30" placeholder="Enter Your Email">
                                    <div class="mt-2 d-grid"> <a href="javascript:;"
                                            class="btn btn-white btn-ecomm radius-30">Subscribe</a>
                                    </div>
                                    <p class="mt-2 mb-0 font-13">Subscribe to our newsletter to receive early discount
                                        offers, updates and new products info.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <hr>
                    <div class="row row-cols-1 row-cols-md-2 align-items-center">
                        <div class="col">
                            <p class="mb-0">Copyright © 2024. All right reserved. Partner with <a
                                    href="https://exportersway.com" target="_blank">Exportersway</a><br>
                                Manage and Designed by <a href="https://webcrowdsolutions.com" target="_blank">Webcrowd
                                    Solution Private Limited.</a>
                            </p>
                        </div>
                        <div class="col text-end">
                            <div class="payment-icon">
                                <div class="row row-cols-auto g-2 justify-content-end">
                                    <div class="col">
                                        <img src="{{ asset('assets/images/icons/visa.png') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('assets/images/icons/paypal.png') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('assets/images/icons/mastercard.png') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('assets/images/icons/american-express.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
        </footer>
        <!--end footer section-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr>
            <p class="mb-0">Gaussian Texture</p>
            <hr>
            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>
            <hr>
            <p class="mb-0">Gradient Background</p>
            <hr>
            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
            </ul>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/price-slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/product-details.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/product-gallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/show-hide-password.js') }}"></script>
</body>

</html>