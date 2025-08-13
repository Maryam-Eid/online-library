<?php

use App\Models\Book;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)
            ->constrained()
            ->CascadeOnDelete();
            $table->foreignIdFor(Book::class)
                ->constrained()
                ->CascadeOnDelete();
            $table->dateTime('borrowed_at');
            $table->dateTime('return_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_books');
    }
};
