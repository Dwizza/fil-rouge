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
  <title>Jotea - Company Dashboard</title>
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
    
    /* Responsive improvements */
    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 998;
    }
    
    @media (max-width: 1024px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: -280px;
        height: 100%;
        width: 280px;
        z-index: 999;
        transition: left 0.3s ease;
      }
      
      .sidebar.active {
        left: 0;
      }
      
      .sidebar-overlay.active {
        display: block;
      }
      
      .main-content {
        width: 100%;
        margin-left: 0;
        transition: margin 0.3s ease;
      }
      
      .mobile-menu-toggle {
        display: block;
      }
    }
    
    @media (min-width: 1025px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 280px;
        z-index: 999;
      }
      
      .main-content {
        width: calc(100% - 280px);
        margin-left: 280px;
      }
      
      .mobile-menu-toggle {
        display: none;
      }
    }
  </style>
  @vite(['resources/js/app.js'])

</head>
<body class="bg-gray-100">
  <!-- Sidebar Overlay -->
  <div class="sidebar-overlay"></div>

  <!-- Sidebar -->
  <aside class="sidebar bg-white shadow-lg overflow-y-auto">
    <div class="p-5 border-b">
      <div class="flex justify-between items-center">
        <a href="/">
          <img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="Logo" class="h-10">
        </a>
        <button class="sidebar-close p-2 rounded-full bg-gray-100 lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <div class="p-5">
      @auth
        @php
          $user = Auth::user();
        @endphp
        
        <div class="flex items-center gap-4 mb-6 pb-4 border-b">
          <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden">
            @if($user->photo)
              <img src="{{ asset('storage/'.$user->photo) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            @else
              <div class="w-full h-full flex items-center justify-center bg-amber-100 text-amber-600 text-xl font-bold">
                {{ substr($user->name, 0, 1) }}
              </div>
            @endif
          </div>
          <div>
            <p class="font-medium">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
          </div>
        </div>
        
        <nav>
          <ul class="space-y-2">
            <li>
              <a href="{{ route('company.dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('company.dashboard') ? 'bg-amber-100 text-amber-700' : 'hover:bg-gray-100 text-gray-700' }} transition-colors duration-200">
                <i class="fa-solid fa-gauge-high"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ route('annonce.show') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('annonce.show') ? 'bg-amber-100 text-amber-700' : 'hover:bg-gray-100 text-gray-700' }} transition-colors duration-200">
                <i class="fa-solid fa-tags"></i>
                <span>Mes Annonces</span>
              </a>
            </li>
            <li>
              <a href="{{ route('addannonce') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('addannonce') ? 'bg-amber-100 text-amber-700' : 'hover:bg-gray-100 text-gray-700' }} transition-colors duration-200">
                <i class="fa-solid fa-plus"></i>
                <span>Ajouter Annonce</span>
              </a>
            </li>
            <li>
              <a href="{{ route('entreprise.conversation') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('entreprise.conversation') ? 'bg-amber-100 text-amber-700' : 'hover:bg-gray-100 text-gray-700' }} transition-colors duration-200">
                <i class="fa-solid fa-comments"></i>
                <span>Messages</span>
              </a>
            </li>
            <li>
              <a href="{{ route('company.billing') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('company.billing') ? 'bg-amber-100 text-amber-700' : 'hover:bg-gray-100 text-gray-700' }} transition-colors duration-200">
                <i class="fa-solid fa-credit-card"></i>
                <span>Facturation</span>
              </a>
            </li>
            <li>
              <a href="{{ route('company.profile') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('company.profile') ? 'bg-amber-100 text-amber-700' : 'hover:bg-gray-100 text-gray-700' }} transition-colors duration-200">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
              </a>
            </li>
            <li class="pt-6">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 p-3 w-full rounded-lg text-left hover:bg-red-50 text-red-600 transition-colors duration-200">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  <span>Déconnexion</span>
                </button>
              </form>
            </li>
          </ul>
        </nav>
      @endauth
    </div>
  </aside>

  <!-- Main Content -->
  <div class="main-content min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm">
      <div class="px-4 py-4 flex items-center justify-between">
        <button class="mobile-menu-toggle p-2 rounded-md text-gray-700 hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        
        <div class="flex items-center gap-4">
          <a href="/" class="text-sm text-gray-600 hover:text-amber-500">
            <i class="fa-solid fa-home mr-1"></i>
            <span>Retour au site</span>
          </a>
          
          <div class="relative" id="notification-dropdown">
            <button class="p-2 rounded-full hover:bg-gray-100 text-gray-600 relative">
              <i class="fa-solid fa-bell"></i>
              <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs">3</span>
            </button>
          </div>
          
          <!-- Mobile Profile -->
          <div class="relative lg:hidden" id="profile-dropdown-mobile">
            <button class="flex items-center gap-2 hover:bg-gray-100 p-1.5 rounded-full">
              <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                @if(Auth::user()->photo)
                  <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                @else
                  <div class="w-full h-full flex items-center justify-center bg-amber-100 text-amber-600 text-sm font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                  </div>
                @endif
              </div>
            </button>
          </div>
        </div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-4 md:p-6">
      @if(session('success'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
          <div class="flex items-center">
            <i class="fa-solid fa-check-circle mr-2"></i>
            <p>{{ session('success') }}</p>
          </div>
        </div>
      @endif

      @if(session('error'))
        <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
          <div class="flex items-center">
            <i class="fa-solid fa-exclamation-circle mr-2"></i>
            <p>{{ session('error') }}</p>
          </div>
        </div>
      @endif
      
      @yield('content')
    </main>
  </div>

  <!-- JavaScript for Menu Toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
      const sidebarClose = document.querySelector('.sidebar-close');
      const sidebar = document.querySelector('.sidebar');
      const sidebarOverlay = document.querySelector('.sidebar-overlay');
      
      // Show sidebar
      if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
          sidebar.classList.add('active');
          sidebarOverlay.classList.add('active');
          document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
      }
      
      // Close sidebar
      function closeSidebar() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = ''; // Re-enable scrolling
      }
      
      if (sidebarClose) {
        sidebarClose.addEventListener('click', closeSidebar);
      }
      
      if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
      }
    });
  </script>
  
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
</body>
</html>