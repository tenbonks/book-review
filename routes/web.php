<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('books.index');
});

// see https://laravel.com/docs/11.x/controllers#resource-controllers for more information on resource controllers
// they are conventional CRUD actions, use php artisan route:list to see all the endpoints it creates
Route::resource('books', BookController::class);


// Will only create routes for  create 'books/{book}/reviews/create' and store 'books/{book}/reviews'
Route::resource('books.reviews', ReviewController::class)
    ->scoped(['review' => 'book'])
    ->only('create', 'store');

// Rate limit is set in Providers/AppServiceProvider.php
// specifically rate limit the store method
Route::post('books/{book}/reviews', [ReviewController::class, 'store'])
    ->middleware('throttle:reviews')
    ->name('books.reviews.store');
