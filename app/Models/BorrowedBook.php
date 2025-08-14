<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'book_id', 'borrowed_at', 'returned_at'];
    protected $appends = ['returned'];

    protected $casts =[
        'returned_at' => 'datetime',
        'borrowed_at' => 'datetime',
    ];

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
        return $this->returned_at !== null;
    }
}
