<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self books()
 * @method static self booksShow()
 * @method static self booksReviewsCreate()
 * @method static self booksReviewsStore()
 */
class RouteNames extends Enum
{
    protected static function values(): array
    {
        return [
            'books' => 'books.index',
            'booksShow' => 'books.show',
            'booksReviewsCreate' => 'books.reviews.create',
            'booksReviewsStore' => 'books.reviews.store',
        ];
    }
}
