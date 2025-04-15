@extends('layouts.company')
@section('dashboard.company')

<div class="relative w-full mx-auto">
  </div>
  <form action="{{route('editprofile')}}" method="POST" class="bg-gray-900 min-h-screen py-10">
    @csrf
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Profile card -->
        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
          <img class="w-full h-48 object-cover" src="../assets/img/cover-photo.jpg" alt="profile cover">
          <div class="flex justify-center -mt-12">
            <img class="h-24 w-24 rounded-full border-4 border-gray-900 object-cover" src="{{$user->photo}}" alt="user">
          </div>
          <div class="text-center px-6 py-4">
            <h3 class="text-white text-lg font-semibold">{{$user->name}}</h3>
            <p class="text-gray-400 text-sm mt-1">Edit your profile information below</p>
          </div>
        </div>
  
        <!-- Form -->
        <div class="col-span-2 bg-gray-800 rounded-2xl shadow-xl p-8">
          <h2 class="text-white text-xl font-bold mb-6">Edit Profile</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
              <label class="block text-gray-300 text-sm font-semibold mb-2">Name</label>
              <input type="text" name="username" value="{{$user->name}}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" />
            </div>
  
            <!-- Email -->
            <div>
              <label class="block text-gray-300 text-sm font-semibold mb-2">Email address</label>
              <input type="email" name="email" value="{{$user->email}}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" />
            </div>
  
            <!-- Address -->
            <div class="md:col-span-2">
              <label class="block text-gray-300 text-sm font-semibold mb-2">Address</label>
              <input type="text" name="address" value="{{$user->address}}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" />
            </div>
  
            <!-- Phone -->
            <div class="md:col-span-2">
              <label class="block text-gray-300 text-sm font-semibold mb-2">Phone</label>
              <input type="text" name="phone" value="{{$user->phone}}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" />
            </div>
  
            <!-- New Password -->
            <div>
              <label class="block text-gray-300 text-sm font-semibold mb-2">New Password</label>
              <input type="password" name="password" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" />
            </div>
  
            <!-- Confirm Password -->
            <div>
              <label class="block text-gray-300 text-sm font-semibold mb-2">Confirm Password</label>
              <input type="password" name="password_confirmation" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" />
            </div>
          </div>
  
          <!-- Submit Button -->
          <div class="mt-8 text-right">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg shadow transition-all duration-200">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              Save Changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  

@endsection