<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Services\BookService;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.books.index', [
            'books' => Book::paginate(10)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book, BorrowedBook $borrowedBook = null)
    {
        return view('student.books.show',[
            'book' => $book,
            'borrowedBook' => $borrowedBook
        ]);

    }
}
