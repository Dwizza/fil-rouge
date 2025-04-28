@extends('layouts.app')
@section('dashboard.admin')

<div class="flex flex-wrap">
  <div class="flex-none w-full max-w-full px-0">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-gray-900/95 border-0 border-transparent border-solid shadow-2xl rounded-2xl bg-clip-border backdrop-blur-xl backdrop-saturate-200">
      <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
        <h6 class="text-white text-xl font-bold tracking-tight mb-2 flex items-center">
          <svg class="w-6 h-6 mr-2 text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
          </svg>
          Annonces
        </h6>
        <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow">
          Administration
        </span>
      </div>
      <div class="flex-auto p-0 pt-0 pb-2">
        <div class="relative flex flex-col min-w-0 break-words bg-gray-800/50 shadow-2xl rounded-xl bg-clip-border border border-gray-700/30 backdrop-blur">
          <div class="flex-auto px-0 pt-5 pb-2">
              <!-- Search Form -->
              <div class="flex items-center px-6 py-4 mb-4">
                  <form action="{{ request()->url() }}" method="GET" class="w-full">
                      <div class="relative flex-grow">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                              </svg>
                          </div>
                          <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-800/80 border-gray-700/50 text-gray-100 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out shadow-inner" placeholder="Search by title, category, price or username...">
                          <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                              <button type="submit" class="focus:outline-none focus:shadow-outline">
                                  <span class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 py-2 px-4 text-xs rounded-lg inline-flex items-center justify-center font-bold text-white transition duration-300 ease-in-out hover:shadow-lg shadow-md">
                                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                      </svg>
                                      Search
                                  </span>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
              
              <!-- Table Content -->
              <div class="p-0 overflow-x-auto px-1">
                <table class="items-center w-full mb-0 align-top border-collapse border-gray-700/50 text-gray-200 rounded-xl overflow-hidden">
                  <thead class="align-bottom">
                    <tr>
                      <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[25%]">Title</th>
                      <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[15%]">Category</th>
                      <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[10%]">Price</th>
                      <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[20%]">Username</th>
                      <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[15%]">Status</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[15%]">Action</th>
                    </tr>
                  </thead>
                  <tbody class="border-t">
                    @forelse ($annonces as $annonce)
                    <tr class="hover:bg-gray-700/10 transition-colors duration-200">
                      <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent">
                        <div class="flex px-2 py-1">
                          @php
                              $images = explode(',', $annonce->image);
                          @endphp
      
                          <div class="relative w-16 h-16 mr-4 rounded-xl overflow-hidden shadow-lg border border-indigo-500/30 group" onmouseenter="startSlideshow(this)" onmouseleave="stopSlideshow(this)" data-images='@json($images)'>
                            <img src="{{ asset($images[0]) }}" class="w-full h-full object-cover transition-all duration-500 image-slide" alt="annonce image" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                          </div>
      
                          <div class="my-auto max-w-[calc(100%-5rem)]">
                            <h6 class="mb-0 text-sm leading-normal text-white font-medium truncate"><a href="/annonceDetails/{{$annonce->id}}">{{$annonce->title}}</a></h6>
                            <p class="mb-0 text-xs leading-tight text-gray-400 mt-1">ID: #{{$annonce->id}}</p>
                          </div>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent">
                        <span class="bg-indigo-900/30 text-indigo-300 text-xs px-2.5 py-1 rounded-md font-semibold">{{$annonce->category->name}}</span>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent">
                        <span class="text-sm font-semibold leading-tight text-green-400">{{$annonce->price}}$</span>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent">
                        <div class="flex items-center">
                          <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center text-white mr-2 shadow-md border border-gray-700/40">
                            <span class="text-xs font-medium">{{substr($annonce->user->name, 0, 1)}}</span>
                          </div>
                          <span class="text-xs font-medium leading-tight text-gray-200">{{$annonce->user->name}}</span>
                        </div>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent">
                        @if ($annonce->status == 'published')
                          <span class="bg-gradient-to-r from-green-600 to-emerald-500 px-3 py-1.5 text-xs rounded-full inline-flex items-center justify-center font-bold uppercase tracking-wider text-white shadow-lg hover:shadow-green-500/20 transition-all duration-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                            Published
                          </span>
                        @elseif ($annonce->status == 'draft')
                          <span class="bg-gradient-to-r from-amber-500 to-yellow-400 px-3 py-1.5 text-xs rounded-full inline-flex items-center justify-center font-bold uppercase tracking-wider text-white shadow-lg hover:shadow-amber-500/20 transition-all duration-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                            Draft
                          </span>
                        @elseif ($annonce->status == 'archived')
                          <span class="bg-gradient-to-r from-red-600 to-rose-500 px-3 py-1.5 text-xs rounded-full inline-flex items-center justify-center font-bold uppercase tracking-wider text-white shadow-lg hover:shadow-red-500/20 transition-all duration-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM4 8a1 1 0 011-1h6a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            Archived
                          </span>
                        @endif
                          
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b text-center border-gray-700/20 whitespace-nowrap shadow-transparent">
                        <a href="javascript:void(0);" onclick="openModal('{{ $annonce->id }}', '{{ $annonce->status }}')" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 p-0.5 rounded-lg inline-block shadow-md hover:shadow-indigo-500/20 transition-all duration-300 hover:scale-105">
                          <span class="bg-gray-900 text-gray-100 py-1.5 px-3 text-xs rounded-md inline-flex items-center justify-center font-medium">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Status
                          </span>
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="p-6 text-center">
                        <div class="flex flex-col items-center justify-center py-8">
                          <svg class="w-16 h-16 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                          <p class="text-gray-400 text-lg font-medium">No announcements found</p>
                          <p class="text-gray-500 text-sm mt-1">Try a different search term or check back later.</p>
                        </div>
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              
              <!-- Pagination -->
              <div class="px-6 py-4">
                  @if($annonces->hasPages())
                  <div class="mt-4">
                      <div class="flex items-center justify-between border-t border-gray-700/30 pt-4">
                        <!-- Page info -->
                        <div>
                          <p class="text-sm text-gray-400">
                            Showing <span class="font-medium text-indigo-300">{{ $annonces->firstItem() ?? 0 }}</span> to <span class="font-medium text-indigo-300">{{ $annonces->lastItem() ?? 0 }}</span> of <span class="font-medium text-indigo-300">{{ $annonces->total() }}</span> results
                          </p>
                        </div>
                        
                        <!-- Desktop Pagination -->
                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-end">
                          <nav class="isolate inline-flex -space-x-px rounded-md shadow-lg" aria-label="Pagination">
                            <!-- Previous Page Link -->
                            @if ($annonces->onFirstPage())
                              <span class="relative inline-flex items-center px-2 py-2 text-gray-400 bg-gray-800/80 border border-gray-700/50 cursor-not-allowed rounded-l-lg">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                              </span>
                            @else
                              <a href="{{ $annonces->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-gray-300 bg-gray-800/80 border border-gray-700/50 rounded-l-lg hover:bg-gray-700/80 transition-colors duration-200">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            @endif
                            
                            <!-- Pagination Elements -->
                            @php
                                $start = max($annonces->currentPage() - 2, 1);
                                $end = min($start + 4, $annonces->lastPage());
                                $start = max(min($start, $end - 4), 1);
                            @endphp
                            
                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i == $annonces->currentPage())
                                  <span aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-blue-600 border border-indigo-500">
                                    {{ $i }}
                                  </span>
                                @else
                                  <a href="{{ $annonces->url($i) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-800/80 border border-gray-700/50 hover:bg-gray-700/80 hover:text-white transition-colors duration-200">
                                    {{ $i }}
                                  </a>
                                @endif
                            @endfor
                            
                            <!-- Next Page Link -->
                            @if ($annonces->hasMorePages())
                              <a href="{{ $annonces->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-gray-300 bg-gray-800/80 border border-gray-700/50 rounded-r-lg hover:bg-gray-700/80 transition-colors duration-200">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            @else
                              <span class="relative inline-flex items-center px-2 py-2 text-gray-400 bg-gray-800/80 border border-gray-700/50 cursor-not-allowed rounded-r-lg">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                              </span>
                            @endif
                          </nav>
                        </div>
                        
                        <!-- Mobile Pagination -->
                        <div class="flex items-center justify-between sm:hidden">
                          <div class="flex w-0 flex-1 justify-start">
                            @if ($annonces->onFirstPage())
                              <span class="relative inline-flex items-center rounded-md border border-gray-700/50 bg-gray-800/80 px-4 py-2 text-sm font-medium text-gray-400 cursor-not-allowed">
                                Previous
                              </span>
                            @else
                              <a href="{{ $annonces->previousPageUrl() }}" class="relative inline-flex items-center rounded-md border border-gray-700/50 bg-gray-800/80 px-4 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700/80 transition-colors duration-200">
                                Previous
                              </a>
                            @endif
                          </div>
                          <div class="text-sm text-indigo-300 font-medium">
                            <span>{{ $annonces->currentPage() }}</span> / <span>{{ $annonces->lastPage() }}</span>
                          </div>
                          <div class="flex w-0 flex-1 justify-end">
                            @if ($annonces->hasMorePages())
                              <a href="{{ $annonces->nextPageUrl() }}" class="relative inline-flex items-center rounded-md border border-gray-700/50 bg-gray-800/80 px-4 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700/80 transition-colors duration-200">
                                Next
                              </a>
                            @else
                              <span class="relative inline-flex items-center rounded-md border border-gray-700/50 bg-gray-800/80 px-4 py-2 text-sm font-medium text-gray-400 cursor-not-allowed">
                                Next
                              </span>
                            @endif
                          </div>
                        </div>
                      </div>
                  </div>
                  @endif
              </div>
              
              <!-- Clear search results if a search was performed -->
              @if(!empty($search))
              <div class="px-6 pb-4">
                  <a href="{{ request()->url() }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-700/20 to-red-700/20 border border-red-500/50 rounded-md text-sm text-red-400 hover:from-pink-700/30 hover:to-red-700/30 transition-colors duration-200">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                      Clear Search
                  </a>
              </div>
              @endif
          </div>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="statusModal" class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
  <div id="modalContent" class="bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-700/50 rounded-xl w-full max-w-md p-6 shadow-2xl relative transform scale-95 opacity-0 transition-all duration-300">
    <div class="flex justify-between items-center mb-4 border-b border-gray-700/50 pb-3">
      <h2 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Update Status</h2>
      <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 text-xl transition-colors duration-200">&times;</button>
    </div>
    <form id="statusForm" method="POST">
      @csrf
      <input type="hidden" id="annonce_id" name="annonce_id">
      <div class="mb-5">
        <label for="statusSelect" class="block mb-2 text-sm font-medium text-gray-300">Status</label>
        <select id="statusSelect" name="status" class="w-full p-3 border bg-gray-800/80 border-gray-600 rounded-lg text-gray-200 focus:ring-indigo-500 focus:border-indigo-500 shadow-inner">
          <option value="draft">Draft</option>
          <option value="published">Published</option>
          <option value="archived">Archived</option>
        </select>
      </div>
      <div class="flex justify-end pt-3 border-t border-gray-700/50">
        <button type="button" onclick="closeModal()" class="mr-2 px-5 py-2 text-sm bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors duration-200">Cancel</button>
        <button type="submit" class="px-5 py-2 text-sm bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg hover:from-indigo-500 hover:to-blue-500 transform transition-all hover:scale-105 shadow-lg hover:shadow-indigo-500/20 focus:ring-2 focus:ring-indigo-500/50">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<!-- Toast -->
<div id="toast" class="fixed top-6 right-6 z-50 hidden p-4 rounded-xl shadow-lg bg-gradient-to-r from-green-600 to-emerald-500 text-white text-sm font-semibold transition-all duration-500 transform translate-y-[-20px] opacity-0 backdrop-blur">
  <div class="flex items-center">
    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    <span>Status updated successfully!</span>
  </div>
</div>

<script>
  let slideshowInterval;

  function startSlideshow(container) {
      const images = JSON.parse(container.getAttribute('data-images'));
      let currentIndex = 0;
      const imgElement = container.querySelector('.image-slide');

      if (images.length <= 1) return;

      slideshowInterval = setInterval(() => {
          currentIndex = (currentIndex + 1) % images.length;
          imgElement.src = '/' + images[currentIndex];
      }, 1000); // change image every 1s
  }

  function stopSlideshow(container) {
      clearInterval(slideshowInterval);
      const images = JSON.parse(container.getAttribute('data-images'));
      const imgElement = container.querySelector('.image-slide');
      imgElement.src = '/' + images[0]; // back to first image
  }
</script>

<script>
  function openModal(annonceId, currentStatus) {
    const modal = document.getElementById('statusModal');
    const content = document.getElementById('modalContent');

    modal.classList.remove('hidden');
    setTimeout(() => {
      content.classList.remove('scale-95', 'opacity-0');
      content.classList.add('scale-100', 'opacity-100');
    }, 10);

    document.getElementById('annonce_id').value = annonceId;
    document.getElementById('statusSelect').value = currentStatus;
    document.getElementById('statusForm').action = `/admin/annonces/${annonceId}`;
  }

  function closeModal() {
    const modal = document.getElementById('statusModal');
    const content = document.getElementById('modalContent');

    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
      modal.classList.add('hidden');
    }, 300);
  }

  function showToast(message = '✅ Status updated!') {
    const toast = document.getElementById('toast');
    toast.querySelector('span').textContent = message;
    toast.classList.remove('hidden', 'translate-y-[-20px]', 'opacity-0');
    toast.classList.add('translate-y-0', 'opacity-100');

    setTimeout(() => {
      toast.classList.remove('translate-y-0', 'opacity-100');
      toast.classList.add('translate-y-[-20px]', 'opacity-0');
    }, 3000);

    setTimeout(() => {
      toast.classList.add('hidden');
    }, 3500);
  }

  // Show toast after submit
  document.getElementById('statusForm').addEventListener('submit', function () {
    showToast("Status saved successfully!");
  });
</script>

@endsection