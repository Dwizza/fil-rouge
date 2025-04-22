<!DOCTYPE html>
<html lang="zxx">
<head>
  <!-- Meta Tag -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='copyright' content=''>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="user-id" content="{{ auth()->id() }}">
  

  <!-- Title Tag  -->
  <title>Jotea</title>
  <!-- Favicon -->
  <link rel="icon" type="assets1/image/png" href="assets1/images/JOTEA-logo.png">
  <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  
  <!-- StyleSheet -->
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets1/css/bootstrap.css">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="assets1/css/magnific-popup.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets1/css/font-awesome.css">
  <!-- Fancybox -->
  <link rel="stylesheet" href="assets1/css/jquery.fancybox.min.css">
  <!-- Themify Icons -->
  <link rel="stylesheet" href="assets1/css/themify-icons.css">
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="assets1/css/niceselect.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="assets1/css/animate.css">
  <!-- Flex Slider CSS -->
  <link rel="stylesheet" href="assets1/css/flex-slider.min.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="assets1/css/owl-carousel.css">
  <!-- Slicknav -->
  <link rel="stylesheet" href="assets1/css/slicknav.min.css">
  
  <!-- Eshop StyleSheet -->
  <link rel="stylesheet" href="assets1/css/reset.css">
  <link rel="stylesheet" href="assets1/css/style.css">
  <link rel="stylesheet" href="assets1/css/responsive.css">

  <!-- Color CSS -->
  <link rel="stylesheet" href="assets1/css/color/color1.css">

  <link rel="stylesheet" href="#" id="colors">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- font-awesome --}}
  <script src="https://kit.fontawesome.com/e9ee48a8e3.js" crossorigin="anonymous"></script>

  {{-- cdn pusher --}}
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  {{-- cdn jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
  @vite(['resources/js/app.js'])

</head>
<body class="bg-white">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

  <!-- Header -->
  <header class="shadow">
    <div class="bg-gray-100 py-2 text-sm">
      <div class="container mx-auto px-4 flex justify-between">
        <div>
          <span class="text-gray-600"><i class="ti-email"></i>support@jotea.com</span>
        </div>
        <div>
			@auth
				@php
					$user = Auth::user();
				@endphp

				@if($user && $user->role && $user->role->name === 'admin')
					<div class="flex gap-4 items-center">
						<a href="/admin" class="text-gray-600 hover:text-blue-500"><i class="ti-power-off"></i> Dashboard</a>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button type="submit" class="flex items-center gap-2 px-4 py-1 rounded-full bg-red-100 hover:bg-red-200 text-red-600 font-semibold transition-colors duration-200 shadow-sm border border-red-200 focus:outline-none focus:ring-2 focus:ring-red-400">
								<i class="fa-solid fa-right-from-bracket text-base"></i>
								<span>Logout</span>
							</button>
						</form>
					</div>

				@elseif($user && $user->role && $user->role->name === 'company')
					<div class="flex gap-4 items-center">
						<a href="/company" class="text-gray-600 hover:text-blue-500"><i class="ti-power-off"></i> Dashboard</a>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button type="submit" class="flex items-center gap-2 px-4 py-1 rounded-full bg-red-100 hover:bg-red-200 text-red-600 font-semibold transition-colors duration-200 shadow-sm border border-red-200 focus:outline-none focus:ring-2 focus:ring-red-400">
								<i class="fa-solid fa-right-from-bracket text-base"></i>
								<span>Logout</span>
							</button>
						</form>
					</div>
				@elseif($user && $user->role && $user->role->name === 'particuler')
					<div class="flex gap-4 items-center">
						<a href="/user/dashboard" class="text-gray-600 hover:text-blue-500"><i class="ti-power-off"></i> Your Account</a>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button type="submit" class="flex items-center gap-2 px-4 py-1 rounded-full bg-red-100 hover:bg-red-200 text-red-600 font-semibold transition-colors duration-200 shadow-sm border border-red-200 focus:outline-none focus:ring-2 focus:ring-red-400">
								<i class="fa-solid fa-right-from-bracket text-base"></i>
								<span>Logout</span>
							</button>
						</form>
					</div>
				@endif
			@else
				<div class="flex gap-4 items-center">
					<a href="/login" class="text-gray-600 hover:text-blue-500"><i class="ti-power-off"></i> Login</a>
					<a href="/register" class="text-gray-600 hover:text-blue-500"><i class="ti-power-off"></i> Register</a>
				</div>
			@endauth

        </div>
      </div>
    </div>

    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
		<div class="flex items-center gap-4">
			<a href="/">
			<img src="assets1/images/JOTEA-logo.png" alt="Logo" class="h-10">
			</a>
		</div>
		<div class="hidden md:flex w-2/3 justify-center">
		<form class="flex w-full max-w-2xl bg-white rounded-full shadow-lg border border-gray-200 transition-all duration-300 hover:shadow-2xl h-12">
			<select name="category" class="h-full px-5 bg-white border-r border-gray-200 text-gray-800 focus:ring-2 focus:ring-blue-300 focus:outline-none min-w-[150px] font-semibold rounded-l-full transition-colors duration-200 hover:bg-blue-50">
				<option value="">All categories</option>
				{{-- @foreach ($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach --}}
			</select>
	
			<input type="text" name="search" placeholder="Search Products Here..." class="h-full flex-grow px-5 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors duration-200" id="search-input">
	
			<button class="h-full bg-gradient-to-r from-amber-300 to-amber-700 hover:from-amber-400 hover:to-amber-800 px-7 text-white font-bold transition rounded-r-full border-l border-gray-200 flex items-center shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
				<i class="ti-search text-xl"></i>
				<span class="ml-2 hidden lg:inline">Search</span>
			</button>
		</form>
		</div>
		<div class="flex items-center space-x-4">
			<a href="#" class="text-gray-700"><i class="fa fa-heart-o"></i></a>
			<a href="#" class="text-gray-700"><i class="fa fa-user-circle-o"></i></a>
		</div>
    </div>
    <nav class="bg-gray-50 shadow-sm">
      <div class="container mx-auto px-4">
        <ul class="flex space-x-6 py-3 text-gray-700">
          <li><a href="/" class="hover:text-blue-500">Home</a></li>
          <li><a href="/voiture" class="hover:text-blue-500">Cars</a></li>
          <li><a href="/electroniques" class="hover:text-blue-500">Electronics</a></li>
          <li><a href="/emploi" class="hover:text-blue-500">Jobs <span class="text-xs text-red-500">New</span></a></li>
          <li><a href="/contact" class="hover:text-blue-500">Contact Us</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="container mx-auto px-4 py-10">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
		<img src="assets1/images/JOTEA-logo.png" alt="Logo" class="h-24 w-40 mb-4 rounded-lg drop-shadow-[0_10px_40px_rgba(255,250,0,0.5)] "/>
        <p class="text-sm">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat.</p>
        <p class="mt-4">Call us 24/7: <a href="tel:123456789" class="text-amber-500">+0123 456 789</a></p>
      </div>

      <div>
        <h4 class="font-semibold mb-3">Information</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-blue-400">About Us</a></li>
          <li><a href="#" class="hover:text-blue-400">Faq</a></li>
          <li><a href="#" class="hover:text-blue-400">Terms & Conditions</a></li>
          <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
          <li><a href="#" class="hover:text-blue-400">Help</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-semibold mb-3">Customer Service</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-blue-400">Payment Methods</a></li>
          <li><a href="#" class="hover:text-blue-400">Money-back</a></li>
          <li><a href="#" class="hover:text-blue-400">Returns</a></li>
          <li><a href="#" class="hover:text-blue-400">Shipping</a></li>
          <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-semibold mb-3">Get In Touch</h4>
        <ul class="text-sm space-y-2">
          <li>NO. 342 - London Oxford Street.</li>
          <li>012 United Kingdom.</li>
          <li>info@jotea.com</li>
          <li>+032 3456 7890</li>
        </ul>
        <div class="flex space-x-3 mt-4">
          <a href="#" class="text-white hover:text-blue-400"><i class="ti-facebook"></i></a>
          <a href="#" class="text-white hover:text-blue-400"><i class="ti-twitter"></i></a>
          <a href="#" class="text-white hover:text-blue-400"><i class="ti-flickr"></i></a>
          <a href="#" class="text-white hover:text-blue-400"><i class="ti-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="bg-gray-800 py-4 text-sm text-center">
      <div class="container mx-auto px-4">
        <p>Copyright © 2025 <a href="#" class="text-blue-400">JOTEA</a> - All Rights Reserved.</p>
      </div>
    </div>
  </footer>
</body>
<!-- Jquery -->
<script src="assets1/js/jquery.min.js"></script>
<script src="assets1/js/jquery-migrate-3.0.0.js"></script>
<script src="assets1/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="assets1/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets1/js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="assets1/js/colors.js"></script>
<!-- Slicknav JS -->
<script src="assets1/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="assets1/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="assets1/js/magnific-popup.js"></script>
<!-- Fancybox JS -->
<script src="assets1/js/facnybox.min.js"></script>
<!-- Waypoints JS -->
<script src="assets1/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="assets1/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="assets1/js/nicesellect.js"></script>
<!-- Ytplayer JS -->
<script src="assets1/js/ytplayer.min.js"></script>
<!-- Flex Slider JS -->
<script src="assets1/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="assets1/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="assets1/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="assets1/js/easing.js"></script>
<!-- Active JS -->
<script src="assets1/js/active.js"></script>
</html>



{{-- <!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="assets1/image/png" href="assets1/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="assets1/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="assets1/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="assets1/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="assets1/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="assets1/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets1/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="assets1/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="assets1/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="assets1/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="assets1/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="assets1/css/reset.css">
	<link rel="stylesheet" href="assets1/css/style.css">
    <link rel="stylesheet" href="assets1/css/responsive.css">

	<!-- Color CSS -->
	<link rel="stylesheet" href="assets1/css/color/color1.css">
	<!--<link rel="stylesheet" href="assets1/css/color/color2.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color3.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color4.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color5.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color6.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color7.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color8.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color9.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color10.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color11.css">-->
	<!--<link rel="stylesheet" href="assets1/css/color/color12.css">-->

	<link rel="stylesheet" href="#" id="colors">
	<!-- Tailwind CSS -->
	<script src="https://cdn.tailwindcss.com"></script>
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	<!-- Header -->
	<header class="header shop v2">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-email"></i> support@jotea.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						
						@if (Auth::user()->role->name == 'admin')
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-power-off"></i><a href="/admin">Dashboard</a></li>
							</ul>
						</div>
						@elseif(Auth::user()->role->name == 'company')
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-power-off"></i><a href="/company">Dashboard</a></li>
							</ul>
						</div>
						@elseif(Auth::user()->role->name == 'particuler')
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-power-off"></i><a href="/user">Your Annonces</a></li>
							</ul>
						</div>
						@endif
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="assets1/images/JOTEA-logo.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">All Category</option>
									<option>watch</option>
									<option>mobile</option>
									<option>kid’s item</option>
								</select>
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>2 Items</span>
										<a href="#">View Cart</a>
									</div>
									<ul class="shopping-list">
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Ring</a></h4>
											<p class="quantity">1x - <span class="amount">$99.00</span></p>
										</li>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Necklace</a></h4>
											<p class="quantity">1x - <span class="amount">$35.00</span></p>
										</li>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">$134.00</span>
										</div>
										<a href="checkout.html" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li class="active"><a href="#">Home</a>
												</li>
												<li><a href="#">Voitures</a></li>												
												<li><a href="#">Electroniques</a></li>
												<li><a href="#">Emploi<span class="new">New</span></a>
												</li>
												<li><a href="contact.html">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

    @yield('content')


<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="index.html"><img src="assets1/images/logo2.png" alt="#"></a>
                        </div>
                        <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
                        <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Customer Service</h4>
                        <ul>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Get In Tuch</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li>NO. 342 - London Oxford Street.</li>
                                <li>012 United Kingdom.</li>
                                <li>info@eshop.com</li>
                                <li>+032 3456 7890</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <ul>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-flickr"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="assets1/images/payments.png" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->


</body>
</html> --}}