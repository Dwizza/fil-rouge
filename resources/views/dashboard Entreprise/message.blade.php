@extends('layouts.company')

@section('dashboard.company')
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-slate-850 border-0 border-transparent border-solid shadow-dark-xl rounded-2xl bg-clip-border text-white">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-0 text-white font-bold">Messages</h5>
                        <div>
                            <button type="button" class="new-message-btn bg-gradient-to-r from-blue-500 to-violet-500 hover:from-blue-600 hover:to-violet-600 text-white font-bold py-2 px-4 rounded-lg flex items-center transition-all shadow-md">
                                <i class="fa fa-plus mr-2"></i> Nouveau Message
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row min-h-[600px]">
                    <!-- Contacts/Conversations List -->
                    <div class="w-full md:w-1/3 border-r border-gray-700">
                        <div class="p-4">
                            <div class="relative mb-4">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fa fa-search text-gray-400"></i>
                                </span>
                                <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-800 text-white" placeholder="Rechercher...">
                            </div>

                            <div class="overflow-y-auto h-[500px] conversation-list">
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
                                            <div class="conversation-item {{ $isActive ? 'bg-blue-900/30 border-l-4 border-blue-500' : '' }} p-4 mb-2 rounded-lg cursor-pointer hover:bg-slate-700 transition-all">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <div class="relative">
                                                            @if($user->photo)
                                                                <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('storage/',$user->photo) }}" alt="{{ $user->name }}">
                                                            @else
                                                                <div class="h-12 w-12 rounded-full bg-gradient-to-r from-amber-400 to-amber-700 flex items-center justify-center text-white font-bold text-xl">
                                                                    {{ substr($user->name, 0, 2) }}
                                                                </div>
                                                            @endif
                                                            <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full {{ $user->updated_at > now()->subMinutes(15) ? 'bg-green-400' : 'bg-gray-400' }} ring-2 ring-slate-800"></span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-3 flex-1">
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm font-medium text-white">{{ $user->name }}</p>
                                                            <p class="text-xs text-gray-400">{{ $formattedTime }}</p>
                                                        </div>
                                                        @if($unreadCount > 0)
                                                            <div class="flex items-center mt-1">
                                                                <span class="bg-blue-900 text-blue-300 text-xs font-medium px-2.5 py-0.5 rounded">{{ $unreadCount }}</span>
                                                                <p class="text-xs text-gray-300 line-clamp-1 ml-2">{{ Str::limit($lastMessage->content, 30) }}</p>
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
                                    <div class="p-6 text-center">
                                        <p class="text-gray-400">Pas de conversations.</p>
                                        <button class="mt-4 px-4 py-2 bg-gradient-to-r from-blue-500 to-violet-500 text-white rounded-lg hover:from-blue-600 hover:to-violet-600 transition-colors shadow-md">
                                            Démarrer une conversation
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="w-full md:w-2/3 flex flex-col">
                        @if($activeChat)
                            @php
                                $activeUser = $activeChat['user'];
                                $activeMessages = $activeChat['messages'] ?? [];
                            @endphp
                            <!-- Chat Header -->
                            <div class="border-b border-gray-700 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            @if($activeUser->photo)
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ asset($activeUser->photo) }}" alt="{{ $activeUser->name }}">
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-amber-400 to-amber-700 flex items-center justify-center text-white font-bold text-xl">
                                                    {{ substr($activeUser->name, 0, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-white">{{ $activeUser->name }}</p>
                                            <p class="text-xs text-gray-400">
                                                {{ $activeUser->updated_at > now()->subMinutes(15) ? 'En ligne' : 'Dernière connexion ' . \Carbon\Carbon::parse($activeUser->updated_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="p-2 rounded-full hover:bg-slate-700 transition-all">
                                            <i class="fa fa-phone text-gray-400"></i>
                                        </button>
                                        <button class="p-2 rounded-full hover:bg-slate-700 transition-all">
                                            <i class="fa fa-video text-gray-400"></i>
                                        </button>
                                        <button class="p-2 rounded-full hover:bg-slate-700 transition-all">
                                            <i class="fa fa-ellipsis-h text-gray-400"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Message Area -->
                            <div class="flex-1 p-4 overflow-y-auto bg-slate-900" id="message-container">
                                <div class="space-y-4">
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
                                            <div class="flex justify-center">
                                                <div class="bg-slate-700 px-4 py-1 rounded-full">
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
                                                <div class="bg-gradient-to-r from-blue-500 to-violet-500 rounded-lg py-2 px-4 max-w-xs lg:max-w-md text-white">
                                                    <p class="text-sm">{{ $message->content }}</p>
                                                    <div class="flex justify-end mt-1">
                                                        <p class="text-xs text-blue-100">{{ $formattedTime }}</p>
                                                        <i class="fas fa-check-double text-xs ml-1 text-blue-100 {{ $message->read ? 'opacity-100' : 'opacity-40' }}"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Received Message -->
                                            <div class="flex items-end">
                                                <div class="flex-shrink-0 mr-3">
                                                    @if($activeUser->photo)
                                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ asset($activeUser->photo) }}" alt="{{ $activeUser->name }}">
                                                    @else
                                                        <div class="h-8 w-8 rounded-full bg-gradient-to-r from-amber-400 to-amber-700 flex items-center justify-center text-white font-bold text-xs">
                                                            {{ substr($activeUser->name, 0, 2) }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="bg-slate-800 rounded-lg py-2 px-4 max-w-xs lg:max-w-md">
                                                    <p class="text-sm text-white">{{ $message->content }}</p>
                                                    <p class="text-xs text-gray-400 mt-1">{{ $formattedTime }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Message Input -->
                            <div class="border-t border-gray-700 p-4">
                                <form id="message-form" action="{{ route('chat.send_company') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $activeUser->id }}">
                                    <div class="flex items-center space-x-2">
                                        <button type="button" class="p-2 rounded-full hover:bg-slate-700 transition-all">
                                            <i class="fa fa-paperclip text-gray-400"></i>
                                        </button>
                                        <button type="button" class="p-2 rounded-full hover:bg-slate-700 transition-all">
                                            <i class="fa fa-image text-gray-400"></i>
                                        </button>
                                        <div class="flex-1 relative">
                                            <input type="text" name="content" class="w-full pr-10 py-2 pl-4 border border-gray-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-800 text-white" placeholder="Tapez votre message...">
                                            <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 p-1 rounded-full hover:bg-slate-700 transition-all">
                                                <i class="fa fa-smile text-gray-400"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="p-3 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full text-white hover:shadow-lg transition-all">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="flex-1 flex items-center justify-center bg-slate-900">
                                <div class="text-center p-6">
                                    <div class="mb-4 inline-flex p-4 rounded-full bg-slate-800">
                                        <i class="fa fa-comments text-4xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-xl font-medium text-white mb-2">Pas de conversation sélectionnée</h3>
                                    <p class="text-gray-400 mb-4">Sélectionnez une conversation ou commencez-en une nouvelle.</p>
                                    <button type="button" class="new-message-btn bg-gradient-to-r from-blue-500 to-violet-500 hover:from-blue-600 hover:to-violet-600 text-white font-bold py-2 px-4 rounded-lg flex items-center transition-all mx-auto">
                                        <i class="fa fa-plus mr-2"></i> Nouveau Message
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Message Modal -->
<div id="newMessageModal" class="hidden fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center">
    <div class="bg-slate-800 rounded-xl shadow-xl w-full max-w-md transform transition-all">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h3 class="text-lg font-medium text-white">Nouveau Message</h3>
            <button id="closeNewMessageModal" class="text-gray-400 hover:text-gray-200 transition-colors">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="p-4">
            <form action="{{ route('chat.send_company') }}" method="POST" id="new-message-form">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Destinataire</label>
                    <select name="receiver_id" class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-700 text-white">
                        <option value="" selected disabled>Sélectionnez un utilisateur</option>
                        @foreach(\App\Models\User::where('id', '!=', auth()->id())->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                    <textarea name="content" class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-700 text-white" rows="4" placeholder="Écrivez votre message ici..."></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded-lg mr-2 transition-all close-modal-btn">
                        Annuler
                    </button>
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-violet-500 hover:from-blue-600 hover:to-violet-600 text-white font-bold py-2 px-4 rounded-lg transition-all">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript pour gestion des interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion du modal
        const newMessageBtn = document.querySelectorAll('.new-message-btn');
        const newMessageModal = document.getElementById('newMessageModal');
        const closeModalBtns = document.querySelectorAll('#closeNewMessageModal, .close-modal-btn');
        
        newMessageBtn.forEach(btn => {
            btn.addEventListener('click', function() {
                newMessageModal.classList.remove('hidden');
            });
        });
        
        closeModalBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                newMessageModal.classList.add('hidden');
            });
        });
        
        // Fermer modal quand on clique en dehors
        newMessageModal.addEventListener('click', function(event) {
            if (event.target === newMessageModal) {
                newMessageModal.classList.add('hidden');
            }
        });
        
        // Scroll to bottom des messages
        const messageContainer = document.getElementById('message-container');
        if (messageContainer) {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }
    });
</script>
@endsection