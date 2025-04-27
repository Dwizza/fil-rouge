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
  <link rel="icon" type="image/png" href="{{ asset('assets1/images/JOTEA-logo.png') }}">
  <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  
  <!-- StyleSheet -->
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.css') }}">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="{{ asset('assets1/css/magnific-popup.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets1/css/font-awesome.css') }}">
  <!-- Fancybox -->
  <link rel="stylesheet" href="{{ asset('assets1/css/jquery.fancybox.min.css') }}">
  <!-- Themify Icons -->
  <link rel="stylesheet" href="{{ asset('assets1/css/themify-icons.css') }}">
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="{{ asset('assets1/css/niceselect.css') }}">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="{{ asset('assets1/css/animate.css') }}">
  <!-- Flex Slider CSS -->
  <link rel="stylesheet" href="{{ asset('assets1/css/flex-slider.min.css') }}">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{ asset('assets1/css/owl-carousel.css') }}">
  <!-- Slicknav -->
  <link rel="stylesheet" href="{{ asset('assets1/css/slicknav.min.css') }}">
  
  <!-- Eshop StyleSheet -->
  <link rel="stylesheet" href="{{ asset('assets1/css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/css/responsive.css') }}">

  <!-- Color CSS -->
  <link rel="stylesheet" href="{{ asset('assets1/css/color/color1.css') }}">

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
      </div>
    </div>

    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
		<div class="flex items-center gap-4">
			<a href="/">
			<img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="Logo" class="h-10">
			</a>
		</div>
		<div class="hidden md:flex w-2/3 justify-center">
			<form action="{{route('user.annoncesBy')}}" method="POST" class="flex w-full max-w-2xl bg-white rounded-full shadow-lg border border-gray-200 transition-all duration-300 hover:shadow-2xl h-12">
				@csrf
				<select name="category" class="flex justify-center items-center h-full px-5 bg-white border-r border-gray-200 text-gray-800 focus:ring-2 focus:ring-blue-300 focus:outline-none min-w-[150px] font-semibold rounded-l-full transition-colors duration-200 hover:bg-blue-50">
					<option class="" value="">All categories</option>
					@foreach ($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
		
				<input type="text" name="search" placeholder="Search Products Here..." class="h-full flex-grow px-5 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors duration-200" id="search-input">
		
				<button class="h-full bg-gradient-to-r from-amber-300 to-amber-700 hover:from-amber-400 hover:to-amber-800 px-7 text-white font-bold transition rounded-r-full border-l border-gray-200 flex items-center shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
					<i class="ti-search text-xl"></i>
					<span class="ml-2 hidden lg:inline">Search</span>
				</button>
			</form>
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
  </header>

  <main class="container mx-auto px-4 py-10">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
		<img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="Logo" class="h-24 w-40 mb-4 rounded-lg drop-shadow-[0_10px_40px_rgba(255,250,0,0.5)] "/>
        <p class="text-sm text-gray-300 leading-relaxed">JOTEA est votre plateforme de confiance pour trouver tout ce dont vous avez besoin, avec une expérience exceptionnelle et des transactions sécurisées.</p>
        <div class="mt-6 flex items-center space-x-2">
          <span class="text-amber-400 font-medium">Nous contacter:</span>
          <a href="tel:123456789" class="group">
            <span class="relative inline-block">
              <span class="bg-gradient-to-r from-amber-400 to-amber-600 text-white py-2 px-4 rounded-lg font-medium transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-lg flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>+0123 456 789</span>
              </span>
              <span class="absolute inset-0 bg-gradient-to-r from-amber-300 to-amber-500 rounded-lg blur-sm opacity-70 -z-10 transform transition-all duration-300 group-hover:blur-md group-hover:opacity-100"></span>
            </span>
          </a>
        </div>
      </div>

      <div>
        <h4 class="text-lg font-semibold mb-4 text-amber-400 border-b border-gray-700 pb-2">Informations</h4>
        <ul class="space-y-2.5">
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>À propos de nous</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>FAQ</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Conditions générales</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Nous contacter</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Aide</span>
            </a>
          </li>
        </ul>
      </div>

      <div>
        <h4 class="text-lg font-semibold mb-4 text-amber-400 border-b border-gray-700 pb-2">Service Client</h4>
        <ul class="space-y-2.5">
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Moyens de paiement</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Remboursement</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Retours</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Expédition</span>
            </a>
          </li>
          <li>
            <a href="#" class="group flex items-center text-gray-300 hover:text-amber-400 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-amber-500 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span>Politique de confidentialité</span>
            </a>
          </li>
        </ul>
      </div>

      <div>
        <h4 class="text-lg font-semibold mb-4 text-amber-400 border-b border-gray-700 pb-2">Contactez-nous</h4>
        <ul class="text-sm space-y-3">
          <li class="flex items-center space-x-2 group">
            <div class="p-2 rounded-full bg-gray-800 text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <span class="text-gray-300">NO. 342 - London Oxford Street.</span>
          </li>
          <li class="flex items-center space-x-2 group">
            <div class="p-2 rounded-full bg-gray-800 text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
            </div>
            <span class="text-gray-300">012 United Kingdom.</span>
          </li>
          <li class="flex items-center space-x-2 group">
            <div class="p-2 rounded-full bg-gray-800 text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <span class="text-gray-300">info@jotea.com</span>
          </li>
          <li class="flex items-center space-x-2 group">
            <div class="p-2 rounded-full bg-gray-800 text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <span class="text-gray-300">+032 3456 7890</span>
          </li>
        </ul>
        <div class="flex space-x-3 mt-5">
          <a href="#" class="p-2 bg-blue-700 rounded-full text-white hover:bg-blue-800 hover:scale-110 transition-all duration-300">
            <i class="ti-facebook"></i>
          </a>
          <a href="#" class="p-2 bg-sky-500 rounded-full text-white hover:bg-sky-600 hover:scale-110 transition-all duration-300">
            <i class="ti-twitter"></i>
          </a>
          <a href="#" class="p-2 bg-pink-600 rounded-full text-white hover:bg-pink-700 hover:scale-110 transition-all duration-300">
            <i class="ti-instagram"></i>
          </a>
          <a href="#" class="p-2 bg-red-600 rounded-full text-white hover:bg-red-700 hover:scale-110 transition-all duration-300">
            <i class="ti-youtube"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="bg-gray-800 py-4">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-sm text-gray-400 mb-4 md:mb-0">Copyright © 2025 <a href="#" class="text-amber-400 hover:text-amber-300 transition-colors">JOTEA</a> - Tous droits réservés.</p>
          <div class="flex items-center space-x-4">
            <a href="#" class="text-sm text-gray-400 hover:text-amber-400 transition-colors">Mentions légales</a>
            <span class="text-gray-600">|</span>
            <a href="#" class="text-sm text-gray-400 hover:text-amber-400 transition-colors">Confidentialité</a>
            <span class="text-gray-600">|</span>
            <a href="#" class="text-sm text-gray-400 hover:text-amber-400 transition-colors">Plan du site</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
<!-- Jquery -->
<script src="{{ asset('assets1/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets1/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('assets1/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets1/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('assets1/js/colors.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('assets1/js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets1/js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets1/js/magnific-popup.js') }}"></script>
<!-- Fancybox JS -->
<script src="{{ asset('assets1/js/facnybox.min.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('assets1/js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('assets1/js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets1/js/nicesellect.js') }}"></script>
<!-- Ytplayer JS -->
<script src="{{ asset('assets1/js/ytplayer.min.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('assets1/js/flex-slider.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('assets1/js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('assets1/js/onepage-nav.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('assets1/js/easing.js') }}"></script>
<!-- Active JS -->
<script src="{{ asset('assets1/js/active.js') }}"></script>
</html>