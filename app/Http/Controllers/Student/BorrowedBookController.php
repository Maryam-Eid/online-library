<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function borrow(Book $book)
    {
        $student = Auth::guard('student')->user();

        $existingBorrow = $student->borrowedBooks()
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->first();

        if ($existingBorrow) {
            return back()->with('error', 'You have already borrowed this book and did not return it.');
        }

        if ($book->copies - $book->borrowedBy()->count() <= 0) {
            return back()->with('error', 'No copies available.');
        }

        BorrowedBook::create([
            'student_id' => $student->id,
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Book borrowed successfully!');
    }


    public function return(BorrowedBook $borrow)
    {
        $borrow->update(['returned_at' => now()]);

        return back()->with('success', 'Book returned successfully!');
    }
}
