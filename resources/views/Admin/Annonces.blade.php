@extends('layouts.app')
@section('dashboard.admin')

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
              <tr>
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
                <td class="p-2 align-middle bg-transparent border-b text-center border-white/40 whitespace-nowrap shadow-transparent">
                  <a href="javascript:void(0);" onclick="openModal('{{ $annonce->id }}', '{{ $annonce->status }}')" class="text-blue-500 hover:text-blue-700 mx-1">
                    <span class="bg-blue-600/20 py-1.5 px-3 text-xs rounded-full inline-flex items-center justify-center font-bold">
                      <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                      Edit
                    </span>
                  </a>
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

<!-- Modal -->
<div id="statusModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
  <div id="modalContent" class="bg-white rounded-2xl w-full max-w-md p-6 shadow-xl relative transform scale-95 opacity-0 transition-all duration-300">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-bold">Update Status</h2>
      <button onclick="closeModal()" class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
    </div>
    <form id="statusForm" method="POST">
      @csrf
      <input type="hidden" id="annonce_id" name="annonce_id">
      <div class="mb-4">
        <label for="statusSelect" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
        <select id="statusSelect" name="status" class="w-full p-2 border border-gray-300 rounded-lg">
          <option value="draft">Draft</option>
          <option value="published">Published</option>
          <option value="archived">Archived</option>
        </select>
      </div>
      <div class="flex justify-end">
        <button type="button" onclick="closeModal()" class="mr-2 px-4 py-2 text-sm bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 transform transition-transform hover:scale-105">Save</button>
      </div>
    </form>
  </div>
</div>

<!-- Toast -->
<div id="toast" class="fixed top-6 right-6 z-50 hidden p-4 rounded-xl shadow-lg bg-green-500 text-white text-sm font-semibold transition-all duration-500 transform translate-y-[-20px] opacity-0">
  ✅ Status updated successfully!
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
    toast.textContent = message;
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
    showToast("✅ Status saved successfully!");
  });
</script>




@endsection