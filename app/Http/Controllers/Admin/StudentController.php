<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.students.index', [
            'students' => Student::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer'
        ]);

        $student = Student::where('student_id', $request->student_id)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        return redirect()->route('admin.students.show', $student);
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
