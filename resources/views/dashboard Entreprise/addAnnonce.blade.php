@extends('layouts.company')
@section('dashboard.company')

<div class="container mx-auto p-8 rounded-xl shadow-2xl bg-gradient-to-br from-blue-50 to-blue-100">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
        Add Annonce
    </h1>
    <form action="{{ route('addannonce') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6 bg-white rounded-xl shadow-md">
        @csrf
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input id="title" name="title" type="text" placeholder="e.g., Modern Loft Apartment" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="number" name="price" id="price" placeholder="Enter amount" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="currency" name="currency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                            <option>USD</option>
                            <option>EUR</option>
                            <option>GBP</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <div class="mt-1">
                <textarea id="description" name="description" rows="3" placeholder="Describe the property details" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <div class="mt-1">
                    <select id="category_id" name="category_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <div class="mt-1">
                    <input type="text" name="location" id="localisation" placeholder="City, State" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">
                Photos
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-md border-indigo-300">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-indigo-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L40 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input id="photos" name="photos[]" type="file" class="sr-only" multiple>
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>
        </div>

        <div id="image-preview" class="mt-4 flex flex-wrap gap-4">
            <!-- Image previews will be displayed here -->
        </div>

        <div>
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <!-- Heroicon name: solid/mail -->
                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M3 4a2 2 0 00-2 2v1.111a2 2 0 002.053 1.707l5.333.667a2 2 0 011.228 1.228l.667 5.333A2 2 0 009.889 18H16a2 2 0 002-2V6a2 2 0 00-2-2H3z" />
                    </svg>
                </span>
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