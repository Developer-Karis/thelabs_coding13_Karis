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
use App\Http\Controllers\ProfilController;

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
Route::get('/menu', [NavbarController::class, 'index'])->middleware('webmasterAdmin');
Route::post('/update-links/{id}', [NavbarController::class, 'updateLinks'])->middleware('webmasterAdmin');

// Home Banniere
Route::get('/banniere', [HomePageController::class, 'adminShowBanniere'])->middleware('webmasterAdmin');
Route::post('/create-image-carous', [HomePageController::class, 'adminAddImageCarous'])->middleware('webmasterAdmin');
Route::get('/edit-logo-slogan/{id}', [HomePageController::class, 'adminEditLogoSlogan'])->middleware('webmasterAdmin');
Route::post('/update-logo-slogan/{id}', [HomePageController::class, 'adminUpdateLogoSlogan'])->middleware('webmasterAdmin');
Route::get('/edit-carous/{id}', [HomePageController::class, 'adminEditCarous'])->middleware('webmasterAdmin');
Route::post('/update-image-carous/{id}', [HomePageController::class, 'adminUpdateImageCarous'])->middleware('webmasterAdmin');
Route::get('/delete-carous/{id}', [HomePageController::class, 'adminDeleteImageCarous'])->middleware('webmasterAdmin');

// Home Service Rapides
Route::get('/services-rapides', [HomePageController::class, 'adminShowServicesRapides'])->middleware('webmasterAdmin');

// Home Presentation
Route::get('/presentation', [HomePageController::class, 'adminShowPresentation'])->middleware('webmasterAdmin');
Route::post('/update-presentation/{id}', [HomePageController::class, 'adminUpdatePresentation'])->middleware('webmasterAdmin');

// Home Vidéo
Route::get('/video', [HomePageController::class, 'adminShowVideo'])->middleware('webmasterAdmin');
Route::post('/update-video/{id}', [HomePageController::class, 'adminUpdateVideo'])->middleware('webmasterAdmin');

// Home Testimonials
Route::get('/testimonials', [HomePageController::class, 'adminShowTestimonials'])->middleware('webmasterAdmin');
Route::get('/edit-testimonial/{id}', [HomePageController::class, 'adminEditTestimonial'])->middleware('webmasterAdmin');
Route::post('/store-testimonial', [HomePageController::class, 'adminStoreTestimonial'])->middleware('webmasterAdmin');
Route::post('/update-title-testimonial/{id}', [HomePageController::class, 'adminUpdateTitleTestimonial'])->middleware('webmasterAdmin');
Route::post('/update-testimonial/{id}', [HomePageController::class, 'adminUpdateTestimonial'])->middleware('webmasterAdmin');
Route::get('/delete-testimonial/{id}', [HomePageController::class, 'adminDeleteTestimonial'])->middleware('webmasterAdmin');

// Home Service
Route::get('/service', [HomePageController::class, 'adminShowServices'])->middleware('webmasterAdmin');
Route::get('/edit-service/{id}', [HomePageController::class, 'adminEditService'])->middleware('webmasterAdmin');
Route::post('/store-service', [HomePageController::class, 'adminStoreServices'])->middleware('webmasterAdmin');
Route::post('/update-title-service/{id}', [HomePageController::class, 'adminUpdateTitleService'])->middleware('webmasterAdmin');
Route::post('/update-service/{id}', [HomePageController::class, 'adminUpdateService'])->middleware('webmasterAdmin');
Route::get('/delete-service/{id}', [HomePageController::class, 'adminDeleteService'])->middleware('webmasterAdmin');

// Team
Route::get('/team', [HomePageController::class, 'adminShowTeam'])->middleware('webmasterAdmin');
Route::post('/store-team', [HomePageController::class, 'adminStoreTeam'])->middleware('webmasterAdmin');
Route::post('/update-title-team/{id}', [HomePageController::class, 'adminUpdateTitleTeam'])->middleware('webmasterAdmin');
Route::get('/edit-team/{id}', [HomePageController::class, 'adminEditTeam'])->middleware('webmasterAdmin');
Route::post('/update-team/{id}', [HomePageController::class, 'adminUpdateTeam'])->middleware('webmasterAdmin');
Route::get('/delete-team/{id}', [HomePageController::class, 'adminDeleteTeam'])->middleware('webmasterAdmin');
Route::post('/update-place-team', [HomePageController::class, 'adminUpdatePlaceTeam'])->middleware('webmasterAdmin');

// Ready
Route::get('/ready', [HomePageController::class, 'adminShowReady'])->middleware('webmasterAdmin');
Route::post('/update-ready/{id}', [HomePageController::class, 'adminUpdateReady'])->middleware('webmasterAdmin');

// Contacts
Route::get('/contacts', [HomePageController::class, 'adminShowContact'])->middleware('webmasterAdmin');
Route::post('/update-contacts/{id}', [HomePageController::class, 'adminUpdateContact'])->middleware('webmasterAdmin');
Route::post('/store-contact', [MailContactController::class, 'store']);

// Footer
Route::get('/footer', [HomePageController::class, 'adminShowFooter'])->middleware('webmasterAdmin');
Route::post('/update-footer/{id}', [HomePageController::class, 'adminUpdateFooter'])->middleware('webmasterAdmin');

// Services Page //
Route::get('/bannerHeader', [ServiceController::class, 'adminShowBannerHeaderService'])->middleware('webmasterAdmin');
Route::post('/update-bannerHeader-services/{id}', [ServiceController::class, 'adminUpdateBannerHeaderService'])->middleware('webmasterAdmin');

// Contact Page
Route::get('/banniereContact', [ContactController::class, 'adminShowBannerHeaderContact'])->middleware('webmasterAdmin');
Route::post('/update-bannerHeader-contact/{id}', [ContactController::class, 'adminUpdateBannerHeaderContact'])->middleware('webmasterAdmin');
Route::get('/googleMap', [ContactController::class, 'adminShowGoogleMap'])->middleware('webmasterAdmin');
Route::post('/update-googleMap/{id}', [ContactController::class, 'adminUpdateGoogleMap'])->middleware('webmasterAdmin');

// Blog Page
Route::get('/banniereBlog', [BlogController::class, 'adminShowBannerHeaderBlog'])->middleware('webmasterAdmin');
Route::post('/update-bannerHeader-blog/{id}', [BlogController::class, 'adminUpdateBannerHeaderBlog'])->middleware('webmasterAdmin');
Route::get('/articles', [BlogController::class, 'adminShowArticles'])->middleware('redacteurWebmasterAdmin');
Route::get('/attente', [BlogController::class, 'adminShowArticlesAttente'])->middleware('webmasterAdmin');
Route::get('/accepter-article/{id}', [BlogController::class, 'accepterArticle'])->middleware('webmasterAdmin');
Route::post('/store-article', [BlogController::class, 'adminCreateArticle'])->middleware('redacteurWebmasterAdmin');
Route::get('/edit-article/{id}', [BlogController::class, 'adminShowEditArticle'])->middleware('redacteurWebmasterAdmin');
Route::post('/update-article/{id}', [BlogController::class, 'adminUpdateArticle'])->middleware('redacteurWebmasterAdmin');
Route::get('/delete-article/{id}', [BlogController::class, 'adminDeletetArticle'])->middleware('redacteurWebmasterAdmin');

Route::get('/categories', [BlogController::class, 'adminShowCategories'])->middleware('redacteurWebmasterAdmin');
Route::post('/store-categorie', [BlogController::class, 'adminCreateCategorie'])->middleware('redacteurWebmasterAdmin');
Route::get('/edit-categorie/{id}', [BlogController::class, 'adminEditCategorie'])->middleware('redacteurWebmasterAdmin');
Route::post('/update-categorie/{id}', [BlogController::class, 'adminUpdateCategorie'])->middleware('redacteurWebmasterAdmin');
Route::get('/delete-categorie/{id}', [BlogController::class, 'adminDeleteCategorie'])->middleware('redacteurWebmasterAdmin');

Route::get('/tags', [BlogController::class, 'adminShowTags'])->middleware('redacteurWebmasterAdmin');
Route::post('/store-tag', [BlogController::class, 'adminCreateTag'])->middleware('redacteurWebmasterAdmin');
Route::get('/edit-tag/{id}', [BlogController::class, 'adminEditTag'])->middleware('redacteurWebmasterAdmin');
Route::post('/update-tag/{id}', [BlogController::class, 'adminUpdateTag'])->middleware('redacteurWebmasterAdmin');
Route::get('/delete-tag/{id}', [BlogController::class, 'adminDeleteTag'])->middleware('redacteurWebmasterAdmin');

// Blog Post Page
Route::get('/blog-post/{id}', [BlogPostController::class, 'show']);
Route::post('/store-commentary', [BlogPostController::class, 'store'])->middleware('auth');

// Newsletter
Route::get('/newsletter', [NewsletterController::class, 'index'])->middleware('webmasterAdmin');
Route::post('/store-newsletter', [NewsletterController::class, 'store']);

// Adminlte Profil
Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::get('/password', [ProfilController::class, 'password'])->middleware('auth');
Route::post('/update-profil/{id}', [ProfilController::class, 'update'])->middleware('auth');
Route::get('/mail', [ProfilController::class, 'mail']);
Route::post('/changePassword/{id}', [ProfilController::class, 'changePassword']);







