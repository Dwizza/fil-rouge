@extends('layouts.app')
@section('dashboard.admin')
<div class="container mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">📂 Gestion des Catégories</h1>

    <!-- Add Button -->
    <button onclick="openModal()" class="bg-indigo-600 text-blue-50 px-4 py-2 rounded hover:bg-indigo-700 mb-4">
        <i class="fa-solid fa-plus" style="color: #d8c6fb;"></i> Ajouter une Catégorie
    </button>

    <!-- Table -->
    <table class="w-full table-auto bg-gray-800 rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-gray-300">
            <tr>
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Nom</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="border-t border-gray-700">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6">{{ $category->name }}</td>
                    <td class="py-3 px-6 space-x-2">
                        <button class="bg-yellow-500 px-3 py-1 rounded" onclick="openModal({{ $category }})">✏️</button>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr ?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 px-3 py-1 rounded">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="categoryModal" class="fixed inset-0 bg-black/70 hidden justify-center items-center z-50">
    <div class="bg-gray-800 p-6 rounded-xl w-full max-w-md">
        <h2 id="modalTitle" class="text-xl font-semibold mb-4">Ajouter Catégorie</h2>
        <form id="categoryForm" method="POST">
            @csrf
            <input type="hidden" name="id" id="categoryId">
            <input type="text" name="name" id="categoryName" class="w-full px-4 py-2 mb-4 rounded bg-gray-700 border border-gray-600 text-white" placeholder="Nom de la catégorie" required>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="bg-gray-600 text-blue-50 px-4 py-2 rounded hover:bg-gray-700">Annuler</button>
                <button type="submit" class="bg-indigo-600 text-blue-50 px-4 py-2 rounded hover:bg-indigo-700">Sauvegarder</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(category = null) {
        const modal = document.getElementById('categoryModal');
        const form = document.getElementById('categoryForm');
        const title = document.getElementById('modalTitle');
        const nameField = document.getElementById('categoryName');
        const idField = document.getElementById('categoryId');

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

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.add('hidden');
        document.getElementById('categoryModal').classList.remove('flex');
    }
</script>
  

@endsection

