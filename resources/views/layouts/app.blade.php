<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>Dashboard</title>
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
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    
  <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 transition-transform duration-200 -translate-x-full bg-gray-800 border-0 shadow-xl dark:shadow-none max-w-64 ease-nav-brand z-990 xl:ml-6 xl:left-0 xl:translate-x-0 rounded-2xl" aria-expanded="false">
      <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-white xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-white" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
          <img src="assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 light:inline ease-nav-brand max-h-8" alt="main_logo" />
          <img src="assets/img/logo-ct.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
          <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Dashboard</span>
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white/40 to-transparent" />

      <div class="items-center block w-auto h-auto basis-full">
          <ul class="flex flex-col pl-0 mb-0">
              <li class="mt-0.5 w-full">
                  <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="/admin">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                          <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                  </a>
              </li>

              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-blue-500/20 rounded-lg" href="/admin/annonces">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                          <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Annonces</span>
                  </a>
              </li>

              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-blue-500/20 rounded-lg" href="/admin/users">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                          <i class="fa-solid fa-plus text-emerald-400"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Users</span>
                  </a>
              </li>
              <li class="mt-0.5 w-full">
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-blue-500/20 rounded-lg" href="/admin/categories">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-icons" style="color: #FFD43B;"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Categories</span>
                  </a>
              </li>

              <li class="mt-0.5 w-full">
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="w-full text-left dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-blue-500/20 rounded-lg">
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
          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                <a href="/"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a>
              </div>
            </div>
          </div>
        </div>
      </nav>
  
      @yield('dashboard.admin')
      
  </main>


    {{-- <div fixed-plugin>
      <a fixed-plugin-button class="fixed px-4 py-2 text-xl bg-white shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-circle text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog"> </i>
      </a>
      <!-- -right-90 in loc de 0-->
      <div fixed-plugin-card class="z-sticky backdrop-blur-2xl backdrop-saturate-200 dark:bg-slate-850/80 shadow-3xl w-90 ease -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 duration-200">
        <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
          <div class="float-left">
            <h5 class="mt-4 mb-0 dark:text-white">Argon Configurator</h5>
            <p class="dark:text-white dark:opacity-80">See our dashboard options.</p>
          </div>
          <div class="float-right mt-6">
            <button fixed-plugin-close-button class="inline-block p-0 mb-4 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
              <i class="fa fa-close"></i>
            </button>
          </div>
        </div>
          <!-- End Toggle Button -->

        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
        <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0 dark:text-white">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)">
            <div class="my-2 text-left" sidenav-colors>
              <span class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-500 to-violet-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" active-color data-color="blue" onclick="sidebarColor(this)"></span>
              <span class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="gray" onclick="sidebarColor(this)"></span>
              <span class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-700 to-cyan-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="cyan" onclick="sidebarColor(this)"></span>
              <span class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-emerald-500 to-teal-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="emerald" onclick="sidebarColor(this)"></span>
              <span class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-orange-500 to-yellow-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="orange" onclick="sidebarColor(this)"></span>
              <span class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-red-600 to-orange-600 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="red" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-4">
            <h6 class="mb-0 dark:text-white">Sidenav Type</h6>
            <p class="text-sm leading-normal dark:text-white dark:opacity-80">Choose between 2 different sidenav types.</p>
          </div>
          <div class="flex">
            <button transparent-style-btn class="inline-block w-full px-4 py-2.5 mb-2 font-bold leading-normal text-center text-white capitalize align-middle transition-all bg-blue-500 border border-transparent border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:border-blue-500" data-class="bg-transparent" active-style>White</button>
            <button white-style-btn class="inline-block w-full px-4 py-2.5 mb-2 ml-2 font-bold leading-normal text-center text-blue-500 capitalize align-middle transition-all bg-transparent border border-blue-500 border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-none hover:border-blue-500" data-class="bg-white">Dark</button>
          </div>
          <p class="block mt-2 text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="flex my-4">
            <h6 class="mb-0 dark:text-white">Navbar Fixed</h6>
            <div class="block pl-0 ml-auto min-h-6">
              <input navbarFixed class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
            </div>
          </div>
          <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
          <div class="flex mt-2 mb-12">
            <h6 class="mb-0 dark:text-white">Light / Dark</h6>
            <div class="block pl-0 ml-auto min-h-6">
              <input dark-toggle class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </body>

  <!-- CDN dyal Chart.js -->
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<script>
  const ctx = document.getElementById('chart-line').getContext('2d');

  const chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // T9der tdir dynamic labels
      datasets: [{
        label: 'Sales',
        data: [120, 150, 180, 210, 190, 220], // T9der tdir 
        borderColor: '#10B981',
        backgroundColor: 'rgba(16, 185, 129, 0.2)',
        tension: 0.4,
        fill: true,
        pointRadius: 4,
        pointHoverRadius: 6,
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          labels: {
            color: '#fff' // Pour dark mode
          }
        },
        tooltip: {
          mode: 'index',
          intersect: false,
        }
      },
      interaction: {
        mode: 'nearest',
        axis: 'x',
        intersect: false
      },
      scales: {
        x: {
          ticks: {
            color: '#ccc'
          },
          grid: {
            color: '#444',
          }
        },
        y: {
          ticks: {
            color: '#ccc'
          },
          grid: {
            color: '#444',
          }
        }
      }
    }
  });
</script>

<script>
  const chart = new Chart(ctx, {
    // ...
    data: {
      labels: 45, // e.g. ['Jan', 'Feb', 'Mar']
      datasets: [{
        label: 'Sales',
        data: 20, // e.g. [120, 150, 180]
        // ...
      }]
    },
    // ...
  });
</script>


  <!-- plugin for charts  -->
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.min.js') }}" async></script>
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
  <script src="{{ asset('assets/js/carousel.js') }}" async></script>
  <script src="{{ asset('assets/js/charts.js') }}" async></script>
  <script src="{{ asset('assets/js/dropdown.js') }}" async></script>
  <script src="{{ asset('assets/js/fixed-plugin.js') }}" async></script>
  <script src="{{ asset('assets/js/nav-pills.js') }}" async></script>
  <script src="{{ asset('assets/js/navbar-collapse.js') }}" async></script>
  <script src="{{ asset('assets/js/navbar-sticky.js') }}" async></script>
  <script src="{{ asset('assets/js/perfect-scrollbar.js') }}" async></script>
  <script src="{{ asset('assets/js/sidenav-burger.js') }}" async></script>
  <script src="{{ asset('assets/js/tooltips.js') }}" async></script>
  <!-- plugin for scrollbar  -->
  <script src="{{ asset('assets/js/plugins/Chart.extension.js') }}" async></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
  <!-- main script file  -->
</html>