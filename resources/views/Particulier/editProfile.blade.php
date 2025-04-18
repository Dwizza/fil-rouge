@extends('layouts.particulier')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <!-- En-tête de la page -->
        <div class="mb-8 text-center sm:text-left">
            <h1 class="text-3xl font-bold text-gray-900">Modifier votre profil</h1>
            <p class="mt-2 text-gray-600">Mettez à jour vos informations personnelles</p>
        </div>
        
        <!-- Formulaire de modification -->
        <form action="{{route('user.profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <!-- Section photo de profil -->
                <div class="relative">
                    <div class="h-40 bg-gradient-to-r from-amber-400 to-amber-600"></div>
                    <div class="absolute top-28 inset-x-0 flex justify-center">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full border-4 border-white bg-white overflow-hidden">
                                <img id="preview-image" src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=random' }}" 
                                     alt="Photo de profil" class="w-full h-full object-cover">
                            </div>
                            <label for="profile_photo" class="absolute bottom-0 right-0 w-10 h-10 bg-amber-500 rounded-full border-4 border-white flex items-center justify-center cursor-pointer hover:bg-amber-600 transition-colors duration-300">
                                <i class="fa-solid fa-camera text-white text-sm"></i>
                                <input type="file" id="profile_photo" name="photo" class="hidden" accept="image/*" onchange="previewImage()">
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Contenu du formulaire -->
                <div class="px-6 pt-24 pb-8">
                    <!-- Informations personnelles -->
                    <div class="space-y-6">
                        <!-- Informations de base -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" 
                                           class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">
                                </div>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}" 
                                           class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Numéro de téléphone</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-phone text-gray-400"></i>
                                    </div>
                                    <input type="tel" id="phone" name="phone" value="{{ $user->phone ?? '' }}" 
                                           class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">
                                </div>
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <!-- Adresse -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Adresse</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fa-solid fa-location-dot text-gray-400"></i>
                                        </div>
                                        <input type="text" id="address" name="address" value="{{ $user->address ?? '' }}" 
                                               class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">
                                    </div>
                                    @error('address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                {{-- <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fa-solid fa-city text-gray-400"></i>
                                        </div>
                                        <input type="text" id="city" name="city" value="{{ auth()->user()->city ?? '' }}" 
                                               class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">
                                    </div>
                                    @error('city')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Région</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fa-solid fa-map text-gray-400"></i>
                                        </div>
                                        <input type="text" id="state" name="state" value="{{ auth()->user()->state ?? '' }}" 
                                               class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">
                                    </div>
                                    @error('state')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                
                            </div>
                        </div>
                        
                        {{-- <!-- Bio -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Biographie</label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                    <i class="fa-solid fa-comment text-gray-400"></i>
                                </div>
                                <textarea id="bio" name="bio" rows="4" 
                                          class="pl-10 w-full border border-gray-300 rounded-lg py-3 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300">{{ auth()->user()->bio ?? '' }}</textarea>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Partagez quelques informations sur vous-même (maximum 200 caractères)</p>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-4">
                    <a href="{{route('user.dashboard')}}" class="py-3 px-6 bg-white text-gray-700 font-medium border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300">
                        Annuler
                    </a>
                    <button type="submit" class="py-3 px-6 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-medium rounded-lg shadow-md hover:from-amber-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                        Enregistrer les modifications
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const input = document.getElementById('profile_photo');
        const preview = document.getElementById('preview-image');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection