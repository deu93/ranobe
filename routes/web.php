<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AddGenreController;
use App\Http\Controllers\AllBooksController;
use App\Http\Controllers\BookShowController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddChapterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AllChaptersController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ReadChapterController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editprofile', [ProfileController::class, 'edit'])->name('editprofile');
Route::post('/editprofile', [ProfileController::class, 'update']);
Route::get('/add-book', [BookController::class, 'index'])->name('add-book');
Route::post('/add-book', [BookController::class, 'store']);
Route::get('/edit-book/{slug}', [BookController::class, 'edit'])->name('edit-book');
Route::put('/edit-book/{slug}', [BookController::class, 'update']);
Route::delete('/delete-book/{slug}', [BookController::class, 'destroy']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/book-show/{slug}', [BookShowController::class, 'index']);
Route::get('/add-genre', [AddGenreController::class, 'index'])->name('add-genre');
Route::post('/add-genre', [AddGenreController::class, 'store']);
Route::get('/all-books', [AllBooksController::class, 'index'])->name('all-books');
Route::get('/books-genre/{id}', [AllBooksController::class, 'show']);
Route::get('/add-chapter/{id}', [AddChapterController::class, 'index'])->name('add-chapter');
Route::post('/add-chapter/{id}', [AddChapterController::class, 'store']);
Route::get('read-chapter/{id}', [ReadChapterController::class, 'index']);
Route::get('next-chapter/{id}', [ReadChapterController::class, 'next']);
Route::get('prev-chapter/{id}', [ReadChapterController::class, 'prev']);
Route::get('all-chapters/{id}', [AllChaptersController::class, 'index']);
Route::get('book-search', [SearchController::class, 'index']);
