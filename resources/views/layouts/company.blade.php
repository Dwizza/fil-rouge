<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets1/images/JOTEA-logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets1/images/JOTEA-logo.png') }}" />
    <title>JOTEA - Company Dashboard</title>
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

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    

    <script src="https://kit.fontawesome.com/e9ee48a8e3.js" crossorigin="anonymous"></script>
    {{-- tailwind cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-amber-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 transition-transform duration-200 -translate-x-full bg-gray-800 border-0 shadow-xl dark:shadow-none max-w-64 ease-nav-brand z-990 xl:ml-6 xl:left-0 xl:translate-x-0 rounded-2xl" aria-expanded="false">
      <div class="h-19 flex justify-center items-center">
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-white" href="{{ route('company.dashboard') }}">
          <img src="{{ asset('assets1/images/JOTEA-logo.png') }}" class="inline h-12 max-w-full transition-all duration-200 ease-nav-brand" alt="JOTEA Logo" />
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white/40 to-transparent" />

      <div class="items-center block w-auto h-auto basis-full">
          <ul class="flex flex-col pl-0 mb-0">
              <li class="mt-0.5 w-full">
                  <a class="py-2.7 bg-amber-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ route('company.dashboard') }}">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                          <i class="relative top-0 text-sm leading-normal text-amber-500 ni ni-tv-2"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                  </a>
              </li>

              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-amber-500/20 rounded-lg" href="{{ route('annonce.show') }}">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                          <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">My Annonces</span>
                  </a>
              </li>

              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-amber-500/20 rounded-lg" href="{{ route('addannonce') }}">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                          <i class="fa-solid fa-plus text-emerald-400"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Add Annonce</span>
                  </a>
              </li>
              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-amber-500/20 rounded-lg" href="{{ route('entreprise.conversation') }}">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-inbox" style="color: #d904c0;"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Messages</span>
                  </a>
              </li>
              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-amber-500/20 rounded-lg" href="{{ route('company.billing') }}">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-credit-card" style="color: #16bd00;"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Billing</span>
                  </a>
              </li>

              <li class="w-full mt-4">
                  <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account Pages</h6>
              </li>

              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-amber-500/20 rounded-lg" href="{{ route('company.profile') }}">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                          <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Edit Profile</span>
                  </a>
              </li>

              <li class="mt-0.5 w-full">
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="w-full text-left dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-amber-500/20 rounded-lg">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                          <i class="fa-solid fa-right-from-bracket relative top-0 text-sm leading-normal text-red-500"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
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
          <div class="flex items-center justify-end mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="flex  justify-end pl-0 mb-0 list-none md-max:w-full">
              
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  </div>
                </a>
              </li>

              <!-- Home button -->
              <li class="flex items-center px-4">
                <a href="{{ route('home') }}" class="p-0 text-sm text-white transition-all ease-nav-brand flex items-center" title="Go to Homepage">
                  <i class="fa-solid fa-house mr-1"></i>
                  <span class="hidden sm:inline-block">Home</span>
                </a>
              </li>

              <!-- User profile -->
              <li class="relative flex items-center pl-4">
                <a href="{{ route('company.profile') }}" class="p-0 text-sm text-white transition-all ease-nav-brand flex items-center">
                  <img src="{{ asset('assets/img/team-3.jpg') }}" class="rounded-full h-8 w-8 mr-1" alt="User Profile">
                  <span class="hidden sm:inline-block">{{ Auth::user()->name ?? 'My Profile' }}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  
      @yield('dashboard.company')
      
  </main>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  </body>
  <!-- plugin for charts  -->
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}"></script>
  <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
  <script src="{{ asset('assets/js/dropdown.js') }}"></script>
  <script src="{{ asset('assets/js/fixed-plugin.js') }}"></script>
  <script src="{{ asset('assets/js/navbar-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/navbar-sticky.js') }}"></script>

  <script>
    // Initialize dropdowns
    document.addEventListener('DOMContentLoaded', function() {
      // Mobile sidenav toggler
      var sidenavTrigger = document.querySelector('[sidenav-trigger]');
      var sidenav = document.querySelector('aside');
      
      if (sidenavTrigger) {
        sidenavTrigger.addEventListener('click', function() {
          sidenav.classList.toggle('-translate-x-full');
        });
      }
      
      // Close sidenav when clicking outside
      var sidenavClose = document.querySelector('[sidenav-close]');
      if (sidenavClose) {
        sidenavClose.addEventListener('click', function() {
          sidenav.classList.add('-translate-x-full');
        });
      }
      
      // Dropdown functionality
      var dropdownTriggers = document.querySelectorAll('[dropdown-trigger]');
      dropdownTriggers.forEach(function(trigger) {
        trigger.addEventListener('click', function() {
          var dropdownMenu = this.nextElementSibling;
          if (dropdownMenu) {
            dropdownMenu.classList.toggle('opacity-0');
            dropdownMenu.classList.toggle('pointer-events-none');
          }
        });
      });
    });
  </script>
</html>