<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<link rel="canonical" href="{{ url()->current() }}" />
		<meta name="description" content="Belajar Online Tanpa Batas" />
		<meta name="keywords" content="Belajar Online Tanpa Batas"/>
		<meta property="bb:client_area" content="{{ url()->current() }}">
		<meta name="robots" content="index, follow, noodp">
		<meta property="og:url" content="{{ url()->current() }}" />
		<meta property="og:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta property="og:description" content="Belajar Online Tanpa Batas" />
		<meta property="og:image" content="{{ asset('images/simple-makaryo.png')}}" />
		<meta property="og:site_name" content="Kartunikah" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="website" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@seven_pion" />
		<meta name="twitter:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta name="twitter:description" content="Belajar Online Tanpa Batas" />
		<meta name="twitter:image" content="{{ asset('images/simple-makaryo.png')}}" />
		<meta itemprop="description" content="Belajar Online Tanpa Batas">
		<meta content="Neosia" name="author">

		<!-- Title -->
		<title>@yield('title')</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('images/simple-makaryo.png')}}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Dark css -->
		<link href="{{ asset('assets/css/dark.css')}}" rel="stylesheet" />

		<!-- Skins css -->
		<link href="{{ asset('assets/css/skins.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{ asset('assets/css/animated.css')}}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />

		<!-- Morris Charts css -->
		<link href="{{ asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" />

		<!-- Data table css -->
		<link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

		<!--Daterangepicker css-->
		<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
		
		<!-- Date Picker css -->
		<link href="{{ asset('assets/plugins/date-picker/date-picker.css')}}" rel="stylesheet" />

		@yield('head')
	</head>

	<body class="light-mode">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{ asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">

			<!-- Header-->
			@include('templates.header')
			<!-- End Header-->

			<!-- Navbar -->
			@include('templates.navbar')
			<!-- End Navbar -->


			<!--Content-->
			@yield('main')
			{{-- <div class="app-content page-body">
					<div class="container">

						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Analytics Dashboard</h4>
							</div>
							<div class="page-rightheader ml-auto d-lg-flex d-none">
								<div class="ml-5 mb-0">
									<a class="btn btn-white date-range-btn" href="#" id="daterange-btn">
										<svg class="header-icon2 mr-3" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
											<path d="M5 8h14V6H5z" opacity=".3"/><path d="M7 11h2v2H7zm12-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-4 3h2v2h-2zm-4 0h2v2h-2z"/>
										</svg> <span>Select Date
										<i class="fa fa-caret-down"></i></span>
									</a>
								</div>
							</div>
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">
							<div class="col-xl-6 col-md-12 col-lg-12">
								<div class="card bg-primary text-white">
									<div class="card-body">
										<div class="row">
											<div class="col-xl-7 col-md-12 col-lg-6">
												<div class="d-block card-header border-0 text-center px-0">
													<h3 class="text-center mb-4">Congratulations <b>John!</b></h3>
													<small>You reached Page Views</small>
												</div>
												<div class="row text-center">
													<div class="col-md-12">
														<h2 class="mb-0 fs-40 counter font-weight-bold">10M</h2>
														<h6 class="mt-4 text-white-50">You have done 100% reached target today.</h6>
													</div>
												</div>
											</div>
											<div class="col-xl-5 col-md-12 col-lg-6">
												<img class="mx-auto text-center w-90 analytics-img" src="{{ asset('assets/images/photos/award.png')}}">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div> --}}
			<!--End Content-->

			</div>

			<!--Footer-->
			@include('templates.footer')
			<!-- End Footer-->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top">
			<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
		</a>

		<!-- Jquery js-->
		<script src="{{ asset('assets/js/vendors/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{ asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Horizontal js-->
		<script src="{{ asset('assets/plugins/horizontal-menu/horizontal.js')}}"></script>

		<!--Moment js-->
		<script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>

		<!-- Daterangepicker js-->
		<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
		<script src="{{ asset('assets/js/daterange.js')}}"></script>

		<!--Chart js -->
		<script src="{{ asset('assets/plugins/chart/chart.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/chart/chart.extension.js')}}"></script>

		<!-- ECharts js-->
		<script src="{{ asset('assets/plugins/echarts/echarts.js')}}"></script>
		<script src="{{ asset('assets/js/index2.js')}}"></script>

		<!-- Custom js-->
		<script src="{{ asset('assets/js/custom.js')}}"></script>

		<!-- Datepicker js -->
		<script src="{{ asset('assets/plugins/date-picker/date-picker.js')}}"></script>
		<script src="{{ asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
		<script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

		<script src="{{ asset('assets/js/formelementadvnced.js')}}"></script>
		<script src="{{ asset('assets/js/form-elements.js')}}"></script>

		{{-- {{ asset('')}} --}}

		@yield('js')
	</body>
</html>