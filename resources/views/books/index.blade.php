@php use App\Enums\BookFilters; @endphp
@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-3xl font-bold">Books</h1>

    <form method="GET" action="{{ route('books.index') }}" class="mb-8 flex items-center space-x-2">
        <input type="text" name="title" placeholder="Search by title..." value="{{ request('title') }}" class="input">
        <input type="hidden" name="filter" value="{{ request('filter') }}">
        <button type="submit" class="btn">Search</button>
        <a href="{{ route('books.index') }}" class="btn">Clear</a>
    </form>

    <div class="filter-container">
        @foreach(BookFilters::filters() as $key => $label)
            <a href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}" class="{{
                    request('filter') === $key || (request('filter') === null && $key === '')
                    ? 'filter-item-active' : 'filter-item'
                }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <ul>
        @forelse($books as $book)
            <li class="mb-6">
                <div class="book-item">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="w-full flex-grow sm:w-auto mb-4 sm:mb-0">
                            <a href="{{ route('books.show', $book) }}" class="book-title">
                                {{ $book->title }}
                            </a>
                            <span class="book-author">by {{ $book->author }}</span>
                        </div>
                        <div class="text-right">
                            <div class="book-rating">
                                <x-star-rating :rating="$book->reviews_avg_rating" />
                            </div>
                            <div class="book-review-count">
                                out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li class="mb-4">
                <div class="empty-book-item">
                    <p class="empty-text">No books found</p>
                    <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>

    @if($books->count())
        <nav class="mt-8">
            {{ $books->appends($_GET)->links() }}
        </nav>
    @endif
@endsection
