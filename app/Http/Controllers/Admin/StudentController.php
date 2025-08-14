<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.students.index', [
            'students' => $this->studentService->getStudents($request->student_id),
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.students.show', [
            'student' => $student,
        ]);
    }
}
