@extends('layouts.company')
@section('content')

<div class="w-full p-6 mx-auto">
  <form action="{{route('editprofile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
        <!-- Profile card -->
        <div class="col-span-1">
          <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl border border-gray-700/50 shadow-2xl overflow-hidden backdrop-blur-sm relative">
            <div class="h-48 bg-gradient-to-r from-amber-500/20 to-purple-600/20 relative overflow-hidden">
              <img class="w-full h-full object-cover opacity-60 filter" src="../assets/img/cover-photo.jpg" alt="profile cover">
              <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
            </div>
            
            <div class="flex justify-center -mt-16 relative z-10">
              <div class="relative group">
                <div class="h-32 w-32 rounded-full bg-gradient-to-br from-amber-500 to-amber-600 p-1 shadow-xl">
                  <img class="h-full w-full rounded-full border-4 border-gray-900 object-cover" 
                       src="{{$user->photo}}" alt="{{$user->name}}">
                </div>
                
                <label for="photo-upload" class="absolute bottom-0 right-1 bg-gray-800 rounded-full h-9 w-9 flex items-center justify-center cursor-pointer border-2 border-amber-500 hover:bg-gray-700 transition-colors shadow-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                  </svg>
                  <input id="photo-upload" name="photo" type="file" accept="image/*" class="hidden">
                </label>
              </div>
            </div>
            
            <div class="text-center px-6 pt-3 pb-8">
              <h3 class="text-white text-xl font-bold">{{$user->name}}</h3>
              <p class="text-amber-400 text-sm mt-1">Enterprise Account</p>
              <p class="text-gray-400 text-sm mt-3 mb-2">Member since {{ \Carbon\Carbon::parse($user->created_at)->format('M Y') }}</p>
              
              <div class="mt-5 flex justify-center space-x-2">
                <a href="#" class="text-gray-400 hover:text-amber-400 transition-colors p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                  </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-amber-400 transition-colors p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                  </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-amber-400 transition-colors p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          
          <!-- Activity Section -->
          <div class="mt-6 bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl border border-gray-700/50 shadow-2xl p-6">
            <h4 class="text-white text-md font-bold mb-4 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
              Activity
            </h4>
            
            <div class="space-y-3">
              <div class="flex items-center justify-between py-2 border-b border-gray-700/50">
                <div class="text-sm text-gray-400">Total Annonces</div>
                <div class="text-sm font-semibold text-white">{{ $user->annonces->count() ?? 0 }}</div>
              </div>
              
              <div class="flex items-center justify-between py-2 border-b border-gray-700/50">
                <div class="text-sm text-gray-400">Active Annonces</div>
                <div class="text-sm font-semibold text-white">{{ $user->annonces->where('status', 'published')->count() ?? 0 }}</div>
              </div>
              
              <div class="flex items-center justify-between py-2">
                <div class="text-sm text-gray-400">Last Login</div>
                <div class="text-sm font-semibold text-white">{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</div>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Form -->
        <div class="col-span-2">
          <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl border border-gray-700/50 shadow-2xl p-8 mb-6">
            <h2 class="text-amber-400 text-xl font-bold mb-1">Edit Profile</h2>
            <p class="text-gray-400 text-sm mb-6">Update your personal information</p>
            
            @if(session('success'))
              <div class="mb-6 flex items-center py-3 px-4 rounded-lg bg-green-500/10 border border-green-500/30">
                <svg class="flex-shrink-0 w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-3 text-sm text-green-400">{{ session('success') }}</span>
              </div>
            @endif
            
            @if($errors->any())
              <div class="mb-6 flex items-center py-3 px-4 rounded-lg bg-red-500/10 border border-red-500/30">
                <svg class="flex-shrink-0 w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-3 text-sm text-red-400">Please correct the errors below</span>
              </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Name -->
              <div class="space-y-2">
                <label class="flex items-center text-gray-300 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  Name
                </label>
                <input type="text" name="username" value="{{$user->name}}" 
                  class="w-full px-4 py-3 bg-gray-800/60 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" />
                @error('username')
                  <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <!-- Email -->
              <div class="space-y-2">
                <label class="flex items-center text-gray-300 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                  Email address
                </label>
                <input type="email" name="email" value="{{$user->email}}" 
                  class="w-full px-4 py-3 bg-gray-800/60 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" />
                @error('email')
                  <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <!-- Address -->
              <div class="md:col-span-2 space-y-2">
                <label class="flex items-center text-gray-300 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  Address
                </label>
                <input type="text" name="address" value="{{$user->address}}" 
                  class="w-full px-4 py-3 bg-gray-800/60 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" />
                @error('address')
                  <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <!-- Phone -->
              <div class="md:col-span-2 space-y-2">
                <label class="flex items-center text-gray-300 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                  Phone
                </label>
                <input type="text" name="phone" value="{{$user->phone}}" 
                  class="w-full px-4 py-3 bg-gray-800/60 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" />
                @error('phone')
                  <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          
          <!-- Password Section -->
          <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl border border-gray-700/50 shadow-2xl p-8">
            <h2 class="text-amber-400 text-xl font-bold mb-1">Security</h2>
            <p class="text-gray-400 text-sm mb-6">Update your password</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- New Password -->
              <div class="space-y-2">
                <label class="flex items-center text-gray-300 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                  New Password
                </label>
                <div class="relative">
                  <input type="password" name="password" 
                    class="w-full px-4 py-3 bg-gray-800/60 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" />
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </div>
                </div>
                @error('password')
                  <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <!-- Confirm Password -->
              <div class="space-y-2">
                <label class="flex items-center text-gray-300 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                  Confirm Password
                </label>
                <input type="password" name="password_confirmation" 
                  class="w-full px-4 py-3 bg-gray-800/60 text-white rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" />
              </div>
            </div>
      
            <!-- Submit Button -->
            <div class="mt-8 flex justify-end">
              <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white font-medium text-sm rounded-lg shadow-lg hover:shadow-amber-500/25 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Save Changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  // Preview uploaded image
  document.getElementById('photo-upload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const profileImg = event.target.closest('.relative').querySelector('img');
        profileImg.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
  
  // Toggle password visibility
  document.querySelectorAll('.relative svg').forEach(icon => {
    icon.addEventListener('click', function() {
      const passwordInput = this.closest('.relative').querySelector('input');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        this.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
      } else {
        passwordInput.type = 'password';
        this.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
      }
    });
  });
</script>

@endsection