@extends('layouts.particulier')

@section('content')
<div class="container mx-auto py-8 px-4 max-w-5xl">
    <!-- Chat Header with User Info -->
    <div class="bg-white rounded-t-xl shadow-md p-4 mb-0 flex items-center">
        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl mr-3">
            {{ substr($user->name, 0, 1) }}
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
            <p class="text-sm text-gray-500">
                @if($user->last_active_at)
                    Last active {{ \Carbon\Carbon::parse($user->last_active_at)->diffForHumans() }}
                @else
                    Online
                @endif
            </p>
        </div>
        <div class="ml-auto flex items-center space-x-2">
            <a href="{{ route('user.annoncesBy', $user->id) }}" class="text-blue-500 hover:text-blue-700 flex items-center text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                View Profile
            </a>
        </div>
    </div>

    <!-- Chat Messages Container -->
    <div id="chat-box" class="bg-gray-50 p-4 h-[500px] overflow-y-auto mb-0 border-l border-r border-gray-200 relative">
        <div class="absolute inset-0 opacity-10 pointer-events-none bg-gradient-to-b from-white to-gray-100"></div>
        <div class="relative z-10 space-y-4 py-2">
            @foreach($messages as $message)
                <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[80%]">
                        <div class="{{ $message->sender_id == auth()->id() ? 'bg-blue-600 text-white rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl' : 'bg-white text-gray-800 rounded-tr-2xl rounded-tl-2xl rounded-br-2xl shadow-sm border border-gray-100' }} px-4 py-3 break-words">
                            {{ $message->content }}
                        </div>
                        <div class="text-xs {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }} mt-1 text-gray-500">
                            {{ $message->created_at->format('h:i A') }} · {{ $message->created_at->format('M d') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Message Input Form -->
    <div class="bg-white rounded-b-xl shadow-md p-4 border-t border-gray-100">
        <form method="POST" action="{{ route('chat.send') }}" class="flex gap-2 items-center" id="message-form">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
            
            <div class="relative flex-1">
                <input type="text" 
                    name="content" 
                    class="w-full p-4 pr-12 border border-gray-200 rounded-full bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all" 
                    placeholder="Type your message..." 
                    required 
                    id="message-input">
                <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-md hover:shadow-lg transition duration-200 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </button>
        </form>
    </div>
    
    <!-- Features Bar -->
    <div class="mt-6 flex justify-between items-center bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <div class="text-center flex-1">
            <button type="button" class="text-gray-500 hover:text-blue-600 group transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-xs mt-1 block">Documents</span>
            </button>
        </div>
        <div class="text-center flex-1">
            <button type="button" class="text-gray-500 hover:text-blue-600 group transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-xs mt-1 block">Photos</span>
            </button>
        </div>
        <div class="text-center flex-1">
            <button type="button" class="text-gray-500 hover:text-blue-600 group transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
                <span class="text-xs mt-1 block">Schedule</span>
            </button>
        </div>
        <div class="text-center flex-1">
            <button type="button" class="text-gray-500 hover:text-blue-600 group transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span class="text-xs mt-1 block">Report</span>
            </button>
        </div>
    </div>
    
    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('user.dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Dashboard
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const userId = {{ auth()->id() }};
        const receiverId = {{ $user->id }};
        const chatBox = document.getElementById('chat-box');
        const messageForm = document.getElementById('message-form');
        const messageInput = document.getElementById('message-input');

        // Auto-scroll on page load
        chatBox.scrollTop = chatBox.scrollHeight;

        // Handle form submission
        messageForm.addEventListener('submit', function(e) {
            const message = messageInput.value.trim();
            if (message) {
                // Add the message to UI immediately for better UX
                const currentTime = new Date();
                const timeString = currentTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                const dateString = currentTime.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                // Scroll to bottom
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        });

        // Listen for incoming messages
        window.Echo.private('chat.' + userId)
            .listen('MessageSent', (e) => {
                if (e.message.sender_id === receiverId) {
                    const messageDate = new Date(e.message.created_at);
                    const timeString = messageDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    const dateString = messageDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                    
                    const messageHtml = `
                        <div class="flex justify-start">
                            <div class="max-w-[80%]">
                                <div class="bg-white text-gray-800 rounded-tr-2xl rounded-tl-2xl rounded-br-2xl shadow-sm border border-gray-100 px-4 py-3 break-words">
                                    ${e.message.content}
                                </div>
                                <div class="text-xs text-left mt-1 text-gray-500">
                                    ${timeString} · ${dateString}
                                </div>
                            </div>
                        </div>
                    `;
                    
                    const messagesContainer = chatBox.querySelector('.space-y-4');
                    messagesContainer.insertAdjacentHTML('beforeend', messageHtml);
                    
                    // Scroll to bottom
                    chatBox.scrollTop = chatBox.scrollHeight;
                }
            });

        // Focus on input when page loads
        messageInput.focus();
    });
</script>
@endsection
