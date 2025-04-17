@extends('layouts.particulier')

@section('content')
<!-- Dashboard Component for JOTEA -->
<div class="bg-gray-50 py-6">
    <div class="container mx-auto">
      <!-- Welcome Section -->
      <div class="flex items-center justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h1>
          <p class="text-gray-600">Here's what's happening with your account today.</p>
        </div>
        <div>
          <button id="openCreateAnnonceModal" class="bg-gradient-to-r from-amber-300 to-amber-700 hover:from-amber-400 hover:to-amber-800 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300 flex items-center">
            <i class="ti-plus mr-2"></i> Create New Annonce
          </button>
        </div>
      </div>
  
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-blue-500 hover:shadow-lg transition-all duration-300">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 uppercase font-semibold">Active Listings</p>
              <h3 class="text-3xl font-bold text-gray-800">12</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="ti-package text-blue-500 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-500 font-semibold text-sm">+3.5%</span>
            <span class="text-gray-500 text-sm"> from last week</span>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-green-500 hover:shadow-lg transition-all duration-300">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 uppercase font-semibold">Profile Views</p>
              <h3 class="text-3xl font-bold text-gray-800">254</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <i class="ti-eye text-green-500 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-500 font-semibold text-sm">+12.8%</span>
            <span class="text-gray-500 text-sm"> from last month</span>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-purple-500 hover:shadow-lg transition-all duration-300">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 uppercase font-semibold">Messages</p>
              <h3 class="text-3xl font-bold text-gray-800">7</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
              <i class="ti-comment-alt text-purple-500 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-yellow-500 font-semibold text-sm">+0 new</span>
            <span class="text-gray-500 text-sm"> since yesterday</span>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-amber-500 hover:shadow-lg transition-all duration-300">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 uppercase font-semibold">Favorites</p>
              <h3 class="text-3xl font-bold text-gray-800">18</h3>
            </div>
            <div class="bg-amber-100 p-3 rounded-full">
              <i class="ti-heart text-amber-500 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-500 font-semibold text-sm">+2</span>
            <span class="text-gray-500 text-sm"> new favorites</span>
          </div>
        </div>
      </div>
  
      <!-- Main Content -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Listings -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md">
              <div class="border-b border-gray-200 p-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Your Recent Listings</h2>
              </div>
              @if (session('success'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                      <strong class="font-bold">Success!</strong>
                      <span class="block sm:inline">{{ session('success') }}</span>
                  </div>
              @endif
              <div class="p-4">
                <div class="divide-y divide-gray-200">
                  @foreach ($annonces as $annonce)
                  @php
                      $images = explode(',', $annonce->image);
                  @endphp
                  <div class="py-3 flex items-center">
                    <div class="w-16 h-16 bg-gray-200 rounded-md flex-shrink-0 overflow-hidden">
                      <img src="{{ asset($images[0]) }}" alt="Product" class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4 flex-grow">
                      <h4 class="font-medium text-gray-800">{{$annonce->title}}</h4>
                      <div class="flex items-center text-sm text-gray-500">
                        <span class="flex items-center"><i class="fa-solid fa-location-dot pr-2" style="color: #b5b5b5;"></i>{{$annonce->location}}</span>
                        <span class="mx-2">•</span>
                        <span class="flex items-center"><i class="fa-light fa-icons pr-2" style="color: #b5b5b5;"></i>{{$annonce->category->name}}</span>
                        <span class="mx-2">•</span>
                        <span class="font-medium text-green-600">{{$annonce->price}}$</span>
                      </div>
                    </div>
                    <div class="flex items-center space-x-2">
                      @if ($annonce->status == 'published')
                          <span class="text-green-500 text-xs font-semibold bg-green-100 px-2 py-1 rounded-full">published</span>
                          <a href="/user/annonce/{{$annonce->id}}" class="p-2 ">
                              <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                          </a>
                          <a href="/user/annonce/delete/{{$annonce->id}}" class="p-2 ">
                              <i class="fa-solid fa-trash" style="color: #d81103;"></i>
                          </a>
                      @elseif ($annonce->status == 'draft')
                          <span class="text-yellow-500 text-xs font-semibold bg-yellow-100 px-2 py-1 rounded-full">Draft</span>
                          <a href="/user/annonce/{{$annonce->id}}" class="p-2 ">
                              <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                          </a>
                          <form action="/user/annonce/delete/{{$annonce->id}}" method="POST">
                              @csrf
                              <button type="submit" class="p-2 ">
                                  <i class="fa-solid fa-trash" style="color: #d81103;"></i>
                              </button>
                          </form>
                      @elseif ($annonce->status == 'archived')
                          <span class="text-red-500 text-xs font-semibold bg-red-100 px-2 py-1 rounded-full">Archived</span>
                          <a href="/user/annonce/{{$annonce->id}}" class="p-2 ">
                              <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                          </a>
                          <a href="/user/annonce/delete/{{$annonce->id}}" class="p-2 ">
                              <i class="fa-solid fa-trash" style="color: #d81103;"></i>
                          </a>
                      @endif
                    </div>
                  </div>
                  @endforeach
                </div>
                
                
                <div class="mt-6">
                  @if($annonces->hasPages())
                    <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6">
                      <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                          <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">{{ $annonces->firstItem() }}</span>
                            to
                            <span class="font-medium">{{ $annonces->lastItem() }}</span>
                            of
                            <span class="font-medium">{{ $annonces->total() }}</span>
                            results
                          </p>
                        </div>
                        <div>
                          <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <!-- Previous Page Link -->
                            @if ($annonces->onFirstPage())
                              <span class="relative inline-flex items-center px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 focus:outline-offset-0 cursor-not-allowed">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                              </span>
                            @else
                              <a href="{{ $annonces->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            @endif
                            
                            <!-- Pagination Elements -->
                            @foreach ($annonces->getUrlRange(1, $annonces->lastPage()) as $page => $url)
                              @if ($page == $annonces->currentPage())
                                <span aria-current="page" class="relative z-10 inline-flex items-center bg-amber-400 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                  {{ $page }}
                                </span>
                              @else
                                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                  {{ $page }}
                                </a>
                              @endif
                            @endforeach
                            
                            <!-- Next Page Link -->
                            @if ($annonces->hasMorePages())
                              <a href="{{ $annonces->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            @else
                              <span class="relative inline-flex items-center px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 focus:outline-offset-0 cursor-not-allowed">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                              </span>
                            @endif
                          </nav>
                        </div>
                      </div>
                      
                      <!-- Mobile Pagination (simplified) -->
                      <div class="flex items-center justify-between sm:hidden">
                        <div class="flex w-0 flex-1 justify-start">
                          @if ($annonces->onFirstPage())
                            <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400 cursor-not-allowed">
                              Previous
                            </span>
                          @else
                            <a href="{{ $annonces->previousPageUrl() }}" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                              Previous
                            </a>
                          @endif
                        </div>
                        <div class="flex items-center justify-center">
                          <p class="text-sm text-gray-700">
                            <span class="font-medium">{{ $annonces->currentPage() }}</span>
                            of
                            <span class="font-medium">{{ $annonces->lastPage() }}</span>
                          </p>
                        </div>
                        <div class="flex w-0 flex-1 justify-end">
                          @if ($annonces->hasMorePages())
                            <a href="{{ $annonces->nextPageUrl() }}" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                              Next
                            </a>
                          @else
                            <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400 cursor-not-allowed">
                              Next
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        
        
        <div>
          <!-- Profile Card -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 flex flex-col items-center text-center">
              <div class="w-24 h-24 rounded-full bg-gray-200 mb-4 overflow-hidden">
                <img src="{{$user->photo}}" alt="Profile" class="w-full h-full object-cover">
              </div>
              <h3 class="text-xl font-bold text-gray-800">{{ $user->name }}</h3>
              <p class="text-sm text-gray-500">Member since {{ $user->created_at->format('M Y') }}</p>
              
              <!-- Profile Progress -->
              <div class="w-full mt-4">
                <div class="flex items-center justify-center gap-2 mb-1">
                  <span class="text-xs font-semibold text-gray-700">Email :</span>
                  <span class="text-xs font-medium text-gray-500">{{$user->email}}</span>
                </div>
                <p class="text-xs text-gray-500 mt-2">Complete your profile to increase visibility</p>
              </div>
              
              <button class="mt-4 w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition">
                Edit Profile
              </button>
            </div>
            
            <!-- Quick Stats -->
            <div class="border-t border-gray-200">
              <div class="flex justify-center divide-x divide-gray-200">
                <div class="p-4 text-center">
                  <span class="block text-2xl font-bold text-gray-800">{{$numberOfAnnonces}}</span>
                  <span class="text-xs text-gray-500">Listings</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Quick Actions -->
          <div class="bg-white rounded-lg shadow-md mt-6">
            <div class="border-b border-gray-200 p-4">
              <h2 class="text-lg font-semibold text-gray-800">Quick Actions</h2>
            </div>
            <div class="p-4">
              <div class="grid grid-cols-2 gap-3">
                <button id="openQuickCreateModal" class="p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="ti-plus text-blue-500 mb-1 text-xl"></i>
                  <span class="text-sm font-medium text-gray-700">Add Annonce</span>
                </button>
                
                <button class="p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="ti-comment-alt text-purple-500 mb-1 text-xl"></i>
                  <span class="text-sm font-medium text-gray-700">Messages</span>
                </button>
                
                <button class="p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="ti-heart text-green-500 mb-1 text-xl"></i>
                  <span class="text-sm font-medium text-gray-700">Favorites</span>
                </button>
                
                <button class="p-3 bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors flex flex-col items-center justify-center">
                  <i class="ti-settings text-amber-500 mb-1 text-xl"></i>
                  <span class="text-sm font-medium text-gray-700">Settings</span>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Notifications -->
            @php
                $colors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-pink-500', 'bg-yellow-500', 'bg-indigo-500'];
            @endphp
 
            <div class="space-y-5 p-4 bg-white rounded-xl shadow-md" id="recent-activity">
                @foreach ($annonces->take(3) as $annonce)
                    @php
                        $color = $colors[array_rand($colors)];
                    @endphp
            
                    <div class="flex items-start gap-4 hover:bg-gray-50 p-3 rounded-lg transition-all">
                        <!-- Icon Circle -->
                        <div class="w-10 h-10 rounded-full {{ $color }} flex items-center justify-center shadow text-white text-lg font-bold">
                            <i class="ti-plus"></i>
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <p class="text-sm text-gray-800 font-medium">
                                You created a new annonce
                                <span class="text-orange-600 font-semibold">"{{ $annonce->title }}"</span>
                            </p>
                            <p class="text-xs text-gray-500 mt-1">{{ $annonce->created_at->format('F d, Y — H:i A') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Create Annonce Modal -->
  <div id="createAnnonceModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
      <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 bg-white z-10">
        <h3 class="text-xl font-bold text-gray-800">Create New Annonce</h3>
        <button id="closeAnnonceModal" class="text-gray-500 hover:text-gray-700">
          <i class="ti-close text-xl"></i>
        </button>
      </div>
      
      <div class="p-6">
        <form id="annonceForm" method="POST" enctype="multipart/form-data" action="{{route('user.annonces.store')}}">
            @csrf
          <!-- Category Selection -->
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
              Category <span class="text-red-500">*</span>
            </label>
            <select id="category" name="category_id" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">Select a category</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach

            </select>
          </div>
          
          <!-- Title -->
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
              Title <span class="text-red-500">*</span>
            </label>
            <input type="text" id="title" name="title" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter a descriptive title...">
          </div>
          
          <!-- Description -->
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
              Description <span class="text-red-500">*</span>
            </label>
            <textarea id="description" name="description" rows="4" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Describe your item or service in detail..."></textarea>
            
          </div>
          
          <!-- Price -->
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
              Price <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center">
              <input type="number" id="price" name="price" class="shadow-sm border border-gray-300 rounded-l-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="0">
              <span class="bg-gray-100 px-4 py-2 rounded-r-md border border-l-0 border-gray-300 text-gray-700 font-medium">DH</span>
            </div>
          </div>
          
          <!-- Location -->
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="location">
              Location <span class="text-red-500">*</span>
            </label>
            <input type="text" id="location" name="location" class="shadow-sm border border-gray-300 rounded-l-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="your location...">
          </div>
          
          <!-- Photos -->
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
              Photos <span class="text-red-500">*</span>
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center">
              <div class="mb-3">
                <i class="ti-cloud-up text-gray-400 text-4xl"></i>
              </div>
              <p class="text-gray-700 mb-2">Drag & drop photos here</p>
              <p class="text-xs text-gray-500">or</p>
              <div class="mt-2">
                <label for="fileUpload" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md cursor-pointer inline-block transition-colors">
                  Browse Files
                </label>
                <input id="fileUpload" name="image[]" type="file" multiple class="hidden">
              </div>
              <p class="text-xs text-gray-500 mt-3">Upload up to 2 photos. First image will be the cover (maximum 5MB each)</p>
            </div>
          </div>
          
        <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4 border-t border-gray-200 pt-6">
                <button type="button" id="cancelAnnonceBtn" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-amber-300 to-amber-700 hover:from-amber-400 hover:to-amber-800 text-white rounded-md shadow-sm transition-colors">
                Add Annonce
                </button>
            </div>
        </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                  // Modal elements
                  const modal = document.getElementById('createAnnonceModal');
                  const openModalBtn = document.getElementById('openCreateAnnonceModal');
                  const closeModalBtn = document.getElementById('closeAnnonceModal');
                  const cancelBtn = document.getElementById('cancelAnnonceBtn');
                  const quickCreateBtn = document.getElementById('openQuickCreateModal');
                
                  // Open modal
                  function openModal() {
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                  }
                
                  // Close modal
                  function closeModal() {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                  }
                
                  // Event listeners
                  openModalBtn.addEventListener('click', openModal);
                  quickCreateBtn.addEventListener('click', openModal);
                  closeModalBtn.addEventListener('click', closeModal);
                  cancelBtn.addEventListener('click', closeModal);
                
                  // Close modal when clicking outside
                  modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                      closeModal();
                    }
                  });
                
                  // Form submission
                //   document.getElementById('annonceForm').addEventListener('submit', function(e) {
                //     // e.preventDefault();
                //     closeModal();
                //   });
                });
                </script>
@endsection


