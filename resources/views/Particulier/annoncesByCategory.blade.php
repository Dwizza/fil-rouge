@extends('layouts.particulier')
@section('content')
    <div class="bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between mb-10">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $category->name ?? 'Annonces' }}</h1>
                    <div class="w-20 h-1 bg-amber-500 rounded-full"></div>
                </div>
                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <a href="{{ route('home') }}" class="hover:text-amber-600 transition">Accueil</a>
                    <span class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                    <span>{{ $category->name ?? 'Toutes les annonces' }}</span>
                </div>
            </div>

            @if($annonces->isEmpty())
                <div class="bg-white rounded-xl shadow-custom p-12 text-center max-w-2xl mx-auto border border-gray-100">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-amber-100 mb-6 text-amber-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Aucune annonce disponible</h3>
                    <p class="text-gray-600 mb-6">Il n'y a pas d'annonces disponibles pour le moment dans cette catégorie.</p>
                    <a href="/" class="btn-primary btn-sm inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                        Retour à l'accueil
                    </a>
                </div>
            @else
                <div class="mb-6 p-4 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="w-full md:w-auto mb-4 md:mb-0">
                            <p class="text-gray-600">
                                <span class="font-semibold text-amber-600">{{ $annonces->total() }}</span> annonce(s) trouvée(s)
                            </p>
                        </div>
                        <div class="w-full md:w-auto flex flex-wrap gap-4 items-center">
                            <div class="relative">
                                <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-amber-500 text-sm">
                                    <option>Trier par: Plus récentes</option>
                                    <option>Prix croissant</option>
                                    <option>Prix décroissant</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex border border-gray-200 rounded overflow-hidden">
                                <button class="flex items-center justify-center px-4 py-2 bg-white text-gray-600 hover:bg-gray-50 border-r border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </button>
                                <button class="flex items-center justify-center px-4 py-2 bg-amber-50 text-amber-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($annonces as $annonce)
                        @php
                            $images = explode(',', $annonce->image);
                            $firstImage = count($images) > 0 ? $images[0] : null;
                        @endphp
                        <div class="card-animate bg-white shadow-custom hover:shadow-lg border border-gray-100">
                            <div class="relative">
                                <a href="{{ route('user.annonceDetail', $annonce->id) }}" class="block">
                                    @if($firstImage)
                                        <img src="{{ asset($firstImage) }}" class="w-full h-56 object-cover" alt="{{ $annonce->title }}">
                                    @else
                                        <div class="w-full h-56 gradient-primary flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </a>
                                <div class="absolute top-0 right-0 p-3">
                                    <span class="bg-gradient-to-r from-amber-500 to-amber-700 text-white px-4 py-1 rounded-full font-bold shadow-lg">{{ number_format($annonce->price, 2) }} €</span>
                                </div>
                                @if($annonce->category)
                                    <div class="absolute bottom-0 left-0 p-3">
                                        <span class="badge badge-secondary">{{ $annonce->category->name }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 border-b border-gray-100">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-xl font-bold text-gray-800 line-clamp-1">{{ $annonce->title }}</h3>
                                    <button class="text-gray-400 hover:text-amber-500 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-gray-600 line-clamp-3 mb-4 text-sm">{{ $annonce->description ?? 'Pas de description disponible pour cette annonce.' }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $annonce->location ?? 'Emplacement non spécifié' }}
                                </div>
                            </div>
                            <div class="p-5 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-9 w-9 rounded-full bg-amber-100 flex items-center justify-center text-amber-700 font-semibold text-lg mr-2">
                                        {{ substr($annonce->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">{{ $annonce->user->name ?? 'Utilisateur inconnu' }}</p>
                                        <p class="text-xs text-gray-500">{{ $annonce->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('user.annonceDetail', $annonce->id) }}" class="btn-secondary btn-sm inline-flex items-center">
                                    Voir détails
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $annonces->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation au chargement
        const cards = document.querySelectorAll('.card-animate');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('opacity-100');
                card.classList.remove('opacity-0', 'translate-y-4');
            }, index * 100);
        });

        // Effet de survol sur les badges
        const badges = document.querySelectorAll('.badge');
        badges.forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.classList.add('scale-110');
            });
            badge.addEventListener('mouseleave', function() {
                this.classList.remove('scale-110');
            });
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
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-animate {
            opacity: 0;
            transform: translateY(1rem);
            transition: all 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        .badge {
            transition: all 0.2s ease;
        }
    </style>
@endsection
