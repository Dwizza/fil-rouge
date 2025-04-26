<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>JOTEA - Register</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
              primary: {
                50: '#fff8f1',
                100: '#feecdc',
                200: '#fcd9bd',
                300: '#fdba8c',
                400: '#ff8a4c',
                500: '#ff5a1f',
                600: '#d03801',
                700: '#b43403',
                800: '#8a2c0d',
                900: '#771d1d',
              },
              secondary: {
                50: '#f9fafb',
                100: '#f3f4f6',
                200: '#e5e7eb',
                300: '#d1d5db',
                400: '#9ca3af',
                500: '#6b7280',
                600: '#4b5563',
                700: '#374151',
                800: '#1f2937',
                900: '#111827',
              },
            },
            keyframes: {
              bounceIn: {
                '0%': { opacity: '0', transform: 'scale(0.3)' },
                '50%': { opacity: '1', transform: 'scale(1.05)' },
                '70%': { transform: 'scale(0.9)' },
                '100%': { transform: 'scale(1)' }
              },
              fadeInUp: {
                '0%': { opacity: '0', transform: 'translateY(20px)' },
                '100%': { opacity: '1', transform: 'translateY(0)' }
              },
              pulse: {
                '0%, 100%': { opacity: '1' },
                '50%': { opacity: '0.5' }
              }
            },
            animation: {
              'bounce-in': 'bounceIn 0.6s ease',
              'fade-in-up': 'fadeInUp 0.5s ease-out',
              'pulse-slow': 'pulse 3s infinite'
            }
          }
        }
      }
    </script>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(255, 120, 50, 0.15);
      }
      .animated-gradient {
        background: linear-gradient(-45deg, #ff5a1f, #d03801, #f97316, #ea580c);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
      }
      @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }
    </style>
  </head>

  <body class="m-0 font-poppins antialiased font-normal bg-gradient-to-br from-orange-50 to-white text-start text-base leading-normal text-gray-700">
    <!-- Error Alert Popup -->
    <div id="errorAlert" class="fixed top-4 right-4 z-50 hidden">
      <div class="flex items-center p-4 mb-4 text-sm rounded-lg bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 shadow-lg dark:bg-gray-800 dark:text-red-400" role="alert">
        <div class="flex items-center">
          <svg class="w-6 h-6 mr-3 text-red-600 animate-pulse" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 9a1 1 0 01-1-1v-4a1 1 0 112 0v4a1 1 0 01-1 1z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <span class="font-medium text-red-700 dark:text-red-400">Alert!</span>
            <p id="errorMessage" class="text-red-600 dark:text-red-400"></p>
          </div>
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-700 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 transition-all duration-300 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" onclick="closeErrorAlert()">
          <span class="sr-only">Close</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 011.414 1.414L11.414 10l4.293 4.293a1 1 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
    </div>

    <script>
      // Check for error messages from session
      document.addEventListener('DOMContentLoaded', function() {
        @if(session('error'))
          showErrorAlert("{{ session('error') }}");
        @endif
        
        @if($errors->any())
          @foreach($errors->all() as $error)
          showErrorAlert("{{ $error }}");
          @break
          @endforeach
        @endif
        
        @if(session('status'))
          showErrorAlert("{{ session('status') }}");
        @endif
      });

      function showErrorAlert(message) {
        const alert = document.getElementById('errorAlert');
        const messageElement = document.getElementById('errorMessage');
        messageElement.textContent = message;
        alert.classList.remove('hidden');
        alert.classList.add('animate-bounce-in');
        
        // Auto-hide after 20 seconds
        setTimeout(closeErrorAlert, 20000);
      }

      function closeErrorAlert() {
        const alert = document.getElementById('errorAlert');
        alert.classList.add('hidden');
      }
    </script>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl w-full flex flex-row rounded-3xl overflow-hidden shadow-2xl animate-fade-in-up">
        <!-- Image & Brand Column -->
        <div class="hidden lg:block w-5/12 animated-gradient rounded-l-3xl relative">
          <div class="absolute inset-0 flex flex-col justify-center px-12 text-white">
            <div class="max-w-lg">
              <h1 class="text-4xl font-bold mb-6">Join our community today</h1>
              <p class="text-lg mb-8 opacity-90">Create an account and start exploring all the opportunities waiting for you.</p>
              
              <div class="space-y-6">
                <div class="flex items-center">
                  <div class="flex-shrink-0 bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-shield-alt text-white"></i>
                  </div>
                  <p class="ml-4 text-sm opacity-90">Your data is secured with enterprise-grade encryption</p>
                </div>
                
                <div class="flex items-center">
                  <div class="flex-shrink-0 bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-users text-white"></i>
                  </div>
                  <p class="ml-4 text-sm opacity-90">Connect with thousands of users and businesses</p>
                </div>
                
                <div class="flex items-center">
                  <div class="flex-shrink-0 bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-bolt text-white"></i>
                  </div>
                  <p class="ml-4 text-sm opacity-90">Quick and easy registration process</p>
                </div>
              </div>
            </div>
            
            <div class="absolute bottom-8 left-12 right-12 flex justify-between items-center">
              <p class="text-sm opacity-80">© 2025 JOTEA. All rights reserved.</p>
              <div class="flex space-x-4">
                <a href="#" class="text-white hover:text-white/80"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white hover:text-white/80"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white hover:text-white/80"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Registration Form Column -->
        <div class="w-full lg:w-7/12 glass-effect p-8 md:p-10">
          <div class="flex justify-start mb-8">
            <a href="/" class="flex items-center space-x-2">
              <img src="{{ asset('assets/img/JOTEA-logo.png') }}" class="h-10" alt="JOTEA Logo" />
              <span class="text-2xl font-bold text-primary-600"></span>
            </a>
          </div>
          
          <div class="mb-6">
            <h2 class="text-3xl font-extrabold text-gray-800">Create an account</h2>
            <p class="mt-2 text-sm text-gray-600">Join our platform to start exploring opportunities</p>
          </div>
          
          <form class="mt-8 space-y-5" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-primary-500"></i>
                  </div>
                  <input id="name" name="name" type="text" required 
                    class="pl-10 block w-full pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" 
                    placeholder="Your name" />
                </div>
              </div>
              
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-primary-500"></i>
                  </div>
                  <input id="email" name="email" type="email" autocomplete="email" required 
                    class="pl-10 block w-full pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" 
                    placeholder="Your email" />
                </div>
              </div>
              
              <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-primary-500"></i>
                  </div>
                  <input id="password" name="password" type="password" required 
                    class="pl-10 block w-full pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" 
                    placeholder="Create a strong password" />
                </div>
              </div>
              
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-phone text-primary-500"></i>
                  </div>
                  <input id="phone" name="phone" type="text" required 
                    class="pl-10 block w-full pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" 
                    placeholder="Your phone number" />
                </div>
              </div>
              
              <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-map-marker-alt text-primary-500"></i>
                  </div>
                  <input id="address" name="address" type="text" required 
                    class="pl-10 block w-full pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" 
                    placeholder="Your address" />
                </div>
              </div>
              
              <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-image text-primary-500"></i>
                  </div>
                  <input id="photo" name="photo" type="file" accept="image/*"
                    class="pl-10 block w-full pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100" />
                </div>
              </div>
            </div>
            
            <div class="mt-6">
              <label class="block text-sm font-medium text-gray-700 mb-2">Account Type</label>
              <div class="flex flex-wrap gap-4">
                <label class="relative flex items-center p-3 rounded-lg border border-gray-200 cursor-pointer hover:border-primary-500 transition-all duration-200 group">
                  <input type="radio" name="role_id" value="3" class="peer hidden" required>
                  <div class="absolute right-3 top-3 transition-opacity opacity-0 peer-checked:opacity-100 text-primary-500">
                    <i class="fas fa-check-circle"></i>
                  </div>
                  <div class="flex items-center">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-primary-100 text-primary-600 mr-3 group-hover:bg-primary-200 transition-all duration-200">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <span class="text-gray-900 font-medium">Individual</span>
                      <p class="text-xs text-gray-500">Personal account</p>
                    </div>
                  </div>
                </label>
                
                <label class="relative flex items-center p-3 rounded-lg border border-gray-200 cursor-pointer hover:border-primary-500 transition-all duration-200 group">
                  <input type="radio" name="role_id" value="2" class="peer hidden" required>
                  <div class="absolute right-3 top-3 transition-opacity opacity-0 peer-checked:opacity-100 text-primary-500">
                    <i class="fas fa-check-circle"></i>
                  </div>
                  <div class="flex items-center">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-primary-100 text-primary-600 mr-3 group-hover:bg-primary-200 transition-all duration-200">
                      <i class="fas fa-building"></i>
                    </div>
                    <div>
                      <span class="text-gray-900 font-medium">Company</span>
                      <p class="text-xs text-gray-500">Business account</p>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <div class="flex items-center mt-6">
              <input id="terms" name="terms" type="checkbox" required
                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded cursor-pointer" />
              <label for="terms" class="ml-2 block text-sm text-gray-700">
                I agree to the <a href="#" class="font-medium text-primary-600 hover:text-primary-500">Terms and Conditions</a> and <a href="#" class="font-medium text-primary-600 hover:text-primary-500">Privacy Policy</a>
              </label>
            </div>

            <div>
              <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-white bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 shadow-lg transform transition duration-200 hover:-translate-y-1">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <i class="fas fa-user-plus"></i>
                </span>
                Create Account
              </button>
            </div>
          </form>
          
          <p class="mt-8 text-center text-sm text-gray-600">
            Already have an account?
            <a href="/login" class="font-medium text-primary-600 hover:text-primary-500 hover:underline">
              Sign in
            </a>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>


