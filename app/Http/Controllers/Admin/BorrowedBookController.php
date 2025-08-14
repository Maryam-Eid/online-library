<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.borrowed.index', [
            'borrowedBooks' => BorrowedBook::with(['book', 'student'])->paginate(10),
        ]);
    }
}
