@extends('layouts.particulier')
@section('content')


<div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 bg-white z-10">
    <h3 class="text-xl font-bold text-gray-800">Edit Annonce</h3>
    <button id="closeEditAnnonceModal" class="text-gray-500 hover:text-gray-700">
      <i class="ti-close text-xl"></i>
    </button>
  </div>
  
  <div class="p-6">
    <form id="editAnnonceForm" method="POST" enctype="multipart/form-data" action="{{route('user.annonces.update', $annonce->id)}}">
      @csrf
      
      <!-- Category Selection -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_category">
          Category <span class="text-red-500">*</span>
        </label>
        <select id="edit_category" name="category_id" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <option value="">Select a category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}" {{ $annonce->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      
      <!-- Title -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_title">
          Title <span class="text-red-500">*</span>
        </label>
        <input type="text" id="edit_title" name="title" value="{{ $annonce->title }}" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter a descriptive title...">
      </div>
      
      <!-- Description -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_description">
          Description <span class="text-red-500">*</span>
        </label>
        <textarea id="edit_description" name="description" rows="4" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Describe your item or service in detail...">{{ $annonce->description }}</textarea>
      </div>
      
      <!-- Price -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_price">
          Price <span class="text-red-500">*</span>
        </label>
        <div class="flex items-center">
          <input type="number" id="edit_price" name="price" value="{{ $annonce->price }}" class="shadow-sm border border-gray-300 rounded-l-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="0">
          <span class="bg-gray-100 px-4 py-2 rounded-r-md border border-l-0 border-gray-300 text-gray-700 font-medium">DH</span>
        </div>
      </div>
      
      <!-- Location -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_location">
          Location <span class="text-red-500">*</span>
        </label>
        <input type="text" id="edit_location" name="location" value="{{ $annonce->location }}" class="shadow-sm border border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="your location...">
      </div>
      
      <!-- Photos -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">
          Photos
        </label>
        
        <!-- Upload New Photos -->
        <div id="dropzone" class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center">
          <div class="mb-3">
            <i class="ti-cloud-up text-gray-400 text-4xl"></i>
          </div>
          <p class="text-gray-700 mb-2">Drag & drop new photos here</p>
          <p class="text-xs text-gray-500">or</p>
          <div class="mt-2">
            <label for="editFileUpload" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md cursor-pointer inline-block transition-colors">
              Browse Files
            </label>
            <input id="editFileUpload" name="image[]" type="file" multiple class="hidden">
          </div>
          <p class="text-xs text-gray-500 mt-3">Upload up to 2 photos. First image will be the cover (maximum 5MB each)</p>
        </div>
        
        <!-- Current Images Display -->
        @php
          $images = !empty($annonce->image) ? explode(',', $annonce->image) : [];
        @endphp
        
        <div id="existing-photos" class="mt-4 flex flex-wrap gap-4">
          @foreach ($images as $image)
            <div class="relative group image-wrapper" data-image="{{ $image }}">
              <img src="/{{ $image }}" class="w-24 h-24 object-cover rounded-lg shadow">
              <button type="button" class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition"
                onclick="removeImage(this, '{{ $image }}')">
                ×
              </button>
              <input type="hidden" name="remaining_images[]" value="{{ $image }}">
            </div>
          @endforeach
        </div>
        
        <!-- New Image Previews -->
        <div id="preview" class="mt-4 flex flex-wrap gap-4">
          <!-- Image previews will be displayed here -->
        </div>
        
      </div>
      
      <!-- Submit Buttons -->
      <div class="flex items-center justify-end space-x-4 border-t border-gray-200 pt-6">
        <button type="button" id="cancelEditAnnonceBtn" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
          Cancel
        </button>
        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-amber-300 to-amber-700 hover:from-amber-400 hover:to-amber-800 text-white rounded-md shadow-sm transition-colors">
          Update Annonce
        </button>
      </div>
    </form>
  </div>
  
  <script>
    const input = document.getElementById('editFileUpload');
    const dropzone = document.getElementById('dropzone');
    const preview = document.getElementById('preview');
  
    // Handle file selection
    input.addEventListener('change', (e) => {
      handleFiles(e.target.files);
    });
  
    // Drag and drop
    dropzone.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropzone.classList.add('border-blue-400');
    });
  
    dropzone.addEventListener('dragleave', () => {
      dropzone.classList.remove('border-blue-400');
    });
  
    dropzone.addEventListener('drop', (e) => {
      e.preventDefault();
      dropzone.classList.remove('border-blue-400');
      handleFiles(e.dataTransfer.files);
    });
  
    // Handle preview
    function handleFiles(files) {
      Array.from(files).forEach(file => {
        if (!file.type.match('image.*') || file.size > 5 * 1024 * 1024) {
          alert('Only image files up to 5MB allowed');
          return;
        }
  
        const reader = new FileReader();
        reader.onload = (e) => {
          const container = document.createElement('div');
          container.className = 'relative group';
  
          const img = document.createElement('img');
          img.src = e.target.result;
          img.className = 'w-24 h-24 object-cover rounded-lg shadow';
  
          const removeBtn = document.createElement('button');
          removeBtn.innerHTML = '×';
          removeBtn.className = 'absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition';
          removeBtn.addEventListener('click', () => {
            preview.removeChild(container);
          });
  
          container.appendChild(img);
          container.appendChild(removeBtn);
          preview.appendChild(container);
        };
        reader.readAsDataURL(file);
      });
    }
    
    function removeImage(button, imageName) {
      const wrapper = button.closest('.image-wrapper');
      wrapper.remove(); // remove image preview and input from DOM
      
      // You can add additional code here to track deleted images if needed
      // For example, you could add a hidden input to track deleted images:
      const deletedInput = document.createElement('input');
      deletedInput.type = 'hidden';
      deletedInput.name = 'deleted_images[]';
      deletedInput.value = imageName;
      document.getElementById('editAnnonceForm').appendChild(deletedInput);
    }
  </script>
@endsection