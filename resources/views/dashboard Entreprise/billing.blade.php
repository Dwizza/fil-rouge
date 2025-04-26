@extends('layouts.company')
@section('dashboard.company')
<div class="w-full px-4 py-6">
    <div class="flex flex-col">
        <!-- Header section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-white">📊 Rapport annonce</h2>
                <p class="text-gray-400 mt-1 text-sm">Vue d'ensemble des transactions de vos annonces</p>
            </div>
            
            <!-- Stats cards -->
            <div class="flex flex-wrap gap-4 mt-4 md:mt-0">
                <div class="bg-gradient-to-br from-blue-900/40 to-indigo-900/40 border border-blue-800/50 rounded-lg shadow-lg px-4 py-3">
                    <p class="text-xs text-blue-300 mb-1">Montant total</p>
                    <p class="text-xl font-bold text-white">
                        {{ number_format($totalRevenue, 2) }} USD
                    </p>
                </div>
                <div class="bg-gradient-to-br from-emerald-900/40 to-green-900/40 border border-emerald-800/50 rounded-lg shadow-lg px-4 py-3">
                    <p class="text-xs text-emerald-300 mb-1">Paiements réussis</p>
                    <p class="text-xl font-bold text-white">
                        {{ $annonces->where('status', 'succeeded')->count() }}
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Success alert -->
        @if(session('success'))
        <div id="alert-border-3" class="flex items-center p-4 mb-6 text-green-400 border-l-4 border-green-500 bg-dark-card/60 backdrop-blur-sm shadow-lg rounded-lg" role="alert">
            <svg class="shrink-0 w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="text-sm font-medium">
                Success! Le statut a été modifié avec succès.
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-green-400 rounded-lg p-1.5 hover:bg-green-500/20 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif

        <!-- Transactions table -->
        <div class="bg-dark-card border border-dark-border rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-dark-card/60 text-left text-xs font-medium text-gray-300 uppercase tracking-wider border-b border-dark-border">
                            <th class="py-3 px-6">Date</th>
                            <th class="py-3 px-6">Annonce</th>
                            <th class="py-3 px-6">Prix</th>
                            <th class="py-3 px-6">Client</th>
                            <th class="py-3 px-6 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dark-border">
                        @if(count($annonces) > 0)
                            @foreach($annonces as $annonce)
                                @php
                                $user = \App\Models\User::find($annonce->user_id);
                                @endphp
                                <tr class="hover:bg-gray-800/30 transition-colors">
                                    <td class="py-4 px-6 whitespace-nowrap text-sm">
                                        <div class="flex flex-col">
                                            <span class="font-medium text-gray-200">{{ \Carbon\Carbon::parse($annonce->created_at)->format('d M Y') }}</span>
                                            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($annonce->created_at)->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-sm">
                                        <span class="font-medium text-gray-200">{{ $annonce->title }}</span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-sm">
                                        <span class="font-semibold text-amber-400">{{ number_format($annonce->price, 2) }} USD</span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-medium">
                                                {{ substr($user->name ?? 'N/A', 0, 1) }}
                                            </div>
                                            <div class="ml-3">
                                                <span class="text-gray-200">{{ $user->name ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap text-sm text-center">
                                        @if ($annonce->status == 'succeeded')
                                            <span class="px-3 py-1.5 inline-flex items-center justify-center rounded-full text-xs font-medium bg-green-500/10 text-green-400">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                Succeeded
                                            </span>
                                        @elseif ($annonce->status == 'pending')
                                            <a href="billing/{{$annonce->id}}" class="px-3 py-1.5 inline-flex items-center justify-center rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 transition-colors cursor-pointer">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                                </svg>
                                                Pending
                                            </a>
                                        @elseif ($annonce->status == 'failed')
                                            <span class="px-3 py-1.5 inline-flex items-center justify-center rounded-full text-xs font-medium bg-red-500/10 text-red-400">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>
                                                Failed
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="py-12 text-center text-gray-400">
                                    <svg class="mx-auto h-12 w-12 text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Aucune transaction trouvée</p>
                                    <p class="mt-1">Aucune transaction n'a été effectuée pour le moment.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Close alert functionality
    document.addEventListener('DOMContentLoaded', function() {
        const dismissButton = document.querySelector('[data-dismiss-target="#alert-border-3"]');
        if (dismissButton) {
            dismissButton.addEventListener('click', function() {
                const alert = document.getElementById('alert-border-3');
                if (alert) {
                    alert.classList.add('opacity-0', 'scale-95');
                    alert.style.transition = 'opacity 150ms ease-out, transform 150ms ease-out';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 150);
                }
            });
        }
    });
</script>
@endsection