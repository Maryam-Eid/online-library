<?php

namespace App\Http\Controllers\Student;

use App\Services\StudentDashboardService;

class DashboardController
{
    protected $dashboardService;

    public function __construct(StudentDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $data = $this->dashboardService->getDashboardData();
        return view('student.dashboard', $data);
    }
}
