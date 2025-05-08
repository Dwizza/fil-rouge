@extends('layouts.company')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-dark-card border border-dark-border shadow-lg rounded-xl bg-clip-border text-white">
                <div class="p-5 border-b border-dark-border">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-0 text-lg font-bold text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-brand-amber" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            Messages
                        </h5>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row min-h-[600px]">
                    <!-- Contacts/Conversations List -->
                    <div class="w-full md:w-1/3 border-r border-dark-border">
                        <div class="p-4">
                            <div class="relative mb-4">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </span>
                                <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-dark-border rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-amber focus:border-brand-amber bg-gray-800/50 text-gray-200" placeholder="Rechercher...">
                            </div>

                            <div class="overflow-y-auto h-[500px] conversation-list custom-scrollbar">
                                @if(count($chatData) > 0)
                                    @foreach($chatData as $index => $chat)
                                        @php
                                            $user = $chat['user'];
                                            $lastMessage = $chat['last_message'];
                                            $unreadCount = $chat['unread_count'];
                                            $isActive = $activeChat && $activeChat['user']->id == $user->id;
                                            
                                            // Format time
                                            $time = \Carbon\Carbon::parse($lastMessage->created_at);
                                            $now = \Carbon\Carbon::now();
                                            
                                            if($time->isToday()) {
                                                $formattedTime = $time->format('H:i');
                                            } elseif($time->isYesterday()) {
                                                $formattedTime = 'Hier';
                                            } elseif($time->isCurrentWeek()) {
                                                $formattedTime = $time->locale('fr')->dayName;
                                            } else {
                                                $formattedTime = $time->format('d M');
                                            }
                                        @endphp
                                        <!-- Conversation Item -->
                                        <a href="{{ route('company.chat', $user->id) }}" class="block">
                                            <div class="conversation-item {{ $isActive ? 'bg-brand-amber/10 border-l-4 border-brand-amber' : '' }} p-4 mb-2 rounded-lg cursor-pointer hover:bg-gray-800/60 transition-all">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <div class="relative">
                                                            @if($user->photo)
                                                                <img class="h-12 w-12 rounded-full object-cover border-2 {{ $isActive ? 'border-brand-amber' : 'border-gray-700' }}" src="{{ asset('storage/',$user->photo) }}" alt="{{ $user->name }}">
                                                            @else
                                                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-white font-bold text-xl shadow-md">
                                                                    {{ substr($user->name, 0, 2) }}
                                                                </div>
                                                            @endif
                                                            <span class="absolute bottom-0 right-0 block h-3.5 w-3.5 rounded-full {{ $user->updated_at > now()->subMinutes(15) ? 'bg-green-400 ring-2 ring-gray-800' : 'bg-gray-500' }}"></span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-3 flex-1">
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm font-medium text-white">{{ $user->name }}</p>
                                                            <p class="text-xs text-gray-400">{{ $formattedTime }}</p>
                                                        </div>
                                                        @if($unreadCount > 0)
                                                            <div class="flex items-center mt-1.5">
                                                                <span class="bg-brand-amber text-gray-900 text-xs font-bold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                                                                <p class="text-xs text-gray-100 line-clamp-1 ml-2 font-medium">{{ Str::limit($lastMessage->content, 30) }}</p>
                                                            </div>
                                                        @else
                                                            <p class="text-xs text-gray-400 line-clamp-1 mt-1">{{ Str::limit($lastMessage->content, 40) }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="p-10 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        <p class="text-gray-400">Pas de conversations.</p>
                                        <p class="text-gray-500 text-sm mt-1">Vos conversations apparaîtront ici.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="w-full md:w-2/3 flex flex-col h-[600px]">
                        @if($activeChat)
                            @php
                                $activeUser = $activeChat['user'];
                                $activeMessages = $activeChat['messages'] ?? [];
                            @endphp
                            <!-- Chat Header -->
                            <div class="border-b border-dark-border p-4 flex-shrink-0">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 relative">
                                            @if($activeUser->photo)
                                                <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-700" src="{{ asset($activeUser->photo) }}" alt="{{ $activeUser->name }}">
                                            @else
                                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-white font-bold text-xl shadow-md">
                                                    {{ substr($activeUser->name, 0, 2) }}
                                                </div>
                                            @endif
                                            <span class="absolute bottom-0 right-0 block h-3.5 w-3.5 rounded-full {{ $activeUser->updated_at > now()->subMinutes(15) ? 'bg-green-400 ring-2 ring-gray-800' : 'bg-gray-500' }}"></span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-white">{{ $activeUser->name }}</p>
                                            <p class="text-xs text-gray-400">
                                                {{ $activeUser->updated_at > now()->subMinutes(15) ? 'En ligne' : 'Dernière connexion ' . \Carbon\Carbon::parse($activeUser->updated_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-1.5">
                                        <button class="p-2 rounded-full hover:bg-gray-700/60 transition-all text-gray-400 hover:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </button>
                                        <button class="p-2 rounded-full hover:bg-gray-700/60 transition-all text-gray-400 hover:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                        <button class="p-2 rounded-full hover:bg-gray-700/60 transition-all text-gray-400 hover:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Message Area -->
                            <div class="flex-1 overflow-y-auto bg-gray-900/30 custom-scrollbar" id="message-container" style="max-height: calc(600px - 132px);">
                                <div class="space-y-4 p-4">
                                    @php
                                        $currentDate = null;
                                    @endphp
                                    
                                    @foreach($activeMessages as $message)
                                        @php
                                            $messageDate = \Carbon\Carbon::parse($message->created_at)->toDateString();
                                            $showDateSeparator = $currentDate !== $messageDate;
                                            $currentDate = $messageDate;
                                            
                                            $isMe = $message->sender_id === auth()->id();
                                            $formattedTime = \Carbon\Carbon::parse($message->created_at)->format('H:i');
                                        @endphp
                                        
                                        @if($showDateSeparator)
                                            <!-- Date Separator -->
                                            <div class="flex justify-center my-4">
                                                <div class="bg-gray-800/80 px-4 py-1 rounded-full shadow-inner backdrop-blur-sm">
                                                    <span class="text-xs font-medium text-gray-300">
                                                        @if(\Carbon\Carbon::parse($messageDate)->isToday())
                                                            Aujourd'hui
                                                        @elseif(\Carbon\Carbon::parse($messageDate)->isYesterday())
                                                            Hier
                                                        @else
                                                            {{ \Carbon\Carbon::parse($messageDate)->locale('fr')->isoFormat('LL') }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($isMe)
                                            <!-- Sent Message -->
                                            <div class="flex items-end justify-end">
                                                <div class="bg-gradient-to-r from-amber-500 to-amber-600 rounded-2xl rounded-tr-none py-2.5 px-4 max-w-xs lg:max-w-md text-white shadow-lg">
                                                    <p class="text-sm">{{ $message->content }}</p>
                                                    <div class="flex justify-end mt-1 items-center">
                                                        <p class="text-xs text-amber-100/80">{{ $formattedTime }}</p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-1 {{ $message->read ? 'text-amber-100' : 'text-amber-100/50' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Received Message -->
                                            <div class="flex items-end">
                                                <div class="flex-shrink-0 mr-3">
                                                    @if($activeUser->photo)
                                                        <img class="h-8 w-8 rounded-full object-cover border border-gray-700" src="{{ asset($activeUser->photo) }}" alt="{{ $activeUser->name }}">
                                                    @else
                                                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-gray-500 to-gray-600 flex items-center justify-center text-white font-bold text-xs shadow-md">
                                                            {{ substr($activeUser->name, 0, 2) }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="bg-gray-800 rounded-2xl rounded-tl-none py-2.5 px-4 max-w-xs lg:max-w-md shadow-md">
                                                    <p class="text-sm text-white">{{ $message->content }}</p>
                                                    <p class="text-xs text-gray-400 mt-1">{{ $formattedTime }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Message Input -->
                            <div class="border-t border-dark-border p-3 flex-shrink-0 bg-dark-card/60">
                                <form id="message-form" action="{{ route('chat.send_company') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $activeUser->id }}">
                                    <div class="flex items-center space-x-2">
                                        <button type="button" class="p-2.5 rounded-full hover:bg-gray-700/60 transition-all text-gray-400 hover:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                        </button>
                                        <button type="button" class="p-2.5 rounded-full hover:bg-gray-700/60 transition-all text-gray-400 hover:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                        <div class="flex-1 relative">
                                            <input type="text" name="content" class="w-full pr-10 py-2.5 pl-4 border border-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-brand-amber focus:border-brand-amber bg-gray-800/50 text-white" placeholder="Tapez votre message...">
                                            <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 p-1.5 rounded-full hover:bg-gray-700/60 transition-all text-gray-400 hover:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <button type="submit" class="p-3 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full text-white hover:shadow-lg hover:shadow-amber-500/25 transition-all transform hover:scale-105 active:scale-95">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="flex-1 flex items-center justify-center bg-gray-900/30">
                                <div class="text-center p-6">
                                    <div class="mb-6 inline-flex p-5 rounded-full bg-gray-800/50 text-brand-amber">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-medium text-white mb-2">Pas de conversation sélectionnée</h3>
                                    <p class="text-gray-400 text-sm">Sélectionnez une conversation pour commencer à discuter.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom scrollbar styling */
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(30, 41, 59, 0.2);
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(245, 158, 11, 0.5);
        border-radius: 20px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: rgba(245, 158, 11, 0.7);
    }

    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(245, 158, 11, 0.5) rgba(30, 41, 59, 0.2);
    }
</style>

<script>
    // JavaScript pour gestion des interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll to bottom des messages
        const messageContainer = document.getElementById('message-container');
        if (messageContainer) {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }
        
        // Auto-scroll on new messages
        const form = document.getElementById('message-form');
        if (form) {
            form.addEventListener('submit', function() {
                setTimeout(function() {
                    messageContainer.scrollTop = messageContainer.scrollHeight;
                }, 100);
            });
        }
    });
</script>
@endsection