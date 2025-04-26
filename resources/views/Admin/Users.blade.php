@extends('layouts.app')
@section('dashboard.admin')

<div class="w-full mx-auto">
  <div class="relative flex flex-col min-w-0 break-words bg-gray-900/95 border-0 border-transparent shadow-2xl rounded-2xl bg-clip-border backdrop-blur-xl backdrop-saturate-200 overflow-hidden">
    <!-- Dashboard Header -->
    <div class="p-6 pb-4 mb-0 border-b border-gray-700/50 rounded-t-2xl flex justify-between items-center">
      <h6 class="text-white text-xl font-bold tracking-tight mb-0 flex items-center">
        <svg class="w-7 h-7 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        Gestion des Utilisateurs
      </h6>
      <div class="flex items-center gap-2">
        <div class="relative">
          <input type="text" placeholder="Rechercher un utilisateur..." class="px-4 py-2 pr-8 text-sm bg-gray-800/70 border border-gray-700/50 rounded-lg text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent">
          <svg class="w-4 h-4 text-gray-500 absolute right-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <button class="flex items-center gap-1 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-sm px-4 py-2 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-purple-500/30">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          Ajouter
        </button>
      </div>
    </div>
    
    <div class="flex-auto p-6">
      <div class="p-2 bg-gray-800/50 rounded-xl shadow-lg border border-gray-700/30 backdrop-blur-sm">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-700/50">
            <thead>
              <tr class="bg-gray-800/70">
                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-400">Utilisateur</th>
                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-400">Rôle</th>
                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-400">Statut</th>
                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-400">Date de création</th>
                <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-400">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-700/40 bg-gray-800/20">
            @foreach ($users as $user )
              <tr class="hover:bg-gray-700/20 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-700/50 shadow-md" src="{{ $user->photo }}" alt="{{ $user->name }}" />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-white">{{ $user->name }}</div>
                      <div class="text-sm text-gray-400">{{ $user->email }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    @if($user->role->name == 'Entreprise')
                      <div class="flex-shrink-0 h-6 w-6 mr-2">
                        <svg class="h-6 w-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
                        </svg>
                      </div>
                    @elseif($user->role->name == 'Particulier')
                      <div class="flex-shrink-0 h-6 w-6 mr-2">
                        <svg class="h-6 w-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                      </div>
                    @else
                      <div class="flex-shrink-0 h-6 w-6 mr-2">
                        <svg class="h-6 w-6 text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                        </svg>
                      </div>
                    @endif
                    <span class="text-sm text-white font-medium">{{$user->role->name}}</span>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  <span class="px-3 py-1.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-gradient-to-r from-green-500/20 to-emerald-500/20 text-emerald-400 border border-emerald-500/20">Actif</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-400">
                  {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y, H:i') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <div class="flex items-center justify-end space-x-3">
                    <a href="/profile/view/{{$user->id}}" class="text-indigo-400 hover:text-indigo-300 transition-colors">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                    </a>
                    <button class="text-blue-400 hover:text-blue-300 transition-colors">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                    </button>
                    <button class="text-red-400 hover:text-red-300 transition-colors">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- Pagination -->
        <div class="px-5 py-4 bg-gray-800/70 border-t border-gray-700/50 flex items-center justify-between">
          <div class="text-sm text-gray-400">
            Affichage de <span class="font-medium text-white">1</span> à <span class="font-medium text-white">10</span> sur <span class="font-medium text-white">{{ count($users) }}</span> utilisateurs
          </div>
          <div class="flex space-x-1">
            <button class="px-3 py-1 rounded bg-gray-700/50 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
              Précédent
            </button>
            <button class="px-3 py-1 rounded bg-indigo-600/70 text-white hover:bg-indigo-600 transition-colors">
              1
            </button>
            <button class="px-3 py-1 rounded bg-gray-700/50 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
              2
            </button>
            <button class="px-3 py-1 rounded bg-gray-700/50 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
              3
            </button>
            <button class="px-3 py-1 rounded bg-gray-700/50 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
              Suivant
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection