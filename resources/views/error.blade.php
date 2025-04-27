<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOTEA - État du compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets1/images/JOTEA-logo.png') }}" alt="JOTEA" class="h-16">
            </div>

            @if(auth()->check())
                @php
                    $user = auth()->user();
                    $status = $user->status ?? 'active';
                @endphp

                @if($status === 'inactive')
                    <!-- Compte inactif -->
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden border-t-4 border-red-500">
                        <div class="p-6">
                            <div class="flex items-center justify-center mb-6">
                                <div class="h-16 w-16 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold text-center text-gray-800 mb-3">Compte inactif</h2>
                            <p class="text-gray-600 text-center mb-6">
                                Votre compte a été désactivé par un administrateur. Contactez notre service client pour plus d'informations.
                            </p>
                            <div class="space-y-3">
                                <a href="mailto:support@jotea.com" class="block w-full text-center py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition duration-200">
                                    Contacter le support
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="block w-full">
                                    @csrf
                                    <button type="submit" class="w-full py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition duration-200">
                                        Se déconnecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($status === 'pending')
                    <!-- Compte en attente -->
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden border-t-4 border-amber-500">
                        <div class="p-6">
                            <div class="flex items-center justify-center mb-6">
                                <div class="h-16 w-16 bg-amber-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold text-center text-gray-800 mb-3">Vérification en cours</h2>
                            <p class="text-gray-600 text-center mb-6">
                                Votre compte est en cours de vérification. Ce processus peut prendre jusqu'à 24 heures ouvrables. Vous recevrez un email une fois votre compte approuvé.
                            </p>
                            <div class="space-y-3">
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-amber-600 bg-amber-200">
                                                En cours
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-amber-600">
                                                50%
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-amber-200">
                                        <div style="width:50%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-amber-500"></div>
                                    </div>
                                </div>
                                <a href="mailto:support@jotea.com" class="block w-full text-center py-3 px-4 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition duration-200">
                                    Contacter le support
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="block w-full">
                                    @csrf
                                    <button type="submit" class="w-full py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition duration-200">
                                        Se déconnecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Redirection vers la page d'accueil si le statut est actif -->
                    <script>
                        window.location.href = "{{ route('home') }}";
                    </script>
                @endif
            @else
                <!-- Non connecté -->
                <div class="bg-white shadow-xl rounded-lg overflow-hidden border-t-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-6">
                            <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-3">Bienvenue sur JOTEA</h2>
                        <p class="text-gray-600 text-center mb-6">
                            Veuillez vous connecter pour accéder à votre compte et profiter de nos services.
                        </p>
                        <div class="space-y-3">
                            <a href="{{ route('login') }}" class="block w-full text-center py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200">
                                Se connecter
                            </a>
                            <a href="{{ route('register') }}" class="block w-full text-center py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition duration-200">
                                Créer un compte
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="mt-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} JOTEA. Tous droits réservés.
        </div>
    </div>
</body>
</html>