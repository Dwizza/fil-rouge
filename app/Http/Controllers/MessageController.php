<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function index(User $user)
    {
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', auth()->id());
        })->orderBy('created_at')->get();

        return view('particulier.message', compact('messages', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);
        // dd($request->all());
    
        broadcast(new MessageSent($message, auth()->user()))->toOthers();
    
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    
    public function show(User $user)
    {
        // Récupère les messages entre l'utilisateur connecté et l'utilisateur sélectionné
        $messages = Message::where(function ($query) use ($user) {$query->where('sender_id', auth()->id())->where('receiver_id', $user->id);})
            ->orWhere(function ($query) use ($user) {$query->where('sender_id', $user->id)->where('receiver_id', auth()->id());})
            ->orderBy('created_at')->get();

        // Marquer les messages reçus comme lus
        Message::where('sender_id', $user->id)
                ->where('receiver_id', auth()->id())
                ->where('is_read', false)
                ->update(['is_read' => true]);

        // Récupérer toutes les conversations pour la sidebar
        $userId = auth()->id();
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->get();
            
        // Grouper par conversation
        $groupedConversations = $conversations->groupBy(function ($message) use ($userId) {
            return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
        });
        
        // Récupérer les informations des utilisateurs concernés
        $users = User::whereIn('id', $groupedConversations->keys())->get()->keyBy('id');
        
        // Préparer les données pour l'affichage
        $chatData = [];
        foreach ($groupedConversations as $otherUserId => $msgs) {
            if (isset($users[$otherUserId])) {
                $otherUser = $users[$otherUserId];
                $lastMessage = $msgs->first(); // Les messages sont déjà triés par date
                
                // Calculer les messages non lus
                $unreadCount = $msgs
                    ->where('sender_id', $otherUserId)
                    ->where('read', false)
                    ->count();
                
                $chatData[] = [
                    'user' => $otherUser,
                    'last_message' => $lastMessage,
                    'unread_count' => $unreadCount,
                    'messages' => $msgs->sortBy('created_at')->values(),
                ];
            }
        }
        
        // Définir la conversation active
        $activeChat = [
            'user' => $user,
            'messages' => $messages,
            'unread_count' => 0,
        ];

        return view('dashboard entreprise.message', compact('chatData', 'activeChat'));
    }
    
    public function conversations()
    {
        $userId = auth()->id();

        $userConversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->get()
            ->groupBy(function ($message) use ($userId) {
                return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
            });

        $users = User::whereIn('id', $userConversations->keys())->get();

        return view('particulier.inbox', compact('users'));
    }
}
