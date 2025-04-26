<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\Category;
use App\Models\Entreprise;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\Message;
use App\Models\payments;
use App\Models\User;
use App\Services\DashboardService;
use Illuminate\Support\Facades\DB;

class EntrepriseController extends Controller
{
   
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
    public function index()
    {
        $userId = auth()->id();
        $stats = $this->dashboardService->getDashboardStats($userId);
        // dd($stats);
        return view('dashboard entreprise.index', compact('stats'));
    }
    public function show(Entreprise $entreprise)
    {
        $annonces = annonce::where('user_id', auth()->id())->get();
        return view('dashboard entreprise.allAnnonces', compact('annonces'));
    }
    
    public function conversations()
    {
        $userId = auth()->id();
        
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->get();
        
        $groupedConversations = $conversations->groupBy(function ($message) use ($userId) {
            return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
        });
        
        $users = User::whereIn('id', $groupedConversations->keys())->get()->keyBy('id');
        
        $chatData = [];
        foreach ($groupedConversations as $otherUserId => $messages) {
            if (isset($users[$otherUserId])) {
                $otherUser = $users[$otherUserId];
                $lastMessage = $messages->first();
                
                
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
    public function billing(){
        $user = auth()->user();
        // $annonce = annonce::where('user_id', $user->id)->get();
        $annonces = DB::table('annonces')
            ->join('paiements', 'paiements.annonce_id', '=', 'annonces.id')
            ->join('users', 'annonces.user_id', '=', 'users.id')
            ->select('paiements.*', 'annonces.title')->where('annonces.user_id', $user->id)
            ->get();
        $annonce = Annonce::where('user_id', $user->id)->pluck('id');
        $totalRevenue = payments::whereIn('annonce_id', $annonce)->where('status','succeeded')->sum('amount');
        // dd($totalRevenue);
        

        return view('dashboard entreprise.billing', compact('annonces', 'totalRevenue'));
    }
    public function changeStatusPayment($id)
    {
        $payment = payments::findOrFail($id);
        $payment->status = 'succeeded'; 
        $payment->paid_at = now(); 
        $payment->save();
        return redirect()->back()->with('success', 'Statut de paiement mis à jour avec succès.');
    }
}
