<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets1/images/JOTEA-logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets1/images/JOTEA-logo.png') }}" />
    <title>JOTEA - Company Dashboard</title>
    <!-- Inter font for clean modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/e9ee48a8e3.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS with dark mode support -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                            950: '#450a0a',
                        },
                        brand: {
                            amber: '#f59e0b',
                            'amber-light': '#fbbf24',
                            'amber-dark': '#d97706',
                        },
                        'dark-bg': '#0f172a',
                        'dark-card': '#1e293b',
                        'dark-border': '#334155',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            },
        }
    </script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #1e293b;
        }
        ::-webkit-scrollbar-thumb {
            background: #f59e0b;
            border-radius: 8px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #d97706;
        }
        
        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Glassmorphism effects */
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Custom animations */
        @keyframes pulse-gentle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .animate-pulse-gentle {
            animation: pulse-gentle 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-200 bg-dark-bg min-h-screen">
    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 transition-transform duration-300 transform md:translate-x-0 -translate-x-full bg-dark-card border-r border-dark-border h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-6 py-4">
                <a href="{{ route('company.dashboard') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('assets1/images/JOTEA-logo.png') }}" class="h-10" alt="JOTEA Logo" />
                    
                </a>
            </div>

            <!-- Divider -->
            <hr class="border-dark-border opacity-50" />

            <!-- Navigation -->
            <div class="flex flex-col justify-between flex-1 px-3 py-4 overflow-y-auto">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('company.dashboard') }}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('company.dashboard') ? 'bg-brand-amber/10 text-brand-amber' : '' }}">
                            <i class="flex items-center justify-center w-5 h-5 text-brand-amber transition duration-75 fa-solid fa-chart-line"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- My Annonces -->
                    <li>
                        <a href="{{ route('annonce.show') }}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('annonce.show') ? 'bg-brand-amber/10 text-brand-amber' : '' }}">
                            <i class="flex items-center justify-center w-5 h-5 text-orange-400 transition duration-75 fa-solid fa-list"></i>
                            <span class="ml-3">My Annonces</span>
                        </a>
                    </li>

                    <!-- Add Annonce -->
                    <li>
                        <a href="{{ route('addannonce') }}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('addannonce') ? 'bg-brand-amber/10 text-brand-amber' : '' }}">
                            <i class="flex items-center justify-center w-5 h-5 text-emerald-400 transition duration-75 fa-solid fa-plus"></i>
                            <span class="ml-3">Add Annonce</span>
                        </a>
                    </li>

                    <!-- Messages -->
                    <li>
                        <a href="{{ route('entreprise.conversation') }}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('entreprise.conversation') ? 'bg-brand-amber/10 text-brand-amber' : '' }}">
                            <i class="flex items-center justify-center w-5 h-5 text-purple-400 transition duration-75 fa-solid fa-inbox"></i>
                            <span class="ml-3">Messages</span>
                        </a>
                    </li>

                    <!-- Billing -->
                    <li>
                        <a href="{{ route('company.billing') }}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('company.billing') ? 'bg-brand-amber/10 text-brand-amber' : '' }}">
                            <i class="flex items-center justify-center w-5 h-5 text-green-400 transition duration-75 fa-solid fa-credit-card"></i>
                            <span class="ml-3">Billing</span>
                        </a>
                    </li>
                </ul>

                <div class="pt-4 mt-6 space-y-2 border-t border-dark-border">
                    <p class="px-4 text-xs font-medium uppercase text-gray-500">Account</p>
                    
                    <!-- Edit Profile -->
                    <a href="{{ route('company.profile') }}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('company.profile') ? 'bg-brand-amber/10 text-brand-amber' : '' }}">
                        <i class="flex items-center justify-center w-5 h-5 text-gray-400 transition duration-75 fa-solid fa-user"></i>
                        <span class="ml-3">Edit Profile</span>
                    </a>
                    
                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-200 rounded-lg hover:bg-gray-700 group">
                            <i class="flex items-center justify-center w-5 h-5 text-red-400 transition duration-75 fa-solid fa-sign-out-alt"></i>
                            <span class="ml-3">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 w-full md:pl-64">
            <!-- Top Navigation -->
            <header class="sticky top-0 z-30 flex items-center justify-between w-full h-16 px-4 bg-dark-card border-b border-dark-border shadow-md">
                <!-- Mobile Sidebar Toggle -->
                <button id="sidebar-toggle" class="p-2 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-brand-amber text-gray-400 hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- Theme Toggle -->
                <div class="mx-auto">
                    <button id="theme-toggle" type="button" class="text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-brand-amber rounded-lg text-sm p-2">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center">
                    <!-- Home link -->
                    <a href="{{ route('home') }}" class="flex items-center p-2 mr-4 text-gray-400 rounded-lg hover:bg-gray-700 hover:text-gray-200">
                        <i class="fa-solid fa-home"></i>
                        <span class="ml-2 text-sm font-medium hidden sm:inline-block">Home</span>
                    </a>
                    
                    <!-- User Profile -->
                    <div class="relative">
                        <button type="button" class="flex items-center text-sm bg-gray-800 rounded-full focus:ring-2 focus:ring-brand-amber p-1" id="user-menu-button" aria-expanded="false">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/team-3.jpg') }}" alt="user photo">
                            <span class="hidden mx-2 text-gray-200 sm:inline-block">{{ Auth::user()->name ?? 'My Profile' }}</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-2 overflow-y-auto">
                @yield('dashboard.company')
            </main>
        </div>
    </div>

    <!-- Core Scripts -->
    <script>
        // Wait for DOM to load
        document.addEventListener('DOMContentLoaded', function() {
            // Theme toggle functionality
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = sidebarToggle && sidebarToggle.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickOnToggle && !sidebar.classList.contains('-translate-x-full') && window.innerWidth < 768) {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            // Handle theme toggle
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    document.documentElement.classList.toggle('dark');
                    
                    // Toggle icons
                    themeToggleDarkIcon.classList.toggle('hidden');
                    themeToggleLightIcon.classList.toggle('hidden');

                    // Save preference to local storage
                    if (document.documentElement.classList.contains('dark')) {
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        localStorage.setItem('color-theme', 'light');
                    }
                });
            }
        });
    </script>
    
    
</body>
</html>