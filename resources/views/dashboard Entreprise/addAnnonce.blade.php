@extends('layouts.company')
@section('content')

<div class="container mx-auto max-w-5xl p-6">
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-2xl border border-gray-700/50 backdrop-blur-sm overflow-hidden">
        <div class="p-6 border-b border-gray-700/50">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-400 to-amber-600">
                Add Annonce
            </h1>
            <p class="text-gray-400 text-sm mt-1">Create a new listing that will be visible to all users</p>
        </div>

        @if (session('success'))
            <div class="mx-6 mt-6 flex items-center p-4 rounded-lg bg-green-500/10 border border-green-500/30" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium text-green-400">
                    {{ session('success') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-500/10 hover:bg-green-500/20 rounded-lg p-1.5 inline-flex h-8 w-8 text-green-400" data-dismiss-target="#alert">
                    <span class="sr-only">Close</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @elseif (session('error'))
            <div class="mx-6 mt-6 flex items-center p-4 rounded-lg bg-red-500/10 border border-red-500/30" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium text-red-400">
                    {{ session('error') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-500/10 hover:bg-red-500/20 rounded-lg p-1.5 inline-flex h-8 w-8 text-red-400">
                    <span class="sr-only">Close</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        <form action="{{ route('addannonce') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-8">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="title" class="text-sm font-medium text-gray-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Title
                    </label>
                    <div class="relative">
                        <input id="title" name="title" type="text" placeholder="e.g., Modern Loft Apartment" required 
                            class="w-full rounded-lg border border-gray-600 bg-gray-700/50 px-4 py-3 text-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-500/20 placeholder:text-gray-500">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                </div>
    
                <div class="space-y-2">
                    <label for="price" class="text-sm font-medium text-gray-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Price
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <span class="text-gray-400">$</span>
                        </div>
                        <input type="number" name="price" id="price" placeholder="Enter amount" required 
                            class="w-full rounded-lg border border-gray-600 bg-gray-700/50 pl-8 pr-20 py-3 text-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-500/20 placeholder:text-gray-500">
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <select id="currency" name="currency" 
                                class="h-full rounded-r-lg border-0 bg-transparent py-0 pl-2 pr-7 text-gray-400 focus:ring-0">
                                <option>USD</option>
                                <option>EUR</option>
                                <option>GBP</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="space-y-2">
                <label for="description" class="text-sm font-medium text-gray-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Description
                </label>
                <div class="relative">
                    <textarea id="description" name="description" rows="4" placeholder="Describe the property details" required 
                        class="w-full rounded-lg border border-gray-600 bg-gray-700/50 px-4 py-3 text-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-500/20 placeholder:text-gray-500"></textarea>
                </div>
            </div>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="category_id" class="text-sm font-medium text-gray-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Category
                    </label>
                    <div class="relative">
                        <select id="category_id" name="category_id" class="w-full rounded-lg border border-gray-600 bg-gray-700/50 px-4 py-3 text-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-500/20 appearance-none">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
    
                <div class="space-y-2">
                    <label for="location" class="text-sm font-medium text-gray-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Location
                    </label>
                    <div class="relative">
                        <input type="text" name="location" id="location" placeholder="City, State" required 
                            class="w-full rounded-lg border border-gray-600 bg-gray-700/50 px-4 py-3 text-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-500/20 placeholder:text-gray-500">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Photos
                </label>
                <!-- Drop Zone -->
                <div id="dropzone" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-500 hover:border-amber-500 rounded-xl bg-gray-800/50 transition-all cursor-pointer group">
                    <div class="space-y-2 text-center">
                        <svg class="mx-auto h-14 w-14 text-gray-400 group-hover:text-amber-400 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L40 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-400 justify-center">
                            <label for="photos" class="relative cursor-pointer bg-gray-700 rounded-lg font-medium text-amber-400 hover:text-amber-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500 px-4 py-2.5 transition-colors">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    Upload files
                                </span>
                                <input id="photos" name="image[]" type="file" class="sr-only" multiple>
                            </label>
                            <p class="pl-2 pt-2.5 text-gray-400">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-400">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                
                <!-- Preview Area -->
                <div id="preview" class="mt-5 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4"></div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full px-6 py-3.5 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white font-medium rounded-lg shadow-lg hover:shadow-amber-500/25 transition-all duration-300 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Annonce
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    const input = document.getElementById('photos');
    const dropzone = document.getElementById('dropzone');
    const preview = document.getElementById('preview');
  
    // Handle file selection
    input.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });
  
    // Drag and drop
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('border-amber-500');
        dropzone.classList.add('bg-gray-700/30');
    });
  
    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('border-amber-500');
        dropzone.classList.remove('bg-gray-700/30');
    });
  
    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('border-amber-500');
        dropzone.classList.remove('bg-gray-700/30');
        handleFiles(e.dataTransfer.files);
    });
  
    // Handle preview
    function handleFiles(files) {
        Array.from(files).forEach(file => {
            if (!file.type.match('image.*') || file.size > 10 * 1024 * 1024) {
                alert('Only image files up to 10MB allowed');
                return;
            }
    
            const reader = new FileReader();
            reader.onload = (e) => {
                const container = document.createElement('div');
                container.className = 'relative group rounded-lg overflow-hidden shadow-lg border border-gray-700 bg-gray-800 aspect-square';
    
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-full object-cover';
    
                const overlay = document.createElement('div');
                overlay.className = 'absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center';
    
                const removeBtn = document.createElement('button');
                removeBtn.className = 'bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center transform transition-transform hover:scale-110';
                removeBtn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                removeBtn.addEventListener('click', () => {
                    preview.removeChild(container);
                });
    
                overlay.appendChild(removeBtn);
                container.appendChild(img);
                container.appendChild(overlay);
                preview.appendChild(container);
            };
            reader.readAsDataURL(file);
        });
    }
    
    // Dismiss alerts automatically after 5 seconds
    document.addEventListener('DOMContentLoaded', () => {
        const alerts = document.querySelectorAll('[role="alert"]');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('opacity-0', 'scale-95');
                alert.style.transition = 'opacity 500ms, transform 500ms';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500);
            }, 5000);
        });
    });
</script>
  
@endsection