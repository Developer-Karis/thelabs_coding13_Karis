<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NavbarController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// Home Page
Route::get('/', [HomePageController::class, 'index']);

// Service
Route::get('/services', [ServiceController::class, 'index']);

// Blog
Route::get('/blog', [BlogController::class, 'index']);

// Blog-Post
Route::get('/blog-post', [BlogPostController::class, 'index']);

// Contact
Route::get('/contact', [ContactController::class, 'index']);

// AdminLte
Route::get('/menu', [NavbarController::class, 'index']);
Route::post('/update-links/{id}', [NavbarController::class, 'updateLinks']);
Route::get('/banniere', [HomePageController::class, 'adminShowBanniere']);

