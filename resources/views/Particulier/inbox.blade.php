@extends('layouts.particulier')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">📬 Your Conversations</h1>
            <p class="text-gray-500 mt-1">All your private chats in one place</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($users as $chatUser)
                <a href="{{ route('chat', $chatUser->id) }}" class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-200 p-6 flex items-center space-x-4 hover:bg-orange-50">
                    <div class="relative">
                        <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 font-bold text-xl">
                            {{ strtoupper(substr($chatUser->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-orange-600">{{ $chatUser->name }}</h3>
                        <p class="text-sm text-gray-500">Tap to open the conversation</p>
                    </div>
                    <div>
                        <svg class="w-6 h-6 text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>
            @empty
                <div class="text-center col-span-2 text-gray-500">
                    <p>No conversations yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
