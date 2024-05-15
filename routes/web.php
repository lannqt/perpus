<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('index');
})->middleware('auth');


// Route::get('/sidebar', function () {
//     return view('layouts.sidebar');
// })->middleware('auth');



// Route::get('/buku', function () {
//     return view('buku');
// })->middleware('auth');




Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('register', [AuthController::class, 'registerProccess'])->middleware('guest');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'OnlyAdmin']);
Route::get('profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('buku', [BookController::class, 'buku'])->middleware('auth');
Route::post('login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('total-accounts', [UserController::class, 'totalAccounts']);
Route::get('book-add', [BookController::class, 'add'])->middleware(['auth', 'OnlyAdmin']);
Route::post('book-add', [BookController::class, 'store'])->middleware(['auth', 'OnlyAdmin']);
Route::get('/layouts', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/book/{id}', [BookController::class, 'detail'])->middleware('auth');
Route::get('/book/{id}/read', [BookController::class, 'content'])->name('content')->middleware('auth');

Route::put('/buku/{id}/', [BookController::class, 'edit'])->name('buku')->middleware('auth');
Route::delete('/buku/{id}/', [BookController::class, 'destroy'])->name('buku')->middleware('auth');


Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('pinjem')->middleware(['auth']);
// Route::post('/borrow-book', [UserController::class, 'borrowBook'])->name('borrow.book');
// Route::post('/return-book/{peminjaman}', [UserController::class, 'returnBook'])->name('return.book');
// Route::get('/pending-requests', [UserController::class, 'pendingRequests'])->name('pending.requests');


Route::get('/peminjaman/create/{book_id}', [PeminjamanController::class, 'create'])->name('peminjaman.create')->middleware('auth');
