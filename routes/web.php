<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// see https://laravel.com/docs/11.x/controllers#resource-controllers for more information on resource controllers
// they are standardized CRUD actions, use php artisan route:list to see all the endpoints it creates
Route::resource('books', BookController::class);

Route::get('/', function () {
    return redirect()->route('books.index');
});
