<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;

Route::get('/', [pageController::class, 'welcome']);

Route::get('/contact', [pageController::class, 'contact']);

Route::get('/books', [BookController::class, 'index']);
#to delete later
Route::get('/books/edit', [BookController::class, 'edit']);

Route::get('/books/{title}', [BookController::class, 'show']);
Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);