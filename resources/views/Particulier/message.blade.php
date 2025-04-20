@extends('layouts.particulier')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Chat with {{ $user->name }}</h2>

    <div class="bg-gray-100 rounded-lg p-4 h-96 overflow-y-auto mb-4">
        @foreach($messages as $message)
            <div class="mb-2 {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                <span class="inline-block px-4 py-2 rounded-lg {{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-white text-black border' }}">
                    {{ $message->content }}
                </span>
                <div class="text-xs text-gray-500">{{ $message->created_at->format('H:i') }}</div>
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('chat.send') }}" class="flex gap-2">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
        <input type="text" name="content" class="w-full p-2 border rounded-lg" placeholder="Type your message...">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Send</button>
    </form>
</div>
@endsection
