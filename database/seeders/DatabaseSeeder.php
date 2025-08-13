<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::query()->create([
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('password'),
        ]);

        Book::factory(50)->create();

        Student::factory(50)->create();

        $bookIds = Book::pluck('id')->all();
        $studentIds = Student::pluck('id')->all();

        BorrowedBook::factory(100)->make()->each(function ($borrow) use ($bookIds, $studentIds) {
            $borrow->book_id = $bookIds[array_rand($bookIds)];
            $borrow->student_id = $studentIds[array_rand($studentIds)];
            $borrow->save();
        });
    }
}
