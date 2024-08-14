@php use App\Enums\RouteNames; @endphp
@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="mb-4 text-3xl font-bold">{{ $book->title }}</h1>

        <div class="book-info mb-6">
            <div class="book-author text-lg font-semibold mb-2">by {{ $book->author }}</div>
            <div class="book-rating flex items-center mb-4">
                <div class="mr-2 text-sm font-medium text-white">
                    <x-star-rating :rating="$book->reviews_avg_rating"/>
                </div>
                <span class="book-review-count text-sm text-gray-400">
                    {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                </span>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route(RouteNames::books()->value) }}" class="btn">Latest Books</a>
        <a href="{{ route(RouteNames::booksReviewsCreate()->value, $book) }}" class="btn">Add a review</a>
    </div>

    <div>
        <h2 class="mb-4 text-2xl font-bold">Reviews</h2>
        <ul>
            @forelse ($book->reviews as $review)
                <li class="book-item mb-6">
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <div class="font-semibold text-lg text-white">{{ $review->rating }}</div>
                            <div class="book-review-count text-sm text-gray-400">
                                {{ $review->created_at->format('M j, Y') }}
                            </div>
                        </div>
                        <p class="text-gray-300">{{ $review->review }}</p>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div class="empty-book-item">
                        <p class="empty-text text-lg font-semibold">No reviews yet</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
