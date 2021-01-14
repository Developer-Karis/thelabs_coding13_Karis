<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\MailContactController;
use App\Http\Controllers\NewsletterController;

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

// Home Page //

// Home Menu
Route::get('/menu', [NavbarController::class, 'index']);
Route::post('/update-links/{id}', [NavbarController::class, 'updateLinks']);

// Home Banniere
Route::get('/banniere', [HomePageController::class, 'adminShowBanniere'])->middleware('webmasterAdmin');
Route::post('/create-image-carous', [HomePageController::class, 'adminAddImageCarous'])->middleware('webmasterAdmin');
Route::get('/edit-logo-slogan/{id}', [HomePageController::class, 'adminEditLogoSlogan'])->middleware('webmasterAdmin');
Route::post('/update-logo-slogan/{id}', [HomePageController::class, 'adminUpdateLogoSlogan'])->middleware('webmasterAdmin');
Route::get('/edit-carous/{id}', [HomePageController::class, 'adminEditCarous'])->middleware('webmasterAdmin');
Route::post('/update-image-carous/{id}', [HomePageController::class, 'adminUpdateImageCarous'])->middleware('webmasterAdmin');
Route::get('/delete-carous/{id}', [HomePageController::class, 'adminDeleteImageCarous'])->middleware('webmasterAdmin');

// Home Service Rapides
Route::get('/services-rapides', [HomePageController::class, 'adminShowServicesRapides']);

// Home Presentation
Route::get('/presentation', [HomePageController::class, 'adminShowPresentation']);
Route::post('/update-presentation/{id}', [HomePageController::class, 'adminUpdatePresentation']);

// Home Vidéo
Route::get('/video', [HomePageController::class, 'adminShowVideo']);
Route::post('/update-video/{id}', [HomePageController::class, 'adminUpdateVideo']);

// Home Testimonials
Route::get('/testimonials', [HomePageController::class, 'adminShowTestimonials']);
Route::get('/edit-testimonial/{id}', [HomePageController::class, 'adminEditTestimonial']);
Route::post('/store-testimonial', [HomePageController::class, 'adminStoreTestimonial']);
Route::post('/update-title-testimonial/{id}', [HomePageController::class, 'adminUpdateTitleTestimonial']);
Route::post('/update-testimonial/{id}', [HomePageController::class, 'adminUpdateTestimonial']);
Route::get('/delete-testimonial/{id}', [HomePageController::class, 'adminDeleteTestimonial']);

// Home Service
Route::get('/service', [HomePageController::class, 'adminShowServices']);
Route::post('/store-service', [HomePageController::class, 'adminStoreServices']);
Route::get('/edit-service/{id}', [HomePageController::class, 'adminEditService']);
Route::post('/update-title-service/{id}', [HomePageController::class, 'adminUpdateTitleService']);
Route::post('/update-service/{id}', [HomePageController::class, 'adminUpdateService']);
Route::get('/delete-service/{id}', [HomePageController::class, 'adminDeleteService']);

// Team
Route::get('/team', [HomePageController::class, 'adminShowTeam']);
Route::post('/store-team', [HomePageController::class, 'adminStoreTeam']);
Route::post('/update-title-team/{id}', [HomePageController::class, 'adminUpdateTitleTeam']);
Route::get('/edit-team/{id}', [HomePageController::class, 'adminEditTeam']);
Route::post('/update-team/{id}', [HomePageController::class, 'adminUpdateTeam']);
Route::get('/delete-team/{id}', [HomePageController::class, 'adminDeleteTeam']);
Route::post('/update-place-team', [HomePageController::class, 'adminUpdatePlaceTeam']);

// Ready
Route::get('/ready', [HomePageController::class, 'adminShowReady']);
Route::post('/update-ready/{id}', [HomePageController::class, 'adminUpdateReady']);

// Contacts
Route::get('/contacts', [HomePageController::class, 'adminShowContact']);
Route::post('/update-contacts/{id}', [HomePageController::class, 'adminUpdateContact']);
Route::post('/store-contact', [MailContactController::class, 'store']);

// Footer
Route::get('/footer', [HomePageController::class, 'adminShowFooter']);
Route::post('/update-footer/{id}', [HomePageController::class, 'adminUpdateFooter']);

// Services Page //
Route::get('/bannerHeader', [ServiceController::class, 'adminShowBannerHeaderService']);
Route::post('/update-bannerHeader-services/{id}', [ServiceController::class, 'adminUpdateBannerHeaderService']);

// Contact Page
Route::get('/banniereContact', [ContactController::class, 'adminShowBannerHeaderContact']);
Route::post('/update-bannerHeader-contact/{id}', [ContactController::class, 'adminUpdateBannerHeaderContact']);
Route::get('/googleMap', [ContactController::class, 'adminShowGoogleMap']);
Route::post('/update-googleMap/{id}', [ContactController::class, 'adminUpdateGoogleMap']);

// Blog Page
Route::get('/banniereBlog', [BlogController::class, 'adminShowBannerHeaderBlog']);
Route::post('/update-bannerHeader-blog/{id}', [BlogController::class, 'adminUpdateBannerHeaderBlog']);
Route::get('/articles', [BlogController::class, 'adminShowArticles']);
Route::get('/attente', [BlogController::class, 'adminShowArticlesAttente']);
Route::get('/accepter-article/{id}', [BlogController::class, 'accepterArticle']);
Route::post('/store-article', [BlogController::class, 'adminCreateArticle']);
Route::get('/edit-article/{id}', [BlogController::class, 'adminShowEditArticle']);
Route::post('/update-article/{id}', [BlogController::class, 'adminUpdateArticle']);
Route::get('/delete-article/{id}', [BlogController::class, 'adminDeletetArticle']);

Route::get('/categories', [BlogController::class, 'adminShowCategories']);
Route::post('/store-categorie', [BlogController::class, 'adminCreateCategorie']);
Route::get('/edit-categorie/{id}', [BlogController::class, 'adminEditCategorie']);
Route::post('/update-categorie/{id}', [BlogController::class, 'adminUpdateCategorie']);
Route::get('/delete-categorie/{id}', [BlogController::class, 'adminDeleteCategorie']);

Route::get('/tags', [BlogController::class, 'adminShowTags']);
Route::post('/store-tag', [BlogController::class, 'adminCreateTag']);
Route::get('/edit-tag/{id}', [BlogController::class, 'adminEditTag']);
Route::post('/update-tag/{id}', [BlogController::class, 'adminUpdateTag']);
Route::get('/delete-tag/{id}', [BlogController::class, 'adminDeleteTag']);

// Blog Post Page
Route::get('/blog-post/{id}', [BlogPostController::class, 'show']);
Route::post('/store-commentary', [BlogPostController::class, 'store']);

// Newsletter
Route::get('/newsletter', [NewsletterController::class, 'index']);
Route::post('/store-newsletter', [NewsletterController::class, 'store']);






