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
                  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-gray-100 dark:hover:bg-blue-500/20 rounded-lg" href="/admin/reports">
                      <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-triangle-exclamation" style="color: #fc2727;"></i>
                      </div>
                      <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Reports</span>
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
          <div class="flex items-center justify-end gap-4 mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="flex flex-row gap-6 items-center justify-end pl-0 mb-0 list-none md-max:w-full">
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  </div>
                </a>
              </li>
              <li>
                <a href="/">
                  <i class="fa-solid fa-house" style="color: #ccdfff;"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  
      @yield('dashboard.admin')
      
  </main>
  </body>

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