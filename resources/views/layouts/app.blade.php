<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>JOTEA Admin Dashboard</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/e9ee48a8e3.js" crossorigin="anonymous"></script>
    {{-- tailwind cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              'dark-card': '#1a1e2d',
              'dark-border': '#2d3748',
              'brand-amber': '#f59e0b',
            },
            boxShadow: {
              'dark-glow': '0 0 15px rgba(245, 158, 11, 0.3)',
            },
            spacing: {
              '68': '17rem', // For proper main content margin
              '72': '18rem',  // For proper sidebar width
            }
          }
        }
      }
    </script>
    
    <style>
      /* Custom scrollbar styling */
      ::-webkit-scrollbar {
          width: 5px;
          height: 5px;
      }
      
      ::-webkit-scrollbar-track {
          background: rgba(30, 41, 59, 0.2);
      }
      
      ::-webkit-scrollbar-thumb {
          background-color: rgba(245, 158, 11, 0.5);
          border-radius: 20px;
      }
  
      ::-webkit-scrollbar-thumb:hover {
          background-color: rgba(245, 158, 11, 0.7);
      }
  
      body {
          scrollbar-width: thin;
          scrollbar-color: rgba(245, 158, 11, 0.5) rgba(30, 41, 59, 0.2);
      }
    </style>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal bg-gray-900 leading-default text-gray-300">
    <!-- sidenav -->
    <aside class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block w-72 p-0 my-4 overflow-hidden transition-all duration-300 -translate-x-full border-0 shadow-2xl xl:ml-6 xl:translate-x-0 rounded-2xl z-990 bg-gradient-to-b from-gray-900 to-gray-800 border border-gray-700/50 max-w-[18rem]" aria-expanded="false">
      <div class="h-20 flex items-center px-8 border-b border-gray-700/30">
        <i class="absolute top-0 right-0 p-4 opacity-70 cursor-pointer fas fa-times text-amber-500 hover:text-white transition-colors xl:hidden" sidenav-close></i>
        <a class="flex items-center gap-2 text-lg font-bold text-white" href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('assets/img/JOTEA-logo.png') }}" class="h-full max-h-10 transition-all duration-200" alt="JOTEA" />
          <span class="text-amber-400">ADMIN</span>
        </a>
      </div>

      <div class="items-center block w-auto h-auto grow overflow-auto">
        <ul class="flex flex-col py-4 space-y-1">
          <li class="px-4 text-xs font-semibold text-gray-400 uppercase mb-2 mt-4">
            Main
          </li>
          
          <li class="px-4">
            <a class="flex items-center gap-4 px-4 py-3 mb-1 text-sm font-medium transition-colors rounded-lg hover:bg-gray-800 group active:bg-gray-800 hover:text-amber-400 {{ request()->is('admin') ? 'bg-amber-500/10 text-amber-400 border-l-4 border-amber-400' : 'text-gray-300' }}" href="/admin">
              <div class="flex items-center justify-center w-8 h-8 text-center xl:pl-0">
                <i class="text-base relative top-0 leading-normal fa-solid fa-gauge-high {{ request()->is('admin') ? 'text-amber-400' : 'text-gray-400 group-hover:text-amber-400' }}"></i>
              </div>
              <span class="transition-opacity">Dashboard</span>
            </a>
          </li>

          <li class="px-4">
            <a class="flex items-center gap-4 px-4 py-3 mb-1 text-sm font-medium transition-colors rounded-lg hover:bg-gray-800 group active:bg-gray-800 hover:text-amber-400 {{ request()->is('admin/annonces*') ? 'bg-amber-500/10 text-amber-400 border-l-4 border-amber-400' : 'text-gray-300' }}" href="/admin/annonces">
              <div class="flex items-center justify-center w-8 h-8 text-center xl:pl-0">
                <i class="text-base relative top-0 leading-normal fa-solid fa-bullhorn {{ request()->is('admin/annonces*') ? 'text-amber-400' : 'text-gray-400 group-hover:text-amber-400' }}"></i>
              </div>
              <span class="transition-opacity">Annonces</span>
            </a>
          </li>
          
          <li class="px-4">
            <a class="flex items-center gap-4 px-4 py-3 mb-1 text-sm font-medium transition-colors rounded-lg hover:bg-gray-800 group active:bg-gray-800 hover:text-amber-400 {{ request()->is('admin/users*') ? 'bg-amber-500/10 text-amber-400 border-l-4 border-amber-400' : 'text-gray-300' }}" href="/admin/users">
              <div class="flex items-center justify-center w-8 h-8 text-center xl:pl-0">
                <i class="text-base relative top-0 leading-normal fa-solid fa-users {{ request()->is('admin/users*') ? 'text-amber-400' : 'text-gray-400 group-hover:text-amber-400' }}"></i>
              </div>
              <span class="transition-opacity">Users</span>
            </a>
          </li>
          
          <li class="px-4">
            <a class="flex items-center gap-4 px-4 py-3 mb-1 text-sm font-medium transition-colors rounded-lg hover:bg-gray-800 group active:bg-gray-800 hover:text-amber-400 {{ request()->is('admin/categories*') ? 'bg-amber-500/10 text-amber-400 border-l-4 border-amber-400' : 'text-gray-300' }}" href="/admin/categories">
              <div class="flex items-center justify-center w-8 h-8 text-center xl:pl-0">
                <i class="text-base relative top-0 leading-normal fa-solid fa-icons {{ request()->is('admin/categories*') ? 'text-amber-400' : 'text-amber-400 group-hover:text-amber-400' }}"></i>
              </div>
              <span class="transition-opacity">Categories</span>
            </a>
          </li>
          
          <li class="px-4">
            <a class="flex items-center gap-4 px-4 py-3 mb-1 text-sm font-medium transition-colors rounded-lg hover:bg-gray-800 group active:bg-gray-800 hover:text-amber-400 {{ request()->is('admin/reports*') ? 'bg-amber-500/10 text-amber-400 border-l-4 border-amber-400' : 'text-gray-300' }}" href="/admin/reports">
              <div class="flex items-center justify-center w-8 h-8 text-center xl:pl-0">
                <i class="text-base relative top-0 leading-normal fa-solid fa-triangle-exclamation {{ request()->is('admin/reports*') ? 'text-amber-400' : 'text-red-400 group-hover:text-amber-400' }}"></i>
              </div>
              <span class="transition-opacity">Reports</span>
              <span class="flex items-center justify-center p-1 text-xs font-bold text-white bg-red-500 rounded-full ml-auto w-5 h-5">3</span>
            </a>
          </li>
          
          <li class="px-4">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full flex items-center gap-4 px-4 py-3 mb-1 text-sm font-medium text-left transition-colors rounded-lg hover:bg-gray-800 group hover:text-red-400 text-gray-300">
                <div class="flex items-center justify-center w-8 h-8 text-center xl:pl-0">
                  <i class="text-base relative top-0 leading-normal fa-solid fa-right-from-bracket text-gray-400 group-hover:text-red-400"></i>
                </div>
                <span class="transition-opacity">Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </div>
    </aside>
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav aria-label="breadcrumb" class="hidden md:block">
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-gray-400 hover:text-amber-400 transition-colors" href="/admin">Dashboard</a>
              </li>
              <li class="text-sm text-gray-400 leading-normal pl-2 before:content-['/'] before:pr-2" aria-current="page">
                {{ ucfirst(request()->segment(2) ?? 'Home') }}
              </li>
            </ol>
            <h6 class="mb-0 font-bold text-white">{{ ucfirst(request()->segment(2) ?? 'Dashboard') }}</h6>
          </nav>
          
          <div class="flex items-center gap-4 lg:flex-nowrap">
            <div class="relative">
              <button type="button" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-300 transition-all duration-200 rounded-lg hover:bg-gray-800">
                <i class="fa-solid fa-bell text-gray-400"></i>
                <span class="absolute flex h-2 w-2 top-2 right-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
              </button>
            </div>
            
            <a href="/" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-300 transition-all duration-200 rounded-lg hover:bg-gray-800">
              <i class="fa-solid fa-house text-gray-400"></i>
              <span class="hidden md:block">Home</span>
            </a>
            
            <button class="px-3 py-2 text-sm font-medium text-gray-300 transition-all duration-200 rounded-lg xl:hidden hover:bg-gray-800" sidenav-trigger>
              <i class="fa-solid fa-bars text-gray-400"></i>
            </button>
            
            <div class="flex items-center gap-2 p-1">
              <img alt="Admin Profile" src="{{ asset('assets/img/admin-avatar.png') }}" class="w-9 h-9 rounded-full border-2 border-amber-400">
              <div class="hidden md:block">
                <p class="text-sm font-medium text-white">Admin User</p>
                <p class="text-xs text-gray-400">Super Admin</p>
              </div>
            </div>
          </div>
        </div>
      </nav>
  
      <div class="w-full pl-12 pr-6 mx-auto">
        <!-- Flash messages -->
        @if(session('success'))
          <div class="mb-6 flex items-center py-3 px-4 rounded-lg bg-green-500/10 border border-green-500/30">
            <svg class="flex-shrink-0 w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3 text-sm text-green-400">{{ session('success') }}</span>
          </div>
        @endif
  
        @if(session('error'))
          <div class="mb-6 flex items-center py-3 px-4 rounded-lg bg-red-500/10 border border-red-500/30">
            <svg class="flex-shrink-0 w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3 text-sm text-red-400">{{ session('error') }}</span>
          </div>
        @endif
        
        @yield('dashboard.admin')
      </div>
    </main>
  </body>


  <!-- Main scripts -->
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.min.js') }}"></script>
  <script src="{{ asset('assets/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
</html>