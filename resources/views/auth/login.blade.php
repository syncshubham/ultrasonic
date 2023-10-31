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
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pace.min.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}" media="all" />
</head>

<body class="bg-theme bg-theme2"> <b class="screen-overlay"></b>

<!-- In page styling, in future it should be settled to main style sheets order wise. -->
<style>
	.font-medium{
		color: white;
		font-weight: bold;
	}

	.list-inside li{
		color: #ffcccc;
		font-weight: bold;
	}
</style>
	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start shop cart-->
				<section class="">
					<div class="container">
						<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
							<div class="row row-cols-1 row-cols-xl-2">
								<div class="col mx-auto">
									<div class="card">
										<div class="card-body">
											<div class="border p-4 rounded">
												<div class="text-center">
													<h3 class="">Sign in</h3>
													<p>Don't have an account yet? <a href="{{route('register')}}">Sign up here</a>
													</p>
												</div>
												<div class="d-grid">
													<a class="btn my-4 shadow-sm btn-light" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
															<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
															<span>Sign in with Google</span>
														</span>
													</a> <a href="javascript:;" class="btn btn-light"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
												</div>
												<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
													<hr>
												</div>
												<x-validation-errors />

												<div class="form-body">
													@if (session('status'))
													<div class="mb-4 font-medium text-sm text-green-600">
														{{ session('status') }}
													</div>
													@endif
													<form method="POST" action="{{ route('login') }}" class="row g-3">
														@csrf

														<div class="col-12">
															<label for="inputEmailAddress" class="form-label">Email Address</label>
															<input type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
														</div>
														<div class="col-12">
															<label for="inputChoosePassword" class="form-label">Enter Password</label>
															<div class="input-group" id="show_hide_password">
																<input type="password" name="password" required autocomplete="current-password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password">

																<a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-check form-switch">
																<input class="form-check-input" name="remember" type="checkbox" id="flexSwitchCheckChecked" checked="">
																<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
															</div>
														</div>
														<div class="col-md-6 text-end">
															@if (Route::has('password.request'))
															<a href="{{ route('password.request') }}">Forgot Your Password ?</a>
															@endif

														</div>
														<div class="col-12">
															<div class="d-grid">
																<button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
															</div>
														</div>
                                                        <center>
                                                        <p>Don't have an account yet? <a href="{{route('register')}}">Sign up here</a>
													</p>
                                                        </center>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end shop cart-->
			</div>
		</div>
		<!--end page wrapper -->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->

	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/index.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/price-slider.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/product-details.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/product-gallery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/show-hide-password.js') }}"></script>

</body>