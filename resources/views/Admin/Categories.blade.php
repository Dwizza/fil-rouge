@extends('layouts.app')
@section('dashboard.admin')

<div class="flex flex-wrap">
  <div class="flex-none w-full max-w-full px-0">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-gray-900/95 border-0 border-transparent border-solid shadow-2xl rounded-2xl bg-clip-border backdrop-blur-xl backdrop-saturate-200">
      <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
        <h6 class="text-white text-xl font-bold tracking-tight mb-2 flex items-center">
          <svg class="w-6 h-6 mr-2 text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"></path>
            <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"></path>
          </svg>
          Gestion des Catégories
        </h6>
        <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow">
          Administration
        </span>
      </div>
      <div class="flex-auto p-0 pt-0 pb-2">
        <div class="relative flex flex-col min-w-0 break-words bg-gray-800/50 shadow-2xl rounded-xl bg-clip-border border border-gray-700/30 backdrop-blur">
          <div class="flex-auto px-0 pt-5 pb-2">
              <!-- Add Button -->
              <div class="px-6 pb-5 flex justify-between items-center">
                <button onclick="openModal()" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white px-5 py-2.5 rounded-lg hover:shadow-lg shadow-md flex items-center transition-all duration-300 transform hover:scale-105">
                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                  </svg>
                  Ajouter une Catégorie
                </button>
              </div>
              
              <!-- Table Content -->
              <div class="p-0 overflow-x-auto px-1">
                <table class="items-center w-full mb-0 align-top border-collapse border-gray-700/50 text-gray-200 rounded-xl overflow-hidden">
                  <thead class="align-bottom">
                    <tr>
                      <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[10%]">#</th>
                      <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[60%]">Nom</th>
                      <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-gray-700/20 border-b shadow-inner border-gray-700/40 text-gray-100 text-xs tracking-wider whitespace-nowrap font-sans w-[30%]">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="border-t">
                    @foreach($categories as $category)
                      <tr class="hover:bg-gray-700/10 transition-colors duration-200">
                        <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent px-6">
                          <span class="text-sm font-medium leading-tight text-gray-300">{{ $loop->iteration }}</span>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent px-6">
                          <div class="flex items-center">
                            <div class="w-8 h-8 rounded-md bg-gradient-to-br from-indigo-600 to-purple-700 flex items-center justify-center text-white mr-2 shadow-md border border-gray-700/40">
                              <span class="text-xs font-medium">{{ substr($category->name, 0, 1) }}</span>
                            </div>
                            <span class="text-sm font-medium leading-tight text-gray-200">{{ $category->name }}</span>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-700/20 whitespace-nowrap shadow-transparent px-6">
                          <div class="flex space-x-2">
                            <button onclick="openModal({{ $category }})" class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 p-0.5 rounded-lg inline-block shadow-md hover:shadow-amber-500/20 transition-all duration-300 hover:scale-105">
                              <span class="bg-gray-900 text-gray-100 py-1.5 px-3 text-xs rounded-md inline-flex items-center justify-center font-medium">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                                Modifier
                              </span>
                            </button>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                              @csrf @method('DELETE')
                              <button class="bg-gradient-to-r from-red-600 to-rose-500 hover:from-red-500 hover:to-rose-400 p-0.5 rounded-lg inline-block shadow-md hover:shadow-red-500/20 transition-all duration-300 hover:scale-105">
                                <span class="bg-gray-900 text-gray-100 py-1.5 px-3 text-xs rounded-md inline-flex items-center justify-center font-medium">
                                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                  </svg>
                                  Supprimer
                                </span>
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    @if(count($categories) == 0)
                      <tr>
                        <td colspan="3" class="p-6 text-center">
                          <div class="flex flex-col items-center justify-center py-8">
                            <svg class="w-16 h-16 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-gray-400 text-lg font-medium">Aucune catégorie trouvée</p>
                            <p class="text-gray-500 text-sm mt-1">Ajoutez une nouvelle catégorie pour commencer</p>
                          </div>
                        </td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="categoryModal" class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
  <div id="modalContent" class="bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-700/50 rounded-xl w-full max-w-md p-6 shadow-2xl relative transform scale-95 opacity-0 transition-all duration-300">
    <div class="flex justify-between items-center mb-4 border-b border-gray-700/50 pb-3">
      <h2 id="modalTitle" class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Ajouter Catégorie</h2>
      <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 text-xl transition-colors duration-200">&times;</button>
    </div>
    <form id="categoryForm" method="POST">
      @csrf
      <input type="hidden" name="id" id="categoryId">
      <div class="mb-5">
        <label for="categoryName" class="block mb-2 text-sm font-medium text-gray-300">Nom de la catégorie</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" name="name" id="categoryName" class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-800/80 border-gray-700/50 text-gray-100 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out shadow-inner" placeholder="Nom de la catégorie" required>
        </div>
      </div>
      <div class="flex justify-end pt-3 border-t border-gray-700/50">
        <button type="button" onclick="closeModal()" class="mr-2 px-5 py-2 text-sm bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors duration-200">Annuler</button>
        <button type="submit" class="px-5 py-2 text-sm bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg hover:from-indigo-500 hover:to-blue-500 transform transition-all hover:scale-105 shadow-lg hover:shadow-indigo-500/20 focus:ring-2 focus:ring-indigo-500/50">Sauvegarder</button>
      </div>
    </form>
  </div>
</div>

<script>
    function openModal(category = null) {
        const modal = document.getElementById('categoryModal');
        const modalContent = document.getElementById('modalContent');
        const form = document.getElementById('categoryForm');
        const title = document.getElementById('modalTitle');
        const nameField = document.getElementById('categoryName');
        const idField = document.getElementById('categoryId');

        // Show the modal with a fade-in animation
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
          modalContent.classList.remove('scale-95', 'opacity-0');
          modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        if (category) {
            title.textContent = 'Modifier Catégorie';
            form.action = "{{ route('categories.update') }}";
            nameField.value = category.name;
            idField.value = category.id;
        } else {
            title.textContent = 'Ajouter Catégorie';
            form.action = "{{ route('categories.store') }}";
            nameField.value = '';
            idField.value = '';
        }
    }

    function closeModal() {
        const modal = document.getElementById('categoryModal');
        const modalContent = document.getElementById('modalContent');
        
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
          modal.classList.remove('flex');
          modal.classList.add('hidden');
        }, 300);
    }
</script>
  
@endsection

