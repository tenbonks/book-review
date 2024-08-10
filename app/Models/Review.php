<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    public function book() {

        // A review belongs to one book (one to one)

        return $this->belongsTo(Book::class);
    }

    protected static function booted() {

        // Clear the cache for a book whenever a review is created, updated, or deleted (refresh cache for a book if a review is deleted or updated)
        static::created(fn (Review $review) => cache()->forget('book:' . $review->book_id));
        static::updated(fn (Review $review) => cache()->forget('book:' . $review->book_id));
        static::deleted(fn (Review $review) => cache()->forget('book:' . $review->book_id));
    }
}
