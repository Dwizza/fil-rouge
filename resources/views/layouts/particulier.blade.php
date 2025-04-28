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
   /* Update these CSS media queries */
@media (max-width: 768px) {
  .mobile-menu-toggle {
    display: block !important;
  }
  .desktop-menu {
    display: none;
  }
}

/* Specific styles for tablet/laptop range */
@media (min-width: 769px) and (max-width: 1199px) {
  .mobile-menu-toggle {
    display: block !important;
  }
  .desktop-menu {
    display: none;
  }
}

@media (min-width: 1200px) {
  .mobile-menu-toggle {
    display: none !important;
  }
  .desktop-menu {
    display: block;
  }
}

/* Make sure mobile menu is properly styled for all screen sizes below 1200px */
.mobile-menu {
  position: fixed;
  top: 0;
  left: -100%;
  width: 80%;
  max-width: 350px; /* Limit maximum width */
  height: 100%;
  background-color: white;
  z-index: 9999;
  overflow-y: auto;
  transition: left 0.3s ease;
  box-shadow: 0 0 15px rgba(0,0,0,0.2);
  padding: 1rem;
}

.mobile-menu.active {
  left: 0;
}
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

    <div class="container mx-auto px-4 py-4 flex flex-wrap items-center justify-between">
		<!-- Logo -->
		<div class="flex items-center gap-4">
			<a href="/">
			<img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="Logo" class="h-10">
			</a>
		</div>
		
		<!-- Mobile Menu Toggle -->
		<button class="mobile-menu-toggle hidden md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100">
		  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
		  </svg>
		</button>
		
		<!-- Search Bar - Desktop -->
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
		
		<!-- Auth Links - Desktop -->
		<div class="hidden md:block">
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
    
    <!-- Mobile Search Bar -->
    <div class="md:hidden px-4 pb-4">
      <form action="{{route('user.annoncesBy')}}" method="POST" class="flex flex-col w-full bg-white rounded-lg shadow-md border border-gray-200">
        @csrf
        <select name="category" class="w-full px-4 py-2 bg-white border-b border-gray-200 text-gray-800 focus:ring-2 focus:ring-blue-300 focus:outline-none font-medium">
          <option value="">All categories</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        
        <div class="flex w-full">
          <input type="text" name="search" placeholder="Search Products Here..." class="flex-grow px-4 py-2 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
          
          <button class="bg-gradient-to-r from-amber-300 to-amber-700 hover:from-amber-400 hover:to-amber-800 px-4 py-2 text-white font-bold flex items-center justify-center">
            <i class="ti-search text-xl"></i>
          </button>
        </div>
      </form>
    </div>
  </header>
  
  <!-- Mobile Menu -->
  <div class="mobile-menu-overlay"></div>
  <div class="mobile-menu">
    <div class="flex justify-between items-center mb-4 pb-2 border-b">
      <a href="/">
        <img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="Logo" class="h-10">
      </a>
      <button class="mobile-menu-close p-2 rounded-full bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    
    @auth
      @php
        $user = Auth::user();
      @endphp
      
      <div class="flex items-center gap-4 mb-4 pb-4 border-b">
        <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden">
          @if($user->photo)
            <img src="{{ asset('storage/'.$user->photo) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
          @else
            <div class="w-full h-full flex items-center justify-center text-gray-500 text-xl">
              {{ substr($user->name, 0, 1) }}
            </div>
          @endif
        </div>
        <div>
          <p class="font-medium">{{ $user->name }}</p>
          <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>
      </div>
      
      <!-- Mobile Menu Items -->
      <div class="flex flex-col space-y-2">
        @if($user->role && $user->role->name === 'admin')
          <a href="/admin" class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
            <i class="fa-solid fa-gauge"></i>
            <span>Admin Dashboard</span>
          </a>
        @elseif($user->role && $user->role->name === 'company')
          <a href="/company" class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
            <i class="fa-solid fa-gauge"></i>
            <span>Company Dashboard</span>
          </a>
        @elseif($user->role && $user->role->name === 'particuler')
          <a href="/user/dashboard" class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
            <i class="fa-solid fa-user"></i>
            <span>Your Account</span>
          </a>
        @endif
        
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full flex items-center gap-2 p-3 bg-red-50 rounded-lg hover:bg-red-100 text-red-600">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </button>
        </form>
      </div>
    @else
      <div class="flex flex-col space-y-2">
        <a href="/login" class="flex items-center gap-2 p-3 bg-blue-50 rounded-lg hover:bg-blue-100">
          <i class="fa-solid fa-right-to-bracket"></i>
          <span>Login</span>
        </a>
        <a href="/register" class="flex items-center gap-2 p-3 bg-amber-50 rounded-lg hover:bg-amber-100">
          <i class="fa-solid fa-user-plus"></i>
          <span>Register</span>
        </a>
      </div>
    @endauth
    
    <div class="mt-6 pt-4 border-t">
      <h3 class="font-semibold text-gray-700 mb-2">Categories</h3>
      <ul class="space-y-1">
        @foreach($categories as $category)
          <li>
            <form action="{{route('user.annoncesBy')}}" method="POST" class="w-full">
              @csrf
              <input type="hidden" name="category" value="{{$category->id}}">
              <button type="submit" class="w-full text-left p-2 rounded hover:bg-gray-100 flex items-center justify-between">
                <span>{{ $category->name }}</span>
                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
              </button>
            </form>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <main class="container mx-auto px-4 py-10">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
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

      <div class="hidden md:block">
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

      <div class="hidden md:block">
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

  <!-- JavaScript for Mobile Menu -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  const mobileMenuClose = document.querySelector('.mobile-menu-close');
  const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
  
  // Adjusted function to handle medium screens properly
  function shouldShowMobileMenu() {
    return window.innerWidth < 1200;
  }
  
  // Show mobile menu
  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', function() {
      // Remove the small screen check to allow menu to show on tablets/laptops too
      mobileMenu.classList.add('active');
      mobileMenuOverlay.classList.add('active');
      document.body.style.overflow = 'hidden'; // Prevent scrolling
    });
  }
  
  // Close mobile menu
  function closeMenu() {
    mobileMenu.classList.remove('active');
    mobileMenuOverlay.classList.remove('active');
    document.body.style.overflow = ''; // Re-enable scrolling
  }
  
  // Initial setup
  function adjustMenuVisibility() {
    if (!shouldShowMobileMenu()) {
      closeMenu();
      mobileMenuToggle.style.display = 'none';
    } else {
      mobileMenuToggle.style.display = 'block';
    }
  }
  
  // Call on page load and resize
  adjustMenuVisibility();
  window.addEventListener('resize', adjustMenuVisibility);
  
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', closeMenu);
  }
  
  if (mobileMenuOverlay) {
    mobileMenuOverlay.addEventListener('click', closeMenu);
  }
});
  </script>
</body>
<!-- Jquery -->
<script src="{{ asset('assets1/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets1/js/jquery-migrate-3.0.0.js') }}" defer></script>
<script src="{{ asset('assets1/js/jquery-ui.min.js') }}" defer></script>
<!-- Popper JS -->
<script src="{{ asset('assets1/js/popper.min.js') }}" defer></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets1/js/bootstrap.min.js') }}" defer></script>
<!-- Color JS -->
<script src="{{ asset('assets1/js/colors.js') }}" defer></script>
<!-- Slicknav JS -->
<script src="{{ asset('assets1/js/slicknav.min.js') }}" defer></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets1/js/owl-carousel.js') }}" defer></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets1/js/magnific-popup.js') }}" defer></script>
<!-- Fancybox JS -->
<script src="{{ asset('assets1/js/facnybox.min.js') }}" defer></script>
<!-- Waypoints JS -->
<script src="{{ asset('assets1/js/waypoints.min.js') }}" defer></script>
<!-- Countdown JS -->
<script src="{{ asset('assets1/js/finalcountdown.min.js') }}" defer></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets1/js/nicesellect.js') }}" defer></script>
<!-- Ytplayer JS -->
<script src="{{ asset('assets1/js/ytplayer.min.js') }}" defer></script>
<!-- Flex Slider JS -->
<script src="{{ asset('assets1/js/flex-slider.js') }}" defer></script>
<!-- ScrollUp JS -->
<script src="{{ asset('assets1/js/scrollup.js') }}" defer></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('assets1/js/onepage-nav.min.js') }}" defer></script>
<!-- Easing JS -->
<script src="{{ asset('assets1/js/easing.js') }}" defer></script>
<!-- Active JS -->
<script src="{{ asset('assets1/js/active.js') }}" defer></script>
</html>