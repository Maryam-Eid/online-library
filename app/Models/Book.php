<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'isbn', 'published_year', 'copies'];

    public function borrowedBy(): HasMany
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
