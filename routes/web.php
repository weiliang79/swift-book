<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cartmock', function() {
    return view('addtocartmock');
});

// user routes
Route::group(['middleware' => ['can:isUser']], function () {
    // cart routes
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/{book_id}', [CartController::class, 'add']); // add to cart button use this
    Route::put('/cart/{book_id}/{quantity}', [CartController::class, 'update']);
    Route::get('/cart/delete/{book_id}', [CartController::class, 'remove']);

    //checkout clear cart and move data to order model
});
// admin routes
Route::group(['middleware' => ['can:isAdmin']], function () {

    // home routes
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');

    // book routes
    Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books');
    Route::get('/admin/books/create', [BookController::class, 'showCreateForm'])->name('admin.books.create');
    Route::post('/admin/books/save', [BookController::class, 'saveBook'])->name('admin.books.save');
    Route::get('/admin/books/{book_id}/edit', [BookController::class, 'showEditForm'])->name('admin.books.edit');
    Route::post('/admin/books/{book_id}/update', [BookController::class, 'updateBook'])->name('admin.books.update');
    Route::post('/admin/books/delete', [BookController::class, 'deleteBook'])->name('admin.books.delete');
});
