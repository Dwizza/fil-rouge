@extends('layouts.company')
@section('dashboard.company')

<div class="container mx-auto w-[1000px] p-8 rounded-xl shadow-2xl bg-white bg-opacity-20">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
        Add Annonce
    </h1>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    
    @endif
    <form action="{{ route('addannonce') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6 bg-gray-800 rounded-2xl shadow-xl max-w-4xl mx-auto">
        @csrf
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-200">Title</label>
                <div class="mt-1">
                    <input id="title" name="title" type="text" placeholder="e.g., Modern Loft Apartment" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-600 rounded-xl p-3 bg-gray-700 text-white placeholder-gray-400">
                </div>
            </div>
    
            <div>
                <label for="price" class="block text-sm font-medium text-gray-200">Price</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-400 sm:text-sm">$</span>
                    </div>
                    <input type="number" name="price" id="price" placeholder="Enter amount" required class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-600 rounded-xl p-3 bg-gray-700 text-white placeholder-gray-400">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="currency" name="currency" class="focus:ring-blue-500 focus:border-blue-500 h-full py-0 pl-2 pr-7 border-transparent bg-gray-700 text-gray-300 sm:text-sm rounded-xl">
                            <option>USD</option>
                            <option>EUR</option>
                            <option>GBP</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    
        <div>
            <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
            <div class="mt-1">
                <textarea id="description" name="description" rows="3" placeholder="Describe the property details" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-600 rounded-xl p-3 bg-gray-700 text-white placeholder-gray-400"></textarea>
            </div>
        </div>
    
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-200">Category</label>
                <div class="mt-1">
                    <select id="category_id" name="category_id" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-600 rounded-xl p-3 bg-gray-700 text-white">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div>
                <label for="location" class="block text-sm font-medium text-gray-200">Location</label>
                <div class="mt-1">
                    <input type="text" name="location" id="location" placeholder="City, State" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-600 rounded-xl p-3 bg-gray-700 text-white placeholder-gray-400">
                </div>
            </div>
        </div>
    
        <div>
            <label class="block text-sm font-medium text-gray-200">Photos</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-xl border-gray-500 bg-gray-700">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-blue-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L40 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="flex text-sm text-gray-300">
                        <label for="photos" class="relative cursor-pointer bg-gray-800 rounded-md font-medium text-blue-400 hover:text-blue-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <span>Upload a file</span>
                            <input id="photos" name="image[]" type="file" class="sr-only" multiple>
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-400">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
        </div>
    
        <div id="image-preview" class="mt-4 flex flex-wrap gap-4">
            <!-- Image previews will be displayed here -->
        </div>
    
        <div>
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Add Annonce
            </button>
        </div>
    </form>
    
</div>

<script>
    document.getElementById('photos').addEventListener('change', function(event) {
    const previewContainer = document.getElementById('image-preview');
    // previewContainer.innerHTML = ''; // Clear existing previews

    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
        const image = document.createElement('img');
        image.src = e.target.result;
        image.classList.add('h-20', 'w-16', 'object-cover', 'rounded'); // Tailwind classes for styling

        previewContainer.appendChild(image);
        }

        reader.readAsDataURL(file);
    }
    });
</script>
@endsection