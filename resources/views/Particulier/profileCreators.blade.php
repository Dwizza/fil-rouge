@extends('layouts.particulier')

@section('content')
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

@if ($user->role->name == 'admin')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-2xl w-full p-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-red-600 p-6 text-white">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white bg-opacity-20 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold">Access Denied</h1>
                    </div>
                </div>
                <div class="p-8">
                    <div class="border-l-4 border-red-500 bg-red-50 p-4 mb-6">
                        <div class="flex">
                            <div class="ml-3">
                                <p class="text-sm text-red-700">
                                    This page is blocked. You don't have permission to view this content.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4 text-gray-700">
                        <p>You are currently logged in as <strong>{{ $user->name }}</strong> and your user role does not have sufficient permissions to access this resource.</p>
                        
                        <p>If you believe this is an error, please contact the website administrator for assistance.</p>
                    </div>
                    
                    <div class="mt-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('home') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium rounded-lg bg-gray-800 hover:bg-gray-700 text-white transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Return Home
                        </a>
                        <a href="{{ url()->previous() }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium rounded-lg border border-gray-300 hover:bg-gray-100 text-gray-700 transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                            </svg>
                            Go Back
                        </a>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        Error code: 403 Forbidden | Time: {{ now()->format('Y-m-d H:i:s') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

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
                        <a href="{{ route('user.dashboard') }}" class="ml-2 text-gray-500 hover:text-amber-600 transition">Profils</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-2 text-amber-700 font-semibold">{{ $user->name }}</span>
                    </li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Left Column - User Profile -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Profile Header -->
                        <div class="relative h-40 bg-gradient-to-r from-amber-400 to-amber-700">
                            <div class="absolute bottom-0 left-0 w-full transform translate-y-1/2 flex justify-center">
                                <div class="h-32 w-32 rounded-full border-4 border-white bg-white overflow-hidden shadow-lg">
                                    @if($user->photo)
                                        <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="h-full w-full flex items-center justify-center bg-amber-100 text-amber-700 text-4xl font-bold">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Profile Info -->
                        <div class="pt-20 pb-8 px-6 text-center">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                            <p class="text-gray-500 mt-1">Membre depuis {{ \Carbon\Carbon::parse($user->created_at)->format('M Y') }}</p>
                            
                            <!-- Verification Badge -->
                            <div class="inline-flex items-center px-2.5 py-1 mt-3 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-3.5 h-3.5 mr-1 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Vendeur vérifié
                            </div>
                            
                            <!-- User Stats -->
                            <div class="grid grid-cols-3 gap-4 mt-8">
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-800">{{ $totalAnnonces }}</p>
                                    <p class="text-xs text-gray-500">Annonces</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-800">4.8</p>
                                    <p class="text-xs text-gray-500">Évaluation</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-800">98%</p>
                                    <p class="text-xs text-gray-500">Réponses</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Information -->
                        <div class="bg-gray-50 px-6 py-4">
                            <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Contact</h3>
                            <div class="space-y-3">
                                <div class="flex items-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <a href="mailto:{{ $user->email }}" class="text-amber-600 hover:underline">{{ $user->email }}</a>
                                </div>
                                @if($user->phone)
                                <div class="flex items-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="text-gray-700">{{ $user->phone }}</span>
                                </div>
                                @endif
                                @if($user->address)
                                <div class="flex items-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-gray-700">{{ $user->address }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="px-6 py-4 space-y-3">
                            <a href="mailto:{{ $user->email }}" class="block w-full bg-gradient-to-r from-amber-400 to-amber-700 hover:from-amber-500 hover:to-amber-800 text-white text-center py-2 rounded-md transition duration-150 ease-in-out flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Email Contact 
                            </a>
                            <a href="{{ route('chat', $user->id) }}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-md transition duration-150 ease-in-out flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                Send Messsage
                            </a>
                        </div>
                    </div>
                    
                    <!-- Reviews Summary Card (Optional) -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mt-6">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Évaluations</h3>
                        </div>
                        <div class="p-6 text-center">
                            <div class="text-5xl font-bold text-gray-800 mb-2">4.8</div>
                            <div class="flex justify-center mb-4">
                                <!-- Stars -->
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Basé sur 12 avis</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Seller's Listings -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-800">Annonces de {{ $user->name }}</h2>
                            <div class="flex space-x-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $totalAnnonces }} annonces
                                </span>
                            </div>
                        </div>
                        
                        <!-- Listings Grid -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @forelse($annonces as $annonce)
                                    @php
                                        $images = explode(',', $annonce->image);
                                        $firstImage = count($images) > 0 ? $images[0] : null;
                                        $timeAgo = $annonce->created_at->diffForHumans();
                                    @endphp
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-200">
                                        <div class="relative">
                                            @if($firstImage)
                                                <div class="h-48 bg-gray-200">
                                                    <img src="{{ asset($firstImage) }}" alt="{{ $annonce->title }}" class="w-full h-full object-cover">
                                                </div>
                                            @else
                                                <div class="h-48 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                                                    <svg class="h-12 w-12 text-white opacity-30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="absolute bottom-3 left-3">
                                                <span class="bg-amber-700 text-white text-xs px-2.5 py-1 rounded font-medium">{{ $annonce->category->name }}</span>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <div class="flex justify-between items-baseline">
                                                <span class="text-sm font-semibold text-amber-700">{{ number_format($annonce->price, 2) }} €</span>
                                                <span class="text-xs text-gray-500">{{ $timeAgo }}</span>
                                            </div>
                                            <h3 class="mt-1 text-lg font-semibold text-gray-900 truncate">{{ $annonce->title }}</h3>
                                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                {{ $annonce->location }}
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('user.annonceDetail', $annonce->id) }}" class="block w-full text-center py-2 px-4 border border-amber-500 text-amber-500 rounded hover:bg-amber-50 transition">
                                                    Voir l'annonce
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-3 p-8 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900 mb-1">Aucune annonce trouvée</h3>
                                        <p class="text-gray-500">Ce vendeur n'a pas encore publié d'annonces</p>
                                    </div>
                                @endforelse
                            </div>
                            
                            <!-- Pagination (if needed) -->
                            @if(isset($annonces) && $annonces instanceof \Illuminate\Pagination\LengthAwarePaginator && $annonces->hasPages())
                                <div class="mt-6 flex justify-center">
                                    {{ $annonces->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

@endsection