<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentDashboardService
{
    public function getDashboardData(): array
    {
        $student = Auth::guard('student')->user();
        return [
            'borrowedBooks' => $student->borrowedBooks()->with('book')->latest()->paginate(10),
        ];
    }
}
