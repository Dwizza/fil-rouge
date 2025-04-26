@extends('layouts.app')
@section('dashboard.admin')

<!-- Main Dashboard Area -->
<div class="w-full mx-auto">
  <div class="relative flex flex-col min-w-0 break-words bg-gray-900/95 border-0 border-transparent shadow-2xl rounded-2xl bg-clip-border backdrop-blur-xl backdrop-saturate-200 overflow-hidden">
    <!-- Dashboard Header -->
    <div class="p-6 pb-0 mb-0 border-b-0 rounded-t-2xl flex justify-between items-center">
      <h6 class="text-white text-xl font-bold tracking-tight mb-2 flex items-center">
        <svg class="w-7 h-7 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
        </svg>
        Tableau de Bord Admin
      </h6>
      <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow">
        Administration
      </span>
    </div>
    
    <!-- Dashboard Content -->
    <div class="flex-auto p-6">
      <div class="p-6 bg-gray-800/70 rounded-xl shadow-lg border border-gray-700/30 backdrop-blur">
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Total Annonces -->
          <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg border border-gray-700/50 group hover:shadow-indigo-500/20 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-gray-400 text-sm font-medium mb-1">Annonces Total</p>
                <h2 class="text-2xl font-bold text-white flex items-baseline">
                  {{ $totalAnnonces }}
                  <span class="ml-2 text-xs text-green-400 font-medium">+5% ↑</span>
                </h2>
              </div>
              <div class="bg-indigo-900/30 p-3 rounded-lg text-indigo-400 group-hover:text-indigo-300 transition-colors">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                </svg>
              </div>
            </div>
            <div class="mt-4 h-1 w-full bg-gray-700/50 rounded-full overflow-hidden">
              <div class="bg-gradient-to-r from-indigo-500 to-blue-500 h-1 rounded-full" style="width: 75%"></div>
            </div>
          </div>
    
          <!-- Total Entreprises -->
          <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg border border-gray-700/50 group hover:shadow-purple-500/20 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-gray-400 text-sm font-medium mb-1">Company Total</p>
                <h2 class="text-2xl font-bold text-white flex items-baseline">
                  {{ $totalEntreprises }}
                  <span class="ml-2 text-xs text-purple-400 font-medium">+12% ↑</span>
                </h2>
              </div>
              <div class="bg-purple-900/30 p-3 rounded-lg text-purple-400 group-hover:text-purple-300 transition-colors">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
                </svg>
              </div>
            </div>
            <div class="mt-4 h-1 w-full bg-gray-700/50 rounded-full overflow-hidden">
              <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-1 rounded-full" style="width: 65%"></div>
            </div>
          </div>
    
          <!-- Total Particuliers -->
          <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg border border-gray-700/50 group hover:shadow-pink-500/20 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-gray-400 text-sm font-medium mb-1">Particulers Total</p>
                <h2 class="text-2xl font-bold text-white flex items-baseline">
                  {{ $totalParticuliers }}
                  <span class="ml-2 text-xs text-pink-400 font-medium">+8% ↑</span>
                </h2>
              </div>
              <div class="bg-pink-900/30 p-3 rounded-lg text-pink-400 group-hover:text-pink-300 transition-colors">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
              </div>
            </div>
            <div class="mt-4 h-1 w-full bg-gray-700/50 rounded-full overflow-hidden">
              <div class="bg-gradient-to-r from-pink-500 to-rose-500 h-1 rounded-full" style="width: 80%"></div>
            </div>
          </div>
          
          <!-- Total Revenue -->
          <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg border border-gray-700/50 group hover:shadow-emerald-500/20 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-gray-400 text-sm font-medium mb-1">Total Revenue</p>
                <h2 class="text-2xl font-bold text-white flex items-baseline">
                  {{$totalRevenues}}$
                  <span class="ml-2 text-xs text-emerald-400 font-medium">+18% ↑</span>
                </h2>
              </div>
              <div class="bg-emerald-900/30 p-3 rounded-lg text-emerald-400 group-hover:text-emerald-300 transition-colors">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                </svg>
              </div>
            </div>
            <div class="mt-4 h-1 w-full bg-gray-700/50 rounded-full overflow-hidden">
              <div class="bg-gradient-to-r from-emerald-500 to-green-500 h-1 rounded-full" style="width: 90%"></div>
            </div>
          </div>
        </div>
        
        <!-- Charts & Analytics -->
        <div class="flex flex-wrap mt-8 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800/70 shadow-lg rounded-xl border border-gray-700/30">
              
              <!-- Data Extracts Section Below Chart -->
              <div class="border-t border-gray-700/30 p-6 pt-4">
                <!-- Users Extract -->
                <div>
                  <h6 class="text-gray-300 text-sm font-medium mb-3 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                    Utilisateurs Récents
                  </h6>
                  <div class="overflow-x-auto rounded-lg border border-gray-700/50">
                    <table class="min-w-full divide-y divide-gray-700/50">
                      <thead class="bg-gray-700/30">
                        <tr>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nom</th>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                        </tr>
                      </thead>
                      <tbody class="bg-gray-800/50 divide-y divide-gray-700/50">
                        @foreach($latestUsers as $user)
                        <tr class="hover:bg-gray-700/20 transition-colors">
                          <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-300">#{{ $user->id }}</td>
                          <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-300">{{ $user->name }}</td>
                          <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-400">{{ $user->email }}</td>
                          <td class="px-4 py-3 whitespace-nowrap text-xs text-gray-400">{{ $user->created_at->format('d M, Y') }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <!-- Annonces Extract -->
                <div class="mt-6">
                  <h6 class="text-gray-300 text-sm font-medium mb-3 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                    </svg>
                    Annonces Récentes
                  </h6>
                  <div class="overflow-x-auto rounded-lg border border-gray-700/50">
                    <table class="min-w-full divide-y divide-gray-700/50">
                      <thead class="bg-gray-700/30">
                        <tr>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Titre</th>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Prix</th>
                          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Statut</th>
                        </tr>
                      </thead>
                      <tbody class="bg-gray-800/50 divide-y divide-gray-700/50">
                        @foreach($latestAnnonces as $annonce)
                        <tr class="hover:bg-gray-700/20 transition-colors">
                          <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-300">#{{ $annonce->id }}</td>
                          <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-300">{{ Str::limit($annonce->title, 25) }}</td>
                          <td class="px-4 py-3 whitespace-nowrap text-sm text-emerald-400">{{ $annonce->price }}$</td>
                          <td class="px-4 py-3 whitespace-nowrap">
                            @if($annonce->status == 'published')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900/30 text-green-400">Publié</span>
                            @elseif($annonce->status == 'draft')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900/30 text-yellow-400">Brouillon</span>
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900/30 text-red-400">Archivé</span>
                            @endif
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
          
          <!-- Featured Content/Stats -->
          <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800/70 shadow-lg rounded-xl border border-gray-700/30 h-full">
              <div class="mb-0 rounded-t-2xl border-b border-solid border-gray-700/30 p-6 pt-4 pb-0">
                <div class="flex justify-between items-center">
                  <h6 class="text-white text-lg font-medium mb-1">Activités récentes</h6>
                  <button class="bg-gray-700 hover:bg-gray-600 text-white text-xs px-3 py-1.5 rounded-lg flex items-center gap-1 transition-colors">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                    </svg>
                    Filtrer
                  </button>
                </div>
              </div>
              <div class="flex-auto p-6">
                <div class="space-y-4">
                  <!-- Activity Item -->
                  <div class="flex items-start p-3 rounded-lg bg-gray-700/50 border border-gray-700/50">
                    <div class="bg-indigo-900/50 p-2 rounded-lg mr-3">
                      <svg class="w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <div>
                      <h5 class="text-sm font-medium text-gray-200">Nouvelle annonce créée</h5>
                      <p class="text-xs text-gray-400 mt-1">Immobilier - Villa de luxe à Casablanca</p>
                      <p class="text-xs text-gray-500 mt-2">Il y a 25 minutes</p>
                    </div>
                  </div>
                  
                  <!-- Activity Item -->
                  <div class="flex items-start p-3 rounded-lg bg-gray-700/50 border border-gray-700/50">
                    <div class="bg-purple-900/50 p-2 rounded-lg mr-3">
                      <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                      </svg>
                    </div>
                    <div>
                      <h5 class="text-sm font-medium text-gray-200">Nouvelle entreprise enregistrée</h5>
                      <p class="text-xs text-gray-400 mt-1">Tech Solutions Inc.</p>
                      <p class="text-xs text-gray-500 mt-2">Il y a 1 heure</p>
                    </div>
                  </div>
                  
                  <!-- Activity Item -->
                  <div class="flex items-start p-3 rounded-lg bg-gray-700/50 border border-gray-700/50">
                    <div class="bg-green-900/50 p-2 rounded-lg mr-3">
                      <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <div>
                      <h5 class="text-sm font-medium text-gray-200">Nouveau paiement reçu</h5>
                      <p class="text-xs text-gray-400 mt-1">$349.99 - Premium Plan</p>
                      <p class="text-xs text-gray-500 mt-2">Il y a 3 heures</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>


@endsection