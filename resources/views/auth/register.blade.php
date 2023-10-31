<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
	<!--plugins-->
	<link href="assets/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
	<link href="assets/plugins/nouislider/nouislider.min.css" rel="stylesheet">
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet">
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>eTrans - eCommerce HTML Template</title>
</head>
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
<body class="bg-theme bg-theme2">	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		<!--start top header wrapper-->
		
		<!--end top header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start shop cart-->
				<section class="py-0 py-lg-5">
					<div class="container">
						<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
							<div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
								<div  class="col mx-auto">
									<div class="card mb-0">
										<div class="card-body">
											<div class="border p-4 rounded">
												<div class="text-center">
													<h3 class="">Sign Up</h3>
													<p>Already have an account? <a href="{{route('login')}}">Sign in here</a>
													</p>
												</div>
												<div class="d-grid">
													<a class="btn my-4 shadow-sm btn-light" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
									  <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
									  <span>Sign Up with Google</span>
														</span>
													</a> <a href="javascript:;" class="btn btn-light"><i class="bx bxl-facebook"></i>Sign Up with Facebook</a>
												</div>
												<div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
													<hr>
												</div>
                                                <x-validation-errors class="mb-4" />
												<div class="form-body">
													<form method="POST" action="{{ route('register') }}" class="row g-3">
                                                        @csrf
														<div class="col-sm-6">
															<label for="inputFirstName" class="form-label">First Name</label>
															<input type="text" class="form-control" id="inputFirstName" value="{{old('name')}}" placeholder="Enter first name" name="name">
														</div>
														<div class="col-sm-6">
															<label for="inputLastName" class="form-label">Last Name</label>
															<input type="text" name="last_name"  placeholder="Enter Last name" class="form-control" value="{{old('last_name')}}" id="inputLastName">
														</div>
														<div class="col-12">
															<label for="inputEmailAddress" class="form-label">Email Address</label>
															<input type="email" name="email" class="form-control" id="inputEmailAddress" value="{{old('email')}}" placeholder="example@user.com">
														</div>
                                                        <div class="col-12">
															<label for="inputEmailAddress" class="form-label">Phone number</label>
															<input type="number" placeholder="9090XXXXXXX" value="{{old('number')}}" name="number" class="form-control">
														</div>
														<div class="col-12">
															<label for="inputChoosePassword" class="form-label">Password</label>
															<div class="input-group" id="show_hide_password">
																<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" value="{{old('password')}}" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
															</div>
														</div>
                                                        <div class="col-12">
															<label for="inputChoosePassword" class="form-label">Confirm Password</label>
															<div class="input-group" id="show_hide_password">
																<input type="password" class="form-control border-end-0" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
															</div>
														</div>
														<div class="col-12">
															<label for="inputSelectCountry" class="form-label">Country</label>
															<select name="country" class="form-select" id="inputSelectCountry" aria-label="Default select example">
																<option @if(old('country') === 'india') selected @endif value="india" selected="">India</option>
																<option @if(old('country') === 'japan') selected @endif value="japan">Japan</option>
																<option @if(old('country') === 'china') selected @endif value="china">China</option>
																<option @if(old('country') === 'uk') selected @endif value="uk">United Kingdom</option>
																<option @if(old('country') === 'usa') selected @endif value="usa">USA</option>
																<option @if(old('country') === 'australia') selected @endif value="australia">Australia</option>
																<option @if(old('country') === 'dubai') selected @endif value="dubai">Dubai</option>
															</select>
														</div>
														<!-- <div class="col-12">
															<div class="form-check form-switch">
																<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
																<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
															</div>
														</div> -->
														<div class="col-12">
															<div class="d-grid">
																<button type="submit" class="btn btn-light"><i class='bx bx-user'></i>Sign up</button>
															</div>
														</div>
                                                        <br>
                                                        <center>
                                                        <p>Already have an account? <a href="{{route('login')}}">Sign in here</a>
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
		
	</div>

    <!-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif -->

	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<!--Password show & hide js -->
	<script src="assets/js/show-hide-password.js"></script>
</body>

</html>