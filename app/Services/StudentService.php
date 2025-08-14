<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentService
{
    public function getStudents(?int $studentId = null, int $perPage = 10): LengthAwarePaginator
    {
        $query = Student::query();

        if ($studentId) {
            $query->where('id', $studentId);
        }

        return $query->paginate($perPage);
    }
}
