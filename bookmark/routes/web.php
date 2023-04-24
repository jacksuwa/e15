<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\TestController;




# Only enable the following development-specific routes if we’re *not* running the application in the `production` environment
if (!App::environment('production')) {
    Route::get('/test/login-as/{userId}', [TestController::class, 'loginAs']);
    Route::get('/test/refresh-database', [TestController::class, 'refreshDatabase']);

    # It’s a good idea to move the practice route into this if condition
    # so that our practice routes are not available on production
    Route::any('/practice/{n?}', [PracticeController::class, 'index']);
}



Route::get('/', [pageController::class, 'welcome']);
Route::get('/contact', [pageController::class, 'contact']);

Route::group(['middleware' => 'auth'], function () {

    # Make sure the create route comes before the `/books/{slug}` route so it takes precedence
    Route::get('/books/create', [BookController::class, 'create']);

    # Note the use of the post method in this route
    Route::post('/books', [BookController::class, 'store']);




    Route::get('/books', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
    Route::get('/books/{slug}', [BookController::class, 'show']);
    Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);

    # Show the form to edit a specific book
    Route::get('/books/{slug}/edit', [BookController::class, 'edit']);

    # Process the form to edit a specific book
    Route::put('/books/{slug}', [BookController::class, 'update']);

    #show the page to confirm deletion of book
    Route::get('/books/{slug}/delete', [BookController::class, 'delete']);

    #Process the deletion of a book
    Route::delete('/books/{slug}', [BookController::class, 'destroy']);

    Route::get('/list', [ListController::class, 'show']);
    Route::get('/list/{slug}/add', [ListController::class, 'add']);
    Route::Post('/list/{slug}/save', [ListController::class, 'save']);
});