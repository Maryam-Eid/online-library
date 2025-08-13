<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'book_id', 'borrowed_at', 'return_at'];
    protected $appends = ['returned'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function getReturnedAttribute(): bool
    {
        return $this->return_at !== null;
    }
}
