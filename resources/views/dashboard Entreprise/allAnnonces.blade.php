@extends('layouts.company')
@section('dashboard.company')
<div class="w-full px-4 py-6">
    <div class="flex flex-col">
      <div class="relative overflow-hidden bg-dark-card border border-dark-border rounded-xl shadow-lg">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-dark-border">
          <h2 class="text-xl font-semibold text-white">Annonces</h2>
          <a href="{{ route('addannonce') }}" class="inline-flex items-center px-4 py-2 bg-brand-amber hover:bg-brand-amber-dark text-white text-sm font-medium rounded-lg transition-colors duration-300 shadow-md hover:shadow-amber-500/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter une annonce
          </a>
        </div>
        
        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left">
            <thead class="text-xs text-gray-300 uppercase border-b border-dark-border bg-dark-card/50">
              <tr>
                <th scope="col" class="px-6 py-4">Titre</th>
                <th scope="col" class="px-6 py-4">Catégorie</th>
                <th scope="col" class="px-6 py-4">Prix</th>
                <th scope="col" class="px-6 py-4">Utilisateur</th>
                <th scope="col" class="px-6 py-4 text-center">Statut</th>
                <th scope="col" class="px-6 py-4 text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($annonces as $annonce)
              <tr class="border-b border-dark-border hover:bg-gray-800/30 transition-colors">
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    @php
                        $images = explode(',', $annonce->image);
                    @endphp
                    
                    <div class="relative w-16 h-16 mr-4 rounded-lg overflow-hidden shadow-md border border-dark-border group" onmouseenter="startSlideshow(this)" onmouseleave="stopSlideshow(this)" data-images='@json($images)'>
                      <img src="{{ asset($images[0]) }}" class="w-full h-full object-cover transition-all duration-500 image-slide" alt="annonce image" />
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    
                    <div>
                      <h6 class="font-medium text-white truncate max-w-xs">{{$annonce->title}}</h6>
                      <p class="text-xs text-gray-400">Publié le {{ \Carbon\Carbon::parse($annonce->created_at)->format('d/m/Y') }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <span class="px-2.5 py-1 bg-purple-500/20 text-purple-400 rounded-full text-xs font-medium">{{$annonce->category->name}}</span>
                </td>
                <td class="px-6 py-4">
                  <span class="font-medium text-amber-400">{{number_format($annonce->price, 2)}} $</span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold mr-2">
                      {{ substr($annonce->user->name, 0, 1) }}
                    </div>
                    <span class="text-gray-300">{{$annonce->user->name}}</span>
                  </div>
                </td>
                <td class="px-6 py-4 text-center">
                  @if ($annonce->status == 'published')
                    <span class="bg-gradient-to-r from-green-500 to-emerald-500 px-3 py-1 text-xs rounded-full inline-flex items-center justify-center font-medium text-white shadow-sm">
                      <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                      Publié
                    </span>
                  @elseif ($annonce->status == 'draft')
                    <span class="bg-gradient-to-r from-amber-500 to-yellow-400 px-3 py-1 text-xs rounded-full inline-flex items-center justify-center font-medium text-white shadow-sm">
                      <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                      Brouillon
                    </span>
                  @elseif ($annonce->status == 'archived')
                    <span class="bg-gradient-to-r from-red-500 to-rose-500 px-3 py-1 text-xs rounded-full inline-flex items-center justify-center font-medium text-white shadow-sm">
                      <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM4 8a1 1 0 011-1h6a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                      Archivé
                    </span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <a href="{{route('editannonce',$annonce)}}" class="inline-flex items-center px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-colors duration-200">
                      <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                      Modifier
                    </a>
                    <form action="{{route('deleteannonce',$annonce)}}" method="POST">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-500/20 text-red-400 rounded-lg hover:bg-red-500/30 transition-colors duration-200">
                          <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                          </svg>
                          Supprimer
                        </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Empty state -->
        @if(count($annonces) == 0)
        <div class="p-12 text-center">
          <svg class="w-20 h-20 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          <h3 class="text-lg font-medium text-gray-300 mb-2">Aucune annonce trouvée</h3>
          <p class="text-gray-500 mb-6">Vous n'avez pas encore créé d'annonces.</p>
          <a href="{{ route('addannonce') }}" class="inline-flex items-center px-4 py-2 bg-brand-amber hover:bg-brand-amber-dark text-white text-sm font-medium rounded-lg shadow-md transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Créer votre première annonce
          </a>
        </div>
        @endif
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