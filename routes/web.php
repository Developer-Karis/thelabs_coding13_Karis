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
// Home Menu
Route::get('/menu', [NavbarController::class, 'index']);
Route::post('/update-links/{id}', [NavbarController::class, 'updateLinks']);

// Home Banniere
Route::get('/banniere', [HomePageController::class, 'adminShowBanniere']);
Route::post('/create-image-carous', [HomePageController::class, 'adminAddImageCarous']);
Route::get('/edit-logo-slogan/{id}', [HomePageController::class, 'adminEditLogoSlogan']);
Route::post('/update-logo-slogan/{id}', [HomePageController::class, 'adminUpdateLogoSlogan']);

// Home Service Rapides
Route::get('/services-rapides', [HomePageController::class, 'adminShowServicesRapides']);

// Home Presentation
Route::get('/presentation', [HomePageController::class, 'adminShowPresentation']);
Route::post('/update-presentation/{id}', [HomePageController::class, 'adminUpdatePresentation']);

// Home Vidéo
Route::get('/video', [HomePageController::class, 'adminShowVideo']);
Route::post('/update-video/{id}', [HomePageController::class, 'adminUpdateVideo']);



