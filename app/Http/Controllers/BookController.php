<?php

namespace App\Http\Controllers;

use App\Enums\BookFilters;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    /**
     * Display a listing of the book.
     */
    public function index(Request $request)
    {
        // Set variables for url query's '?title' or/and '?filter'
        $title = $request->input('title');
        $filter = $request->input('filter');


        // 'when' method:
        // the first argument is a value, and will only be used if it's NOT null or empty
        // the second argument is a function which will only run when the first argument null or empty
        $books = Book::when(
            $title,
            fn ($query, $title) => $query->title($title)
        );

        $books = match ($filter) {
            BookFilters::popularLastMonth()->value => $books->popularLastMonth(),
            BookFilters::popularLast6Months()->value => $books->popularLast6Months(),
            BookFilters::highestRatedLastMonth()->value => $books->highestRatedLastMonth(),
            BookFilters::highestRatedLast6Months()->value => $books->highestRatedLast6Months(),
            default => $books->latest()->withAvgRating()->withReviewsCount()
        };

        // Use the books stored in cache, otherwise set them
        $cacheKey = 'books:' . $filter . ':' . $title;
        $books =

//            Cache::remember(
//            $cacheKey,
//            3600,
//            function () use ($books) {
                $books->paginate(10);
//        });

        // Instead of using ['books' => $books], you can use compact('books') which acts as a shorthand.
        // but it is personal preference as it can be easier to read with the more verbose method
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified book.
     */
    public function show(int $id)
    {
        // Return a singular book model, and load its reviews in order

        $cacheKey = 'book:' . $id;

        // Get the book with its average rating and reviews count, get the related reviews to the book sorted by latest
        $book = Cache::remember(
            $cacheKey,
            3600,
            fn() => Book::with([
                'reviews' => fn($query) => $query->latest()
            ])->withAvgRating()->withReviewsCount()->findOrFail($id)
        );

        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
