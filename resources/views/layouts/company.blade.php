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
    body { 
      font-family: 'Poppins', sans-serif;
      background-color: #121212;
      color: #e0e0e0;
    }
    
    /* Responsive improvements */
    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.7);
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
        box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
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
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
      }
      
      .main-content {
        width: calc(100% - 280px);
        margin-left: 280px;
      }
      
      .mobile-menu-toggle {
        display: none;
      }
    }

    /* Dark mode specific styles */
    .dark-card {
      background-color: #1e1e1e;
      border: 1px solid #333;
    }
    
    .dark-header {
      background-color: #1a1a1a;
      border-bottom: 1px solid #333;
    }
    
    .dark-input {
      background-color: #2a2a2a;
      border: 1px solid #444;
      color: #e0e0e0;
    }
    
    .dark-input:focus {
      background-color: #333;
      border-color: #555;
    }
    
    .dark-text {
      color: #e0e0e0;
    }
    
    .dark-text-muted {
      color: #aaa;
    }
    
    .dark-border {
      border-color: #444;
    }

    /* Enhanced sidebar styling */
    .sidebar {
      background: linear-gradient(135deg, #1a1a1a 0%, #121212 100%);
      border-right: 1px solid #333;
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: rgba(255, 191, 0, 0.5) #121212;
    }

    .sidebar::-webkit-scrollbar {
      width: 5px;
    }
    
    .sidebar::-webkit-scrollbar-track {
      background: #121212;
    }
    
    .sidebar::-webkit-scrollbar-thumb {
      background-color: rgba(255, 191, 0, 0.5);
      border-radius: 10px;
    }

    .nav-item {
      position: relative;
      margin-bottom: 5px;
    }

    .nav-link {
      position: relative;
      display: flex;
      align-items: center;
      padding: 12px 15px;
      border-radius: 8px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .nav-link:hover {
      background-color: rgba(255, 191, 0, 0.1);
    }

    .nav-link i {
      min-width: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      font-size: 1.1rem;
      transition: all 0.3s ease;
    }

    .nav-link.active {
      background: linear-gradient(135deg, #c98800 0%, #ffbf00 100%);
      color: #121212;
      box-shadow: 0 4px 10px rgba(255, 191, 0, 0.3);
    }

    .nav-link.active i {
      color: #121212;
    }

    .nav-item:hover i {
      transform: translateX(3px);
    }
    
    .sidebar-logo {
      padding: 20px 25px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      flex-shrink: 0;
    }

    .sidebar-logo img {
      height: 36px;
      transition: transform 0.3s ease;
    }

    .sidebar-logo:hover img {
      transform: scale(1.05);
    }

    .sidebar-content {
      flex: 1;
      overflow-y: auto;
    }

    .user-profile {
      padding: 20px 15px;
      margin-bottom: 15px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .user-avatar {
      position: relative;
      display: inline-block;
      margin-bottom: 10px;
    }

    .user-avatar img,
    .user-avatar .avatar-placeholder {
      width: 70px;
      height: 70px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      border: 2px solid rgba(255, 191, 0, 0.3);
      transition: all 0.3s ease;
    }

    .user-avatar:hover img,
    .user-avatar:hover .avatar-placeholder {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
      border-color: rgba(255, 191, 0, 0.6);
    }

    .avatar-placeholder {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      font-weight: 600;
      background: linear-gradient(135deg, #c98800 0%, #ffbf00 100%);
      color: #121212;
    }

    .user-info {
      padding: 0 5px;
    }

    .user-name {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 2px;
      color: #e8e8e8;
    }

    .user-email {
      font-size: 13px;
      opacity: 0.7;
      color: #d0d0d0;
      word-break: break-all;
    }

    .sidebar-divider {
      height: 1px;
      background: linear-gradient(to right, rgba(255, 255, 255, 0.03), rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.03));
      margin: 15px 0;
    }

    .nav-section {
      padding: 0 15px;
      margin-bottom: 20px;
    }

    .nav-section-title {
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: #777;
      margin-bottom: 15px;
      padding-left: 10px;
    }

    .logout-btn {
      background: rgba(220, 53, 69, 0.1);
      color: #dc3545;
      border: 1px solid rgba(220, 53, 69, 0.2);
      transition: all 0.3s ease;
      cursor: pointer;
      width: 100%;
      text-align: left;
      display: flex;
      align-items: center;
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .logout-btn:hover {
      background: rgba(220, 53, 69, 0.2);
      border-color: rgba(220, 53, 69, 0.3);
    }
    
    .logout-btn i {
      min-width: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      font-size: 1.1rem;
    }
  </style>
  @vite(['resources/js/app.js'])

</head>
<body class="bg-gray-900">
  <!-- Sidebar Overlay -->
  <div class="sidebar-overlay"></div>

  <!-- Sidebar -->
  <aside class="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
      <a href="/" class="flex items-center">
        <img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="Logo" class="h-9">
      </a>
      <button class="sidebar-close absolute top-5 right-5 p-2 rounded-full bg-gray-700/50 text-gray-300 lg:hidden hover:bg-gray-600 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Sidebar Content -->
    <div class="sidebar-content">
      <!-- User Profile -->
      @auth
        @php
          $user = Auth::user();
        @endphp
        
        <div class="px-4 mt-2">
          <div class="user-profile">
            <div class="flex flex-col items-center">
              <div class="user-avatar">
                @if($user->photo)
                  <img src="{{ asset('storage/'.$user->photo) }}" alt="{{ $user->name }}" class="rounded-xl">
                @else
                  <div class="avatar-placeholder rounded-xl">
                    {{ substr($user->name, 0, 1) }}
                  </div>
                @endif
              </div>
              
              <div class="user-info text-center">
                <p class="user-name">{{ $user->name }}</p>
                <p class="user-email">{{ $user->email }}</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="sidebar-divider"></div>
        
        <!-- Navigation Menu -->
        <div class="nav-section">
          <h3 class="nav-section-title">Menu Principal</h3>
          
          <nav class="mt-2">
            <ul class="space-y-1">
              <li class="nav-item">
                <a href="{{ route('company.dashboard') }}" class="nav-link {{ request()->routeIs('company.dashboard') ? 'active' : '' }}">
                  <i class="fa-solid fa-gauge-high"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('annonce.show') }}" class="nav-link {{ request()->routeIs('annonce.show') ? 'active' : '' }}">
                  <i class="fa-solid fa-tags"></i>
                  <span>Mes Annonces</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('addannonce') }}" class="nav-link {{ request()->routeIs('addannonce') ? 'active' : '' }}">
                  <i class="fa-solid fa-plus"></i>
                  <span>Ajouter Annonce</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('entreprise.conversation') }}" class="nav-link {{ request()->routeIs('entreprise.conversation') ? 'active' : '' }}">
                  <i class="fa-solid fa-comments"></i>
                  <span>Messages</span>
                  <span class="ml-auto bg-amber-500 text-xs font-medium px-2 py-0.5 rounded-full text-gray-900">12</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        
        <div class="sidebar-divider"></div>
        
        <div class="nav-section">
          <h3 class="nav-section-title">Paramètres</h3>
          
          <nav class="mt-2">
            <ul class="space-y-1">
              <li class="nav-item">
                <a href="{{ route('company.billing') }}" class="nav-link {{ request()->routeIs('company.billing') ? 'active' : '' }}">
                  <i class="fa-solid fa-credit-card"></i>
                  <span>Facturation</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('company.profile') }}" class="nav-link {{ request()->routeIs('company.profile') ? 'active' : '' }}">
                  <i class="fa-solid fa-user"></i>
                  <span>Profil</span>
                </a>
              </li>
            </ul>
          </nav>
          
          <form method="POST" action="{{ route('logout') }}" class="px-0 mt-6">
            @csrf
            <button type="submit" class="logout-btn">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span>Déconnexion</span>
            </button>
          </form>
        </div>
      @endauth
    </div>
  </aside>

  <!-- Main Content -->
  <div class="main-content min-h-screen bg-gray-900">
    <!-- Header -->
    <header class="dark-header shadow-md bg-gray-800">
      <div class="px-4 py-4 flex items-center justify-between">
        <button class="mobile-menu-toggle p-2 rounded-md text-gray-300 hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        
        <div class="flex items-center gap-4">
          <a href="/" class="text-sm text-gray-300 hover:text-amber-400 transition-colors">
            <i class="fa-solid fa-home mr-1"></i>
            <span>Retour au site</span>
          </a>
          
          <div class="relative" id="notification-dropdown">
            <button class="p-2 rounded-full hover:bg-gray-700 text-gray-300 relative transition-colors">
              <i class="fa-solid fa-bell"></i>
              <span class="absolute -top-1 -right-1 bg-amber-500 text-gray-900 rounded-full w-4 h-4 flex items-center justify-center text-xs">3</span>
            </button>
          </div>
          
          <!-- Mobile Profile -->
          <div class="relative lg:hidden" id="profile-dropdown-mobile">
            <button class="flex items-center gap-2 hover:bg-gray-700 p-1.5 rounded-full transition-colors">
              <div class="w-8 h-8 bg-gray-700 rounded-full overflow-hidden">
                @if(Auth::user()->photo)
                  <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                @else
                  <div class="w-full h-full flex items-center justify-center bg-amber-700 text-amber-100 text-sm font-bold">
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
        <div class="mb-6 bg-green-900 border-l-4 border-green-500 text-green-100 p-4 rounded">
          <div class="flex items-center">
            <i class="fa-solid fa-check-circle mr-2"></i>
            <p>{{ session('success') }}</p>
          </div>
        </div>
      @endif

      @if(session('error'))
        <div class="mb-6 bg-red-900 border-l-4 border-red-500 text-red-100 p-4 rounded">
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
      
      // Add hover effect to nav items
      const navLinks = document.querySelectorAll('.nav-link');
      navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
          const icon = this.querySelector('i');
          if (icon && !this.classList.contains('active')) {
            icon.style.transform = 'translateX(3px)';
          }
        });
        
        link.addEventListener('mouseleave', function() {
          const icon = this.querySelector('i');
          if (icon && !this.classList.contains('active')) {
            icon.style.transform = 'translateX(0)';
          }
        });
      });
    });
  </script>
  
  <!-- Jquery -->
  <script src="{{ asset('assets1/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets1/js/jquery-migrate-3.0.0.js') }}" ></script>
  <script src="{{ asset('assets1/js/jquery-ui.min.js') }}" ></script>
  <!-- Popper JS -->
  <script src="{{ asset('assets1/js/popper.min.js') }}" ></script>
  <!-- Bootstrap JS -->
  <script src="{{ asset('assets1/js/bootstrap.min.js') }}" ></script>
  <!-- Color JS -->
  <script src="{{ asset('assets1/js/colors.js') }}" ></script>
  <!-- Slicknav JS -->
  <script src="{{ asset('assets1/js/slicknav.min.js') }}" ></script>
  <!-- Owl Carousel JS -->
  <script src="{{ asset('assets1/js/owl-carousel.js') }}" ></script>
  <!-- Magnific Popup JS -->
  <script src="{{ asset('assets1/js/magnific-popup.js') }}" ></script>
  <!-- Fancybox JS -->
  <script src="{{ asset('assets1/js/facnybox.min.js') }}" ></script>
  <!-- Waypoints JS -->
  <script src="{{ asset('assets1/js/waypoints.min.js') }}" ></script>
  <!-- Countdown JS -->
  <script src="{{ asset('assets1/js/finalcountdown.min.js') }}" ></script>
  <!-- Nice Select JS -->
  <script src="{{ asset('assets1/js/nicesellect.js') }}" ></script>
  <!-- Ytplayer JS -->
  <script src="{{ asset('assets1/js/ytplayer.min.js') }}" ></script>
  <!-- Flex Slider JS -->
  <script src="{{ asset('assets1/js/flex-slider.js') }}" ></script>
  <!-- ScrollUp JS -->
  <script src="{{ asset('assets1/js/scrollup.js') }}" ></script>
  <!-- Onepage Nav JS -->
  <script src="{{ asset('assets1/js/onepage-nav.min.js') }}" ></script>
  <!-- Easing JS -->
  <script src="{{ asset('assets1/js/easing.js') }}" ></script>
  <!-- Active JS -->
  <script src="{{ asset('assets1/js/active.js') }}" ></script>
</body>
</html>