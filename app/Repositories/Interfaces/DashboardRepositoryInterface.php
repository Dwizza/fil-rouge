<?php 

namespace App\Repositories\Interfaces;

interface DashboardRepositoryInterface
{
    public function getUserAnnoncesCount($userId);
public function getUserAnnoncesByStatus($userId, $status);
public function getTotalRevenue($userId);
public function getDailyRevenue();
}
