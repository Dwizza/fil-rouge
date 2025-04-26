<?php 

namespace App\Repositories;

use App\Models\annonce;
use App\Models\payments;
use App\Models\User;
use Carbon\Carbon;
use App\Repositories\Interfaces\DashboardRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getUserAnnoncesCount($userId)
{
    return annonce::where('user_id', $userId)->count();
}

public function getUserAnnoncesByStatus($userId, $status)
{
    return Annonce::where('user_id', $userId)
                    ->where('status', $status)
                    ->count();
}

public function getTotalRevenue($userId)
{
    $annonces = Annonce::where('user_id', $userId)->pluck('id');
    

    $totalRevenue = payments::whereIn('annonce_id', $annonces)->where('status','succeeded')->sum('amount');
    
        return $totalRevenue;
}

public function getDailyRevenue()
{
    return payments::selectRaw('DATE(created_at) as date, SUM(amount) as total')
                    ->where('status', 'succeeded')
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();
}

}
