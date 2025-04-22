@extends('layouts.particulier')

@section('content')

<!-- Custom Styles -->
<style>
    .image-gallery-thumb {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .image-gallery-thumb:hover {
        transform: scale(1.05);
    }
    .gradient-overlay {
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
    }
    .price-tag {
        clip-path: polygon(0% 0%, 100% 0%, 95% 50%, 100% 100%, 0% 100%);
    }

    /* Styles pour la visionneuse d'image */
    .image-gallery-container {
        position: relative;
        height: 100%;
    }

    .main-image-container {
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .gallery-navigation {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 15%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .gallery-navigation:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.2);
    }

    .prev-btn {
        left: 0;
    }

    .next-btn {
        right: 0;
    }

    .navigation-btn {
        background: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Image Zoom */
    .zoom-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s;
    }

    .zoom-container.active {
        opacity: 1;
        pointer-events: auto;
    }

    .zoom-image {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    }

    .zoom-close {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .zoom-navigation {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .zoom-prev {
        left: 20px;
    }

    .zoom-next {
        right: 20px;
    }

    /* Badge du compteur d'images */
    .image-counter {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
        z-index: 5;
    }
</style>

<div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Fancy Breadcrumb -->
        <nav class="flex items-center text-sm font-medium mb-8" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-amber-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                    </a>
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <a href="{{ route('user.dashboard') }}" class="ml-2 text-gray-500 hover:text-amber-600 transition">Annonces</a>
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-2 text-amber-700 font-semibold">{{ Str::limit($annonce->title, 30) }}</span>
                </li>
            </ol>
        </nav>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Top Section: Image Gallery and Summary -->
            <div class="flex flex-col lg:flex-row">
                <!-- Left: Image Gallery -->
                <div class="w-full lg:w-3/5 bg-gray-900">
                    <div class="relative h-96 lg:h-[500px]">
                        @if($annonce->image)
                            @php
                                $images = explode(',', $annonce->image);
                                $imageCount = count($images);
                            @endphp
                            
                            <div class="image-gallery-container">
                                <!-- Conteneur d'image principale -->
                                <div id="mainImageContainer" class="main-image-container">
                                    @foreach($images as $index => $image)
                                        <img 
                                            src="{{ asset($image) }}" 
                                            alt="{{ $annonce->title }} - Image {{ $index + 1 }}" 
                                            class="w-full h-full object-cover absolute top-0 left-0 transition-opacity duration-300 cursor-pointer"
                                            style="{{ $index === 0 ? 'opacity: 1;' : 'opacity: 0; pointer-events: none;' }}"
                                            data-index="{{ $index }}"
                                            onclick="openZoom({{ $index }})"
                                        >
                                    @endforeach
                                </div>
                                
                                <!-- Navigation Buttons (visible only when hovering) -->
                                @if($imageCount > 1)
                                    <div class="gallery-navigation prev-btn" onclick="changeImage('prev')">
                                        <div class="navigation-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="gallery-navigation next-btn" onclick="changeImage('next')">
                                        <div class="navigation-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Compteur d'images -->
                                <div class="image-counter">
                                    <span id="currentImageIndex">1</span>/{{ $imageCount }}
                                </div>
                                
                                <!-- Overlay gradient at bottom -->
                                <div class="absolute bottom-0 left-0 right-0 h-32 gradient-overlay">
                                    <div class="absolute bottom-0 left-0 p-5 w-full">
                                        <div class="flex items-center space-x-1">
                                            <span class="bg-amber-700 bg-opacity-80 text-white text-xs px-2.5 py-1 rounded-full backdrop-blur-sm">{{ $annonce->category->name ?? 'Non catégorisé' }}</span>
                                            <span class="bg-green-700 bg-opacity-80 text-white text-xs px-2.5 py-1 rounded-full backdrop-blur-sm">Vérifié</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal de zoom d'image -->
                            <div id="zoomContainer" class="zoom-container">
                                <div class="zoom-close" onclick="closeZoom()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                
                                <div class="zoom-navigation zoom-prev" onclick="zoomChangeImage('prev')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </div>
                                
                                <img id="zoomImage" class="zoom-image" src="" alt="">
                                
                                <div class="zoom-navigation zoom-next" onclick="zoomChangeImage('next')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                                
                                <div class="image-counter text-white absolute bottom-5 left-1/2 transform -translate-x-1/2">
                                    <span id="zoomCurrentImageIndex">1</span>/{{ $imageCount }}
                                </div>
                            </div>
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900 text-gray-300">
                                <div class="text-center px-6">
                                    <svg class="mx-auto h-24 w-24 opacity-20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-4 text-xl font-medium">Pas d'image disponible</p>
                                    <p class="mt-2 text-sm opacity-60">Le vendeur n'a pas encore ajouté d'images pour cette annonce</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Thumbnail Gallery (pour les images multiples) -->
                    <div class="bg-gray-900 p-4 flex space-x-2 overflow-x-auto">
                        @if($annonce->image)
                            @php
                                $images = explode(',', $annonce->image);
                            @endphp
                            
                            @foreach($images as $index => $image)
                                <div class="image-gallery-thumb h-16 w-16 rounded overflow-hidden flex-shrink-0 border-2 {{ $index == 0 ? 'border-amber-500' : 'border-transparent' }}" 
                                    onclick="selectImage({{ $index }})" 
                                    id="thumb-{{ $index }}">
                                    <img src="{{ asset($image) }}" alt="Thumbnail {{ $index + 1 }}" class="h-full w-full object-cover">
                                </div>
                            @endforeach
                            
                            @for($i = count($images); $i < 3; $i++)
                                <div class="image-gallery-thumb h-16 w-16 rounded overflow-hidden flex-shrink-0 border-2 border-transparent opacity-50 cursor-not-allowed bg-gray-700"></div>
                            @endfor
                        @else
                            <div class="image-gallery-thumb h-16 w-16 rounded overflow-hidden flex-shrink-0 border-2 border-amber-500">
                                <div class="h-full w-full bg-gray-700 flex items-center justify-center text-gray-400">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="image-gallery-thumb h-16 w-16 rounded overflow-hidden flex-shrink-0 border-2 border-transparent opacity-50 cursor-not-allowed bg-gray-700"></div>
                            <div class="image-gallery-thumb h-16 w-16 rounded overflow-hidden flex-shrink-0 border-2 border-transparent opacity-50 cursor-not-allowed bg-gray-700"></div>
                        @endif
                    </div>
                </div>

                <!-- Right: Details Summary -->
                <div class="w-full lg:w-2/5 p-8">
                    <!-- Header with title and action buttons -->
                    <div class="flex justify-between items-start">
                        <h1 class="text-3xl font-bold text-gray-800 leading-tight">{{ $annonce->title }}</h1>
                        <div class="flex space-x-2">
                            <button type="button" class="group p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                            </button>
                            <button type="button" class="group p-2 rounded-full bg-gray-100 hover:bg-red-100 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <button type="button" id="reportButton" class="group p-2 rounded-full bg-gray-100 hover:bg-orange-100 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Price with badge -->
                    <div class="mt-6 mb-8">
                        <div class="inline-flex price-tag bg-gradient-to-r from-amber-400 to-amber-700 text-white font-bold text-2xl py-3 px-6 rounded-lg shadow-lg">
                            {{ number_format($annonce->price, 2) }} €
                        </div>
                    </div>

                    <!-- Key details with icons -->
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-500">Localisation</p>
                                <p class="text-base font-medium text-gray-900">{{ $annonce->location }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-500">Publié le</p>
                                <p class="text-base font-medium text-gray-900">{{ \Carbon\Carbon::parse($annonce->created_at)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-500">Vendeur</p>
                                <p class="text-base font-medium text-gray-900 flex items-center">
                                    {{ $annonce->user->name }}
                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="mr-1 h-3 w-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Vérifié
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Call to action button -->
                    <div class="space-y-4">
                        @auth
                            @if($annonce->user->id !== auth()->id())
                                <a href="" class="group w-full flex items-center justify-center px-6 py-4 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-amber-400 to-amber-700 hover:from-amber-500 hover:to-amber-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transform transition-all hover:scale-[1.01] active:scale-[0.99] shadow-lg hover:shadow-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    Contacter le vendeur
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="group w-full flex items-center justify-center px-6 py-4 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-amber-400 to-amber-700 hover:from-amber-500 hover:to-amber-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transform transition-all hover:scale-[1.01] active:scale-[0.99] shadow-lg hover:shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Se connecter pour contacter
                            </a>
                        @endauth
                        
                        @if($annonce->user->id === auth()->id())
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <a href="annonce/{{$annonce->id}}" class="flex justify-center items-center px-4 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Modifier
                                </a>
                                <form action="annonce/delete/{{$annonce->id}}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="w-full flex justify-center items-center px-4 py-3 border border-red-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="p-8 border-t border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Description détaillée
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    <p>{{ $annonce->description }}</p>
                </div>
            </div>

            <!-- Security Tips Section -->
            <div class="p-6 bg-yellow-50 border-t border-yellow-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Conseils de sécurité</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>Rencontrez le vendeur dans un lieu public et vérifiez l'article avant de payer. Ne payez jamais en avance par virement bancaire ou Western Union.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor Card -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="p-6 sm:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    À propos du vendeur
                </h2>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <div class="flex-shrink-0 h-24 w-24 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 text-2xl font-bold border-4 border-white shadow-lg">
                        {{ substr($annonce->user->name, 0, 1) }}
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-6 flex-1">
                        <h3 class="text-lg font-bold text-gray-900">{{ $annonce->user->name }}</h3>
                        <p class="text-sm text-gray-500">Membre depuis {{ \Carbon\Carbon::parse($annonce->user->created_at)->format('M Y') }}</p>
                        
                        <div class="mt-2 flex items-center">
                            <!-- Stars rating display -->
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-600">4.0 sur 5 (12 avis)</p>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-6">
                        <a href="/profile/view/{{$annonce->user->id}}" class="inline-flex items-center px-4 py-2 border border-amber-600 shadow-sm text-sm font-medium rounded-md text-amber-600 bg-white hover:bg-amber-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Voir le profil
                        </a>
                    </div>
                    <a href="{{ route('chat', $annonce->user_id) }}" class="inline-flex items-center px-4 py-2 border border-green-600 shadow-sm text-sm font-medium rounded-md text-green-600 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        Envoyer un message
                    </a>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <div class="text-sm font-medium text-gray-500">Annonces publiées</div>
                        <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalAnnonces }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <div class="text-sm font-medium text-gray-500">Taux de réponse</div>
                        <div class="mt-1 text-2xl font-semibold text-gray-900">98%</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <div class="text-sm font-medium text-gray-500">Temps de réponse</div>
                        <div class="mt-1 text-2xl font-semibold text-gray-900">< 1h</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <div class="text-sm font-medium text-gray-500">Dernière connexion</div>
                        <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $user->updated_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Similar Announcements -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Annonces similaires
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($similarAnnonces as $similarAnnonce)
                    @php
                        $imageParts = explode(',', $similarAnnonce->image);
                        $firstImage = count($imageParts) > 0 ? $imageParts[0] : null;
                        $gradientColors = ['from-amber-400 to-amber-600', 'from-green-400 to-green-600', 'from-purple-400 to-purple-600', 'from-red-400 to-red-600', 'from-yellow-400 to-yellow-600'];
                        $randomGradient = $gradientColors[array_rand($gradientColors)];
                        $timeAgo = $similarAnnonce->created_at->diffForHumans();
                    @endphp
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg transform hover:-translate-y-1">
                        <div class="relative">
                            @if($firstImage)
                                <div class="h-48 bg-gray-200">
                                    <img src="{{ asset($firstImage) }}" alt="{{ $similarAnnonce->title }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br {{ $randomGradient }} flex items-center justify-center">
                                    <svg class="h-12 w-12 text-white opacity-30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-3 left-3">
                                <span class="bg-amber-700 text-white text-xs px-2.5 py-1 rounded font-medium">{{ $similarAnnonce->category->name }}</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-baseline">
                                <span class="text-sm font-semibold text-amber-700">{{ number_format($similarAnnonce->price, 2) }} €</span>
                                <span class="text-xs text-gray-500">{{ $timeAgo }}</span>
                            </div>
                            <h3 class="mt-1 text-lg font-semibold text-gray-900 truncate">{{ $similarAnnonce->title }}</h3>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $similarAnnonce->location }}
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('user.annonceDetail', $similarAnnonce->id) }}" class="block w-full text-center py-2 px-4 border border-amber-500 text-amber-500 rounded hover:bg-amber-50 transition">
                                    Voir l'annonce
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 p-8 text-center bg-gray-50 rounded-xl border border-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">Aucune annonce similaire trouvée</h3>
                        <p class="text-gray-500">Il n'y a pas d'autres annonces dans cette catégorie pour le moment</p>
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- Back button with nice styling -->
        <div class="mt-10">
            <a href="{{ route('user.dashboard') }}" class="group inline-flex items-center px-5 py-3 text-base font-medium rounded-lg text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-sm transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500 group-hover:text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour aux annonces
            </a>
        </div>
    </div>
</div>

<!-- Modal de signalement -->
<div id="reportModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full transform transition-all">
        <!-- En-tête du modal -->
        <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                Signaler cette annonce
            </h3>
            <button id="closeReportModal" class="text-gray-400 hover:text-gray-500">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Corps du modal -->
        <div class="px-6 py-4">
            <p class="text-sm text-gray-600 mb-4">Veuillez sélectionner la raison pour laquelle vous souhaitez signaler cette annonce. Votre signalement sera examiné par notre équipe.</p>
            
            <form id="reportForm" action="/user/report/{{  $annonce->id   }}" method="POST">
                @csrf
                <input type="text" class="hidden" name="annonce_id" value="{{ $annonce->id }}">
                <input type="text" class="hidden" name="user_id" value="{{ $annonce->user_id }}">
                <div class="space-y-3">
                    <div class="flex items-center">
                        <input id="reason_scam" name="message" type="radio" value="scam" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300">
                        <label for="reason_scam" class="ml-3 block text-sm font-medium text-gray-700">
                            Arnaque ou tentative de fraude
                        </label>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="reason_fake" name="message" type="radio" value="fake" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300">
                        <label for="reason_fake" class="ml-3 block text-sm font-medium text-gray-700">
                            Fausse annonce ou produit contrefait
                        </label>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="reason_offensive" name="message" type="radio" value="offensive" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300">
                        <label for="reason_offensive" class="ml-3 block text-sm font-medium text-gray-700">
                            Contenu offensant ou inapproprié
                        </label>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="reason_rules" name="message" type="radio" value="rules" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300">
                        <label for="reason_rules" class="ml-3 block text-sm font-medium text-gray-700">
                            Ne respecte pas les règles du site
                        </label>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="reason_other" name="message" type="radio" value="other" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300">
                        <label for="reason_other" class="ml-3 block text-sm font-medium text-gray-700">
                            Autre raison
                        </label>
                    </div>
                </div>
                
                <div id="otherReasonContainer" class="mt-4 hidden">
                    <label for="other_reason" class="block text-sm font-medium text-gray-700 mb-1">
                        Veuillez préciser
                    </label>
                    <textarea id="other_reason" name="other_reason" rows="3" class="shadow-sm focus:ring-orange-500 focus:border-orange-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Décrivez la raison de votre signalement..."></textarea>
                </div>
                
                <div class="mt-6">
                    <p class="text-xs text-gray-500 mb-4">En signalant cette annonce, vous acceptez que notre équipe puisse vous contacter pour plus d'informations si nécessaire.</p>
                    
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancelReport" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Annuler
                        </button>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Envoyer le signalement
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts pour la galerie d'images - Placé directement dans la page -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables globales pour la galerie d'images
        let currentImageIndex = 0;
        let totalImages = {{ isset($images) ? count($images) : 0 }};
        
        // Définir les fonctions globalement pour qu'elles soient accessibles depuis les événements onClick
        window.changeImage = function(direction) {
            // Cacher l'image actuelle
            let images = document.querySelectorAll('#mainImageContainer img');
            if (!images || images.length === 0) return;
            
            images[currentImageIndex].style.opacity = 0;
            images[currentImageIndex].style.pointerEvents = 'none';
            
            // Calculer le nouvel index
            if (direction === 'next') {
                currentImageIndex = (currentImageIndex + 1) % totalImages;
            } else {
                currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
            }
            
            // Afficher la nouvelle image
            images[currentImageIndex].style.opacity = 1;
            images[currentImageIndex].style.pointerEvents = 'auto';
            
            // Mettre à jour le compteur
            const counterElement = document.getElementById('currentImageIndex');
            if (counterElement) {
                counterElement.textContent = currentImageIndex + 1;
            }
            
            // Mettre à jour la bordure des miniatures
            updateThumbnailSelection();
        };
        
        // Sélection d'une image spécifique via les miniatures
        window.selectImage = function(index) {
            if (index !== currentImageIndex) {
                // Cacher l'image actuelle
                let images = document.querySelectorAll('#mainImageContainer img');
                if (!images || images.length === 0) return;
                
                images[currentImageIndex].style.opacity = 0;
                images[currentImageIndex].style.pointerEvents = 'none';
                
                // Définir le nouvel index
                currentImageIndex = index;
                
                // Afficher la nouvelle image
                images[currentImageIndex].style.opacity = 1;
                images[currentImageIndex].style.pointerEvents = 'auto';
                
                // Mettre à jour le compteur
                const counterElement = document.getElementById('currentImageIndex');
                if (counterElement) {
                    counterElement.textContent = currentImageIndex + 1;
                }
                
                // Mettre à jour la bordure des miniatures
                updateThumbnailSelection();
            }
        };
        
        // Mettre à jour la bordure des miniatures
        function updateThumbnailSelection() {
            // Enlever la bordure ambrée de toutes les miniatures
            let thumbs = document.querySelectorAll('.image-gallery-thumb');
            thumbs.forEach((thumb, index) => {
                if (index < totalImages) {
                    thumb.classList.remove('border-amber-500');
                    thumb.classList.add('border-transparent');
                }
            });
            
            // Ajouter la bordure ambrée à la miniature active
            const activeThumb = document.getElementById('thumb-' + currentImageIndex);
            if (activeThumb) {
                activeThumb.classList.remove('border-transparent');
                activeThumb.classList.add('border-amber-500');
            }
        }
        
        // Fonctionnalité de zoom
        window.openZoom = function(index = currentImageIndex) {
            const zoomContainer = document.getElementById('zoomContainer');
            const zoomImage = document.getElementById('zoomImage');
            const images = document.querySelectorAll('#mainImageContainer img');
            
            if (!zoomContainer || !zoomImage || !images || images.length === 0) return;
            
            // Définir l'image à zoomer
            currentImageIndex = index;
            zoomImage.src = images[currentImageIndex].src;
            zoomImage.alt = images[currentImageIndex].alt;
            
            // Mettre à jour le compteur
            const zoomCounter = document.getElementById('zoomCurrentImageIndex');
            if (zoomCounter) {
                zoomCounter.textContent = currentImageIndex + 1;
            }
            
            // Afficher le conteneur de zoom
            zoomContainer.classList.add('active');
            document.body.style.overflow = 'hidden'; // Empêcher le défilement de la page
        };
        
        window.closeZoom = function() {
            const zoomContainer = document.getElementById('zoomContainer');
            if (!zoomContainer) return;
            
            zoomContainer.classList.remove('active');
            document.body.style.overflow = ''; // Permettre à nouveau le défilement de la page
        };
        
        window.zoomChangeImage = function(direction) {
            // Calculer le nouvel index
            if (direction === 'next') {
                currentImageIndex = (currentImageIndex + 1) % totalImages;
            } else {
                currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
            }
            
            // Mettre à jour l'image de zoom
            const zoomImage = document.getElementById('zoomImage');
            const images = document.querySelectorAll('#mainImageContainer img');
            
            if (!zoomImage || !images || images.length === 0) return;
            
            zoomImage.src = images[currentImageIndex].src;
            zoomImage.alt = images[currentImageIndex].alt;
            
            // Mettre à jour le compteur
            const zoomCounter = document.getElementById('zoomCurrentImageIndex');
            if (zoomCounter) {
                zoomCounter.textContent = currentImageIndex + 1;
            }
            
            // Mettre à jour aussi l'image principale et les miniatures
            let mainImages = document.querySelectorAll('#mainImageContainer img');
            mainImages.forEach((img, idx) => {
                img.style.opacity = idx === currentImageIndex ? 1 : 0;
                img.style.pointerEvents = idx === currentImageIndex ? 'auto' : 'none';
            });
            
            // Mettre à jour le compteur principal
            const mainCounter = document.getElementById('currentImageIndex');
            if (mainCounter) {
                mainCounter.textContent = currentImageIndex + 1;
            }
            
            // Mettre à jour la bordure des miniatures
            updateThumbnailSelection();
        };
        
        // Gestion des touches du clavier
        document.addEventListener('keydown', function(e) {
            // Vérifier si le zoom est actif
            const zoomContainer = document.getElementById('zoomContainer');
            if (!zoomContainer) return;
            
            const isZoomActive = zoomContainer.classList.contains('active');
            
            if (isZoomActive) {
                // Navigation dans le mode zoom
                if (e.key === 'ArrowLeft') {
                    window.zoomChangeImage('prev');
                } else if (e.key === 'ArrowRight') {
                    window.zoomChangeImage('next');
                } else if (e.key === 'Escape') {
                    window.closeZoom();
                }
            } else {
                // Navigation dans la galerie principale
                if (e.key === 'ArrowLeft') {
                    window.changeImage('prev');
                } else if (e.key === 'ArrowRight') {
                    window.changeImage('next');
                }
            }
        });
        
        // Empêcher le zoom de se fermer lorsqu'on clique sur l'image
        const zoomImage = document.getElementById('zoomImage');
        if (zoomImage) {
            zoomImage.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }
        
        // Fermer le zoom lorsqu'on clique à l'extérieur de l'image
        const zoomContainer = document.getElementById('zoomContainer');
        if (zoomContainer) {
            zoomContainer.addEventListener('click', function() {
                window.closeZoom();
            });
        }

        // Gestion du modal de signalement
        const reportModal = document.getElementById('reportModal');
        const reportButton = document.getElementById('reportButton');
        const closeReportModal = document.getElementById('closeReportModal');
        const cancelReport = document.getElementById('cancelReport');
        const reasonOther = document.getElementById('reason_other');
        const otherReasonContainer = document.getElementById('otherReasonContainer');
        
        // Ouvrir le modal
        if (reportButton) {
            reportButton.addEventListener('click', function() {
                reportModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Empêcher le défilement
            });
        }
        
        // Fermer le modal
        function closeModal() {
            reportModal.classList.add('hidden');
            document.body.style.overflow = ''; // Restaurer le défilement
        }
        
        if (closeReportModal) closeReportModal.addEventListener('click', closeModal);
        if (cancelReport) cancelReport.addEventListener('click', closeModal);
        
        
        
        reportModal.addEventListener('click', function(e) {
            if (e.target === reportModal) {
                closeModal();
            }
        });
        
        // Afficher le champ de texte lorsque "Autre raison" est sélectionné
        if (reasonOther) {
            reasonOther.addEventListener('change', function() {
                otherReasonContainer.classList.toggle('hidden', !this.checked);
            });
        }
        
        // Écouter tous les boutons radio pour la raison
        document.querySelectorAll('input[name="reason"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                otherReasonContainer.classList.toggle('hidden', this.id !== 'reason_other');
            });
        });
        
        // Validation du formulaire avant soumission
        const reportForm = document.getElementById('reportForm');
        if (reportForm) {
            reportForm.addEventListener('submit', function(e) {
                const selectedReason = document.querySelector('input[name="message"]:checked');
                
                if (!selectedReason) {
                    e.preventDefault();
                    alert('Veuillez sélectionner une raison pour votre signalement.');
                    return false;
                }
                
                if (selectedReason.value === 'other') {
                    const otherReasonText = document.getElementById('other_reason').value.trim();
                    if (!otherReasonText) {
                        e.preventDefault();
                        alert('Veuillez préciser la raison de votre signalement.');
                        return false;
                    }
                }
                
                
                // Simuler une soumission avec feedback
                const submitButton = reportForm.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Traitement en cours...
                `;
                
                setTimeout(function() {
                    closeModal();
                    
                    // Afficher un message de confirmation
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'fixed bottom-5 right-5 bg-green-50 p-4 rounded-lg shadow-lg border border-green-200 max-w-md animate-fade-in-up z-50';
                    alertDiv.innerHTML = `
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-green-800">Signalement envoyé</h3>
                                <div class="mt-1 text-xs text-green-700">
                                    <p>Merci pour votre signalement. Notre équipe l'examinera dans les plus brefs délais.</p>
                                </div>
                            </div>
                            <div class="ml-auto pl-3">
                                <div class="-mx-1.5 -my-1.5">
                                    <button class="close-alert inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none">
                                        <span class="sr-only">Fermer</span>
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    document.body.appendChild(alertDiv);
                    
                    // Ajouter des gestionnaires d'événements pour le bouton de fermeture
                    alertDiv.querySelector('.close-alert').addEventListener('click', function() {
                        alertDiv.remove();
                    });
                    
                    // Supprimer automatiquement après 5 secondes
                    setTimeout(function() {
                        if (document.body.contains(alertDiv)) {
                            alertDiv.classList.add('animate-fade-out-down');
                            setTimeout(function() {
                                if (document.body.contains(alertDiv)) {
                                    alertDiv.remove();
                                }
                            }, 500);
                        }
                    }, 5000);
                    
                    // Réinitialiser le bouton et le formulaire
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalText;
                    reportForm.reset();
                }, 1500);
            });
        }
    });
</script>

<style>
    /* Ajout des animations pour les notifications */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fade-out-down {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(10px);
        }
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.3s ease-out forwards;
    }
    
    .animate-fade-out-down {
        animation: fade-out-down 0.3s ease-out forwards;
    }
</style>
@endsection



