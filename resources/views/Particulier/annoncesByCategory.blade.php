@extends('layouts.particulier')
@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex flex-col md:flex-row items-center justify-between mb-12">
                <div class="mb-6 md:mb-0 relative">
                    <span class="absolute -top-6 left-0 text-xs font-medium tracking-widest text-amber-600 uppercase">Découvrez</span>
                    <h1 class="text-4xl font-extrabold text-gray-800 mb-3">{{ $category->name ?? 'Annonces' }}</h1>
                    <div class="w-24 h-1.5 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full"></div>
                </div>
                <div class="flex items-center space-x-2 text-sm">
                    <a href="{{ route('home') }}" class="group flex items-center text-gray-600 hover:text-amber-600 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Retour à l'accueil
                    </a>
                </div>
            </div>

            @if($annonces->isEmpty())
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center max-w-2xl mx-auto border border-gray-100 transform transition-all duration-500 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-amber-100 mb-8 text-amber-500 animate-pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Aucune annonce disponible</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Il n'y a pas d'annonces disponibles pour le moment dans cette catégorie. Veuillez vérifier ultérieurement.</p>
                    <a href="/" class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-amber-500 to-amber-600 text-white font-medium shadow-lg hover:shadow-amber-200 transform hover:-translate-y-1 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                        Retour à l'accueil
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($annonces as $annonce)
                        @php
                            $images = explode(',', $annonce->image);
                            $firstImage = count($images) > 0 ? $images[0] : null;
                        @endphp
                        <div class="card-animate bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                            <div class="relative overflow-hidden group">
                                <a href="{{ route('user.annonceDetail', $annonce->id) }}" class="block">
                                    @if($firstImage)
                                        <img src="{{ asset($firstImage) }}" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $annonce->title }}">
                                    @else
                                        <div class="w-full h-64 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </a>
                                <div class="absolute top-4 right-4">
                                    <span class="bg-white text-amber-600 px-4 py-1.5 rounded-full font-bold shadow-lg backdrop-blur-sm bg-opacity-80">{{ number_format($annonce->price, 2) }} €</span>
                                </div>
                                @if($annonce->category)
                                    <div class="absolute bottom-4 left-4">
                                        <span class="bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wider shadow-md transform transition hover:scale-105">{{ $annonce->category->name }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 border-b border-gray-100">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-800 line-clamp-1 hover:text-amber-600 transition-colors">{{ $annonce->title }}</h3>
                                    <button class="text-gray-400 hover:text-amber-500 transition-colors transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-gray-600 line-clamp-2 mb-4">{{ $annonce->description ?? 'Pas de description disponible pour cette annonce.' }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $annonce->location ?? 'Emplacement non spécifié' }}
                                </div>
                            </div>
                            <div class="p-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white font-bold text-lg mr-3 shadow-sm">
                                        {{ substr($annonce->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">{{ $annonce->user->name ?? 'Utilisateur inconnu' }}</p>
                                        <p class="text-xs text-gray-500">{{ $annonce->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('user.annonceDetail', $annonce->id) }}" class="group inline-flex items-center text-amber-600 font-medium hover:text-amber-700 transition-colors">
                                    Détails
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation au chargement
            const cards = document.querySelectorAll('.card-animate');
            cards.forEach((card, index) => {
                // Set initial state
                card.style.opacity = "0";
                card.style.transform = "translateY(20px)";
                
                // Trigger animation with delay
                setTimeout(() => {
                    card.style.opacity = "1";
                    card.style.transform = "translateY(0)";
                }, index * 120);
            });
        });
    </script>
    
        

    <style>
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-animate {
            transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .badge {
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            @apply px-5 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-medium shadow-lg hover:shadow-amber-200/50 transform hover:-translate-y-0.5 transition-all duration-300;
        }
        
        .btn-secondary {
            @apply px-4 py-2 text-amber-600 bg-amber-50 rounded-lg font-medium hover:bg-amber-100 transition-colors duration-300;
        }
    </style>
@endsection
