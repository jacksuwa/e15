<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\ListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\App;

if (!App::environment('production')) {
    Route::get('/test/login-as/{userId}', [TestController::class, 'loginAs']);
    Route::get('/test/refresh-database', [TestController::class, 'refreshDatabase']);
}

Route::get('/', [PageController::class, 'welcome']);
Route::get('/contact', [PageController::class, 'contact']);


Route::group(['middleware' => 'auth'], function () {
    /**
     *Manage items route
     */
    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/items/create', [ItemController::class, 'create']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
    Route::put('/items/{id}', [ItemController::class, 'update']);
    Route::get('/items/archive', [ItemController::class, 'archive']);
    Route::get('/items/{id}/delete', [ItemController::class, 'delete']);
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->withTrashed();
    Route::post('/items/{item}/restore', [ItemController::class, 'restore'])->withTrashed();
    Route::get('/items/{id}', [ItemController::class, 'show']);

    /**
     *Get a list of customers
     */

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/create', [CustomerController::class, 'create']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);
    Route::put('/customers/{id}', [CustomerController::class, 'update']);

    /**
     * Items Listing
     */

    Route::get('/item/{id}', [ItemController::class, 'show']);
    Route::get('/list', [ListController::class, 'show']);
    Route::get('/list/{id}/add', [ListController::class, 'add']);
    Route::post('/list/{id?}/save', [ListController::class, 'save']);
    Route::put('/list/{id}/update', [ListController::class, 'update']);
    Route::delete('/list/{id}/destroy', [ListController::class, 'destroy']);
});