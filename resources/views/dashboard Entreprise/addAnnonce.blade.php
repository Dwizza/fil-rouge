@extends('layouts.company')
@section('dashboard.company')

<div class="container mx-auto p-8 rounded-xl shadow-2xl bg-gradient-to-br from-gray-50 to-white">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
        Add annonce
    </h1>
    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                Title:
            </label>
            <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3 px-4" id="title" name="title" placeholder="Cozy Apartment in Downtown" required>
        </div>
        <div>
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                Description:
            </label>
            <textarea class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3 px-4" id="description" name="description" rows="4" placeholder="Describe the property" required></textarea>
        </div>
        <div>
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                Price:
            </label>
            <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">$</span>
                </div>
                <input type="text" id="price" name="price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-3 px-4" placeholder="2000" required>
                <div class="absolute inset-y-0 right-0 flex items-center">
                    <label for="currency" class="sr-only">Currency</label>
                    <select id="currency" name="currency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                        <option>USD</option>
                        <option>EUR</option>
                        <option>GBP</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                Category:
            </label>
            <div class="relative">
                <select class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3 px-4" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <label for="localisation" class="block text-gray-700 text-sm font-bold mb-2">
                Location:
            </label>
            <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3 px-4" id="localisation" name="localisation" placeholder="New York, NY" required>
        </div>
        <div>
            <label for="photos" class="block text-gray-700 text-sm font-bold mb-2">
            Photos:
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L40 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload files</span>
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
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Add annonce
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