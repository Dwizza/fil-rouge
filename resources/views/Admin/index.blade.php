@extends('layouts.app')
@section('dashboard.admin')
{{-- <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl"> --}}

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto dark:bg-gray-900 dark:text-white">
      <div class="p-8 bg-gray-100 dark:bg-gray-800 min-h-screen">
        <h1 class="text-3xl font-bold mb-6">📊 Dashboard Admin</h1>
    
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Total Annonces -->
          <div class="bg-white dark:bg-gray-700 p-6 rounded-2xl shadow flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-300 text-sm">Annonces Total</p>
              <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalAnnonces }}</h2>
            </div>
            <div class="text-blue-500 text-3xl">📦</div>
          </div>
    
          <!-- Total Entreprises -->
          <div class="bg-white dark:bg-gray-700 p-6 rounded-2xl shadow flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-300 text-sm">Company Total</p>
              <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalEntreprises }}</h2>
            </div>
            <div class="text-purple-500 text-3xl">🏢</div>
          </div>
    
          <!-- Total Particuliers -->
          <div class="bg-white dark:bg-gray-700 p-6 rounded-2xl shadow flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-300 text-sm">Particulers Total</p>
              <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalParticuliers }}</h2>
            </div>
            <div class="text-pink-500 text-3xl">👤</div>
          </div>
        </div>
    
        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="dark:bg-gray-700 dark:shadow-lg shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 bg-white bg-clip-border">
              <div class="mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize">Sales overview</h6>
                <p class="mb-0 text-sm leading-normal text-gray-600 dark:text-gray-300">
                  <i class="fa fa-arrow-up text-emerald-500"></i>
                  <span class="font-semibold">4% more</span> in 2021
                </p>
              </div>
              <div class="flex-auto p-4">
                <div>
                  <canvas id="chart-line" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>
          
    
          <!-- carousel -->
          <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div slider class="relative w-full h-full overflow-hidden rounded-2xl">
              <!-- slide 1 -->
              <div slide class="absolute w-full h-full transition-all duration-500">
                <img class="object-cover h-full" src="./assets/img/carousel-1.jpg" alt="carousel image" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                  <h5 class="mb-1">Get started with Argon</h5>
                  <p class="opacity-80">There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                </div>
              </div>
    
              <!-- slide 2 -->
              <div slide class="absolute w-full h-full transition-all duration-500">
                <img class="object-cover h-full" src="./assets/img/carousel-2.jpg" alt="carousel image" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                  <h5 class="mb-1">Faster way to create web pages</h5>
                  <p class="opacity-80">That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                </div>
              </div>
    
              <!-- slide 3 -->
              <div slide class="absolute w-full h-full transition-all duration-500">
                <img class="object-cover h-full" src="./assets/img/carousel-3.jpg" alt="carousel image" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                  <h5 class="mb-1">Share with us your design tips!</h5>
                  <p class="opacity-80">Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                </div>
              </div>
    
              <!-- Controls -->
              <button btn-next class="absolute z-10 w-10 h-10 p-2 text-lg text-white opacity-50 hover:opacity-100 top-6 right-4">
                ▶
              </button>
              <button btn-prev class="absolute z-10 w-10 h-10 p-2 text-lg text-white opacity-50 hover:opacity-100 top-6 right-16">
                ◀
              </button>
            </div>
          </div>
        </div>
      </div>
    
      <footer class="pt-4"></footer>
    </div>
    
    <!-- end cards -->
  {{-- </main> --}}

@endsection