<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self latest()
 * @method static self popularLastMonth()
 * @method static self popularLast6Months()
 * @method static self highestRatedLastMonth()
 * @method static self highestRatedLast6Months()
 */
class BookFilters extends Enum
{
    protected static function values(): array
    {
        return [
            'latest' => '',
            'popularLastMonth' => 'popular_last_month',
            'popularLast6Months' => 'popular_last_6_months',
            'highestRatedLastMonth' => 'highest_rated_last_month',
            'highestRatedLast6Months' => 'highest_rated_last_6_months',
        ];
    }

    protected static function labels(): array
    {
        return [
            'latest' => 'Latest',
            'popularLastMonth' => 'Popular Last Month',
            'popularLast6Months' => 'Popular Last 6 Months',
            'highestRatedLastMonth' => 'Highest Rated Last Month',
            'highestRatedLast6Months' => 'Highest Rated Last 6 Months',
        ];
    }

    /**
     * @return array
     */
    public static function filters(): array
    {
        return array_combine(self::values(), self::labels());
    }
}
