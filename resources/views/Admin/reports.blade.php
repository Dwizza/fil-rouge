@extends('layouts.app')
@section('dashboard.admin')

<div class="w-full mx-auto">
  <div class="relative flex flex-col min-w-0 break-words bg-gray-900/95 border-0 border-transparent shadow-2xl rounded-2xl bg-clip-border backdrop-blur-xl backdrop-saturate-200 overflow-hidden">
    <!-- Header -->
    <div class="p-6 pb-4 mb-0 border-b border-gray-700/50 rounded-t-2xl flex justify-between items-center">
      <h6 class="text-white text-xl font-bold tracking-tight mb-0 flex items-center">
        <svg class="w-7 h-7 mr-2 text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        Signalements et Feedbacks
      </h6>
      <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow">
        Administration
      </span>
    </div>
    
    <!-- Content -->
    <div class="flex-auto p-6">
      <div class="p-2 bg-gray-800/50 rounded-xl shadow-lg border border-gray-700/30 backdrop-blur-sm">
        
        @if(session('success'))
          <div class="mb-4 p-4 rounded-lg border border-green-500/30 bg-gradient-to-r from-green-900/30 to-emerald-900/30 text-emerald-300 flex items-start">
            <svg class="w-5 h-5 mr-3 mt-0.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <p>{{ session('success') }}</p>
          </div>
        @endif

        @if(count($reports ?? []) > 0)
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700/50">
              <thead class="bg-gray-800/70">
                <tr>
                  <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-400">Titre de l'annonce</th>
                  <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-400">Propriétaire</th>
                  <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-400">Message</th>
                  <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-400">Date</th>
                  <th scope="col" class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-400">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-700/40 bg-gray-800/20">
                @foreach($reports as $report)
                  <tr class="hover:bg-gray-700/20 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <a href="/annonceDetails/{{$report->annonce->id}}" class="text-sm font-medium text-indigo-400 hover:text-indigo-300 transition-colors">
                        {{ $report->annonce->title ?? 'N/A' }}
                      </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8">
                          <div class="h-8 w-8 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white font-medium text-sm">
                            {{ substr($report->annonce->user->name ?? 'U', 0, 1) }}
                          </div>
                        </div>
                        <div class="ml-3">
                          <div class="text-sm font-medium text-white">{{ $report->annonce->user->name ?? 'Unknown' }}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 max-w-xs">
                      <div class="text-sm text-gray-300 truncate">{{ Str::limit($report->message, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-400">{{ $report->created_at->format('d M Y') }}</div>
                      <div class="text-xs text-gray-500">{{ $report->created_at->format('H:i') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <div class="flex items-center justify-end space-x-2">
                        <a href="/annonceDetails/{{$report->annonce->id}}" class="p-2 rounded-lg bg-indigo-900/40 text-indigo-400 hover:bg-indigo-800/50 transition-colors">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                          </svg>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <div class="p-6 rounded-lg bg-gray-800/70 border border-gray-700/50 flex items-center justify-center">
            <div class="text-center">
              <div class="mx-auto h-16 w-16 rounded-full bg-indigo-900/30 flex items-center justify-center mb-4">
                <svg class="h-8 w-8 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
              </div>
              <h3 class="text-lg font-medium text-gray-300 mb-1">Aucun signalement</h3>
              <p class="text-sm text-gray-500">Aucun signalement n'a été trouvé dans le système.</p>
            </div>
          </div>
        @endif
        
      </div>
    </div>
  </div>
</div>

@endsection