<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\Category;
use App\Models\Entreprise;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard entreprise.profil');
    }
    public function show(Entreprise $entreprise)
    {
        $annonces = annonce::where('user_id', auth()->id())->get();
        return view('dashboard entreprise.allAnnonces', compact('annonces'));
    }
    
    public function conversations()
    {
        $userId = auth()->id();
        
        // Récupère toutes les conversations de l'utilisateur actuel (envoyées ou reçues)
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
        foreach ($groupedConversations as $otherUserId => $messages) {
            if (isset($users[$otherUserId])) {
                $otherUser = $users[$otherUserId];
                $lastMessage = $messages->first(); // Les messages sont déjà triés par date
                
                // Calculer les messages non lus
                $unreadCount = $messages
                    ->where('sender_id', $otherUserId)
                    ->where('read', false)
                    ->count();
                
                $chatData[] = [
                    'user' => $otherUser,
                    'last_message' => $lastMessage,
                    'unread_count' => $unreadCount,
                    'messages' => $messages->sortBy('created_at')->values(),
                ];
            }
        }
        
        // Si un chat est actif, récupérer son ID
        $activeChat = null;
        if (!empty($chatData)) {
            $activeChat = $chatData[0];
        }
        
        return view('dashboard entreprise.message', compact('chatData', 'activeChat'));
    }
}
