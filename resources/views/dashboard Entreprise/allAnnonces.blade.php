@extends('layouts.company')
@section('dashboard.company')
<div class="flex flex-wrap">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-gray-800 border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="text-white">Annonces</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center justify-center w-full mb-0 align-top border-collapse border-white/40 text-gray-300">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap opacity-70">title</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap opacity-70">categories</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap opacity-70">price</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap opacity-70">username</th>
                  <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap opacity-70">Status</th>
                  <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-solid shadow-none border-white/40 text-white tracking-none whitespace-nowrap">action</th>
                </tr>
              </thead>
              <tbody class="border-t">
                @foreach ($annonces as $annonce)
                <tr class="h-16">
                  <td class="p-2 align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2">
                      @php
                          $images = explode(',', $annonce->image);
                      @endphp
  
                    <div class="relative w-16 h-16 mr-4 rounded-xl overflow-hidden shadow-lg border border-gray-200 group" onmouseenter="startSlideshow(this)" onmouseleave="stopSlideshow(this)" data-images='@json($images)'>
                      <img src="{{ asset($images[0]) }}" class="w-full h-full object-cover transition-all duration-500 image-slide" alt="annonce image" />
                    </div>
  
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm leading-normal text-white">{{$annonce->title}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-sm font-semibold leading-normal text-white opacity-80">{{$annonce->category->name}}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight text-white opacity-80">{{$annonce->price}}$</span>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight text-white opacity-80">{{$annonce->user->name}}</span>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                    @if ($annonce->status == 'published')
                      <span class="bg-gradient-to-tr from-green-600 to-emerald-400 px-3 py-1.5 text-xs rounded-full inline-flex items-center justify-center font-bold uppercase tracking-wider text-white shadow-md hover:shadow-lg transition-all duration-300">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                        Published
                      </span>
                    @elseif ($annonce->status == 'draft')
                      <span class="bg-gradient-to-tr from-amber-500 to-yellow-300 px-3 py-1.5 text-xs rounded-full inline-flex items-center justify-center font-bold uppercase tracking-wider text-white shadow-md hover:shadow-lg transition-all duration-300">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                        Draft
                      </span>
                    @elseif ($annonce->status == 'archived')
                      <span class="bg-gradient-to-tr from-red-600 to-rose-400 px-3 py-1.5 text-xs rounded-full inline-flex items-center justify-center font-bold uppercase tracking-wider text-white shadow-md hover:shadow-lg transition-all duration-300">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM4 8a1 1 0 011-1h6a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        Archived
                      </span>
                    @endif
                      
                  </td>
                  <td class="p-2 h-24 align-middle bg-transparent border-b text-center border-white/40 whitespace-nowrap shadow-transparent flex gap-2 items-center justify-center">
                    <a href="{{route('editannonce',$annonce)}}" class="text-blue-500 hover:text-blue-700 mx-1">
                      <span class="bg-blue-600/20 py-1.5 px-3 text-xs rounded-full inline-flex items-center justify-center font-bold">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                      </span>
                    </a>
                    <form action="{{route('deleteannonce',$annonce)}}" method="POST">
                        @csrf
                        <button class="text-red-500 hover:text-red-700 mx-1">
                          <span class="bg-red-600/20 py-1.5 px-3 text-xs rounded-full inline-flex items-center justify-center font-bold">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12
                                m-3 0a3 3 0 100-6 3 3 0 000 6zm0 0a3 3 0 100 6 3 3 0 000-6zm0-6a3 3 0 100-6 3 3 0 000 6zm0-6a3 3 0 100-6 3 3 0 000 6zM15.5.5h-7a2.5 2.5 0 00-2.5 2.5v7a2.5 2.5 0 002.5-2.5h7a2.5 2.5 0 002.5-2.5v-7a2.5 2.5z"></path> 
                            </svg>
                            Delete
                            </span>
                        </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
@endsection