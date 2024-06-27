<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Book extends Model
{
    use HasFactory;

    public function reviews() {

        // A book can have many reviews (one to many)

        return $this->hasMany(Review::class);
    }


    // Local Query Scope Functions - https://laravel.com/docs/10.x/eloquent#local-scopes

    /**
     * Returns books that have the passed title within the books title
     * @param Builder $query
     * @param string $title
     * @return Builder
     */
    public function scopeTitle(Builder $query, string $title): Builder
    {

        // Usage reference `\App\Models\Book::title('cum')->get();`

        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    /**
     * Returns books with the highest amount of reviews within an optional date range
     * @param Builder $query
     * @param $from <p> <b>Optional:</b> Reviews from this date</p>
     * @param $to <p> <b>Optional</b> Reviews from this date</p>
     * @return Builder
     */
    public function scopePopular(Builder $query, $from = null, $to = null): Builder
    {

        return $query
            ->withCount(['reviews' => fn (Builder $q) => $this->dateRangeFilter($q, $from, $to)])
            ->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query, $from = null, $to = null): Builder
    {
        return $query
            ->withAvg(['reviews' => fn (Builder $q) => $this->dateRangeFilter($q, $from, $to)], 'rating')
            ->orderBy('reviews_avg_rating', 'desc');
    }

    /**
     * Returns books that meet or exceed the passed minimum amount of reviews
     * @requires <b>reviews_count</b> aggregate column within the query
     * @param Builder $query
     * @param int $minReviews
     * @return Builder
     */
    public function scopeMinReviews(Builder $query, int $minReviews) : Builder
    {

        // 'having' is used instead of 'where' in this context as we are working with results from aggregate functions

        return $query->having('reviews_count', '>=', $minReviews);
    }

    /**
     * Modifies the passed query and filters for a date range using the created_at column
     * @param Builder $query
     * @param $from
     * @param $to
     * @return void
     */
    private function dateRangeFilter(Builder $query, $from = null, $to = null): void
    {
        if ($from && !$to) {
            // Return reviews that have a created_at equal or greater than $from

            $query->where('created_at', '>=', $from);
        }
        elseif (!$from && $to) {
            // Return reviews that have a created_at equal or less than $to

            $query->where('created_at', '<=', $to);
        }
        elseIf ($from && $to) {
            // Return reviews that have a created_at date that is between from and to

            $query->whereBetween('created_at', [$from, $to]);
        }
    }
}
