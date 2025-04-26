<?php 

namespace App\Services;

use App\Repositories\DashboardRepository;
use App\Repositories\Interfaces\DashboardRepositoryInterface;

class DashboardService
{
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashboardStats($userId)
{
    return [
        'total_annonces' => $this->dashboardRepository->getUserAnnoncesCount($userId),
        'published_annonces' => $this->dashboardRepository->getUserAnnoncesByStatus($userId, 'published'),
        'archived_annonces' => $this->dashboardRepository->getUserAnnoncesByStatus($userId, 'archived'),
        'total_revenue' => $this->dashboardRepository->getTotalRevenue($userId),
        'daily_revenue' => $this->dashboardRepository->getDailyRevenue(),
    ];
}
}
