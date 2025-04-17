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
              <a href="#" class="text-blue-500 hover:text-blue-700 text-sm font-medium">View All</a>
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
                
                {{-- {{print_r($images[0])}} --}}
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
                        {{-- <a href="/user/annonce/delete/{{$annonce->id}}" class="p-2 ">
                            <i class="fa-solid fa-trash" style="color: #d81103;"></i>
                        </a> --}}
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
            </div>
          </div>
          
          <!-- Activity Timeline -->
          <div class="bg-white rounded-lg shadow-md mt-6">
            <div class="border-b border-gray-200 p-4">
              <h2 class="text-lg font-semibold text-gray-800">Recent Activity</h2>
            </div>
            <div class="p-4">
              <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                
                <!-- Timeline Items -->
                <div class="space-y-6 relative">
                  <!-- Item -->
                  <div class="flex">
                    <div class="flex-shrink-0 z-10">
                      <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white shadow">
                        <i class="ti-eye text-sm"></i>
                      </div>
                    </div>
                    <div class="ml-4">
                      <h4 class="text-sm font-medium text-gray-800">Your listing "iPhone 14 Pro" received 5 new views</h4>
                      <p class="text-xs text-gray-500 mt-1">Today, 09:41 AM</p>
                    </div>
                  </div>
                  
                  <!-- Item -->
                  <div class="flex">
                    <div class="flex-shrink-0 z-10">
                      <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-500 text-white shadow">
                        <i class="ti-comment text-sm"></i>
                      </div>
                    </div>
                    <div class="ml-4">
                      <h4 class="text-sm font-medium text-gray-800">New message from Ahmed about "MacBook Pro 16""</h4>
                      <p class="text-xs text-gray-500 mt-1">Yesterday, 18:22 PM</p>
                    </div>
                  </div>
                  
                  <!-- Item -->
                  <div class="flex">
                    <div class="flex-shrink-0 z-10">
                      <div class="flex items-center justify-center w-8 h-8 rounded-full bg-purple-500 text-white shadow">
                        <i class="ti-heart text-sm"></i>
                      </div>
                    </div>
                    <div class="ml-4">
                      <h4 class="text-sm font-medium text-gray-800">Your listing "Toyota Corolla 2020" was added to favorites</h4>
                      <p class="text-xs text-gray-500 mt-1">Apr 15, 2025, 14:30 PM</p>
                    </div>
                  </div>
                  
                  <!-- Item -->
                  <div class="flex">
                    <div class="flex-shrink-0 z-10">
                      <div class="flex items-center justify-center w-8 h-8 rounded-full bg-amber-500 text-white shadow">
                        <i class="ti-plus text-sm"></i>
                      </div>
                    </div>
                    <div class="ml-4">
                      <h4 class="text-sm font-medium text-gray-800">You created a new listing "Gaming PC - RTX 4070"</h4>
                      <p class="text-xs text-gray-500 mt-1">Apr 14, 2025, 11:15 AM</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Right Column - Profile and Tools -->
        <div>
          <!-- Profile Card -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 flex flex-col items-center text-center">
              <div class="w-24 h-24 rounded-full bg-gray-200 mb-4 overflow-hidden">
                <img src="/api/placeholder/100/100" alt="Profile" class="w-full h-full object-cover">
              </div>
              <h3 class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</h3>
              <p class="text-sm text-gray-500">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
              
              <!-- Profile Progress -->
              <div class="w-full mt-4">
                <div class="flex items-center justify-between mb-1">
                  <span class="text-xs font-semibold text-gray-700">Profile Completion</span>
                  <span class="text-xs font-medium text-gray-500">75%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-blue-500 h-2 rounded-full" style="width: 75%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Complete your profile to increase visibility</p>
              </div>
              
              <button class="mt-4 w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition">
                Edit Profile
              </button>
            </div>
            
            <!-- Quick Stats -->
            <div class="border-t border-gray-200">
              <div class="grid grid-cols-3 divide-x divide-gray-200">
                <div class="p-4 text-center">
                  <span class="block text-2xl font-bold text-gray-800">12</span>
                  <span class="text-xs text-gray-500">Listings</span>
                </div>
                <div class="p-4 text-center">
                  <span class="block text-2xl font-bold text-gray-800">254</span>
                  <span class="text-xs text-gray-500">Views</span>
                </div>
                <div class="p-4 text-center">
                  <span class="block text-2xl font-bold text-gray-800">18</span>
                  <span class="text-xs text-gray-500">Favorites</span>
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
          <div class="bg-white rounded-lg shadow-md mt-6">
            <div class="border-b border-gray-200 p-4 flex items-center justify-between">
              <h2 class="text-lg font-semibold text-gray-800">Notifications</h2>
              <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">3 New</span>
            </div>
            <div class="p-4">
              <div class="divide-y divide-gray-200">
                <!-- Notification Item -->
                <div class="py-3 flex items-start">
                  <div class="flex-shrink-0 pt-1">
                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm text-gray-800">Ahmed is interested in your "MacBook Pro" listing.</p>
                    <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                  </div>
                </div>
                
                <!-- Notification Item -->
                <div class="py-3 flex items-start">
                  <div class="flex-shrink-0 pt-1">
                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm text-gray-800">Your listing "Toyota Corolla" is about to expire.</p>
                    <p class="text-xs text-gray-500 mt-1">12 hours ago</p>
                  </div>
                </div>
                
                <!-- Notification Item -->
                <div class="py-3 flex items-start">
                  <div class="flex-shrink-0 pt-1">
                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm text-gray-800">JOTEA Monthly Newsletter: Discover April's best deals!</p>
                    <p class="text-xs text-gray-500 mt-1">1 day ago</p>
                  </div>
                </div>
                
                <!-- Notification Item -->
                <div class="py-3 flex items-start">
                  <div class="flex-shrink-0 pt-1">
                    <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm text-gray-600">Your account has been verified successfully.</p>
                    <p class="text-xs text-gray-500 mt-1">3 days ago</p>
                  </div>
                </div>
              </div>
              
              <button class="w-full mt-3 text-center text-sm text-blue-500 hover:text-blue-700 font-medium">
                View All Notifications
              </button>
            </div>
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


