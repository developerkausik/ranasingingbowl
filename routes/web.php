<?php

use App\Http\Controllers\Web\Enquiry\ContactusController;
use App\Http\Controllers\Web\Exhibition\ExhibitionController;
use App\Http\Controllers\Web\Franchise\FranchiseController;
use App\Http\Controllers\Web\Gallery\GalleryController;
use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\Pages\PageController;
use App\Http\Controllers\Web\Product\CategoryController;
use App\Http\Controllers\Web\Product\ProductsController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
Route::get('/blog', function () {
    return Redirect::to('/blog/', 301); // Permanent redirect to folder
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/laser', [PageController::class, 'laser'])->name('laser');
Route::get('/company-profile', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/infrastructure', [PageController::class, 'infrastructure'])->name('infrastructure');
Route::get('/contact-us', [ContactusController::class, 'index'])->name('contactUs');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/video', [GalleryController::class, 'videoGallery'])->name('video');

Route::get('/category/{slug}', [CategoryController::class , 'index'])->name('category');
Route::get('/products/{category}/{product}', [ProductsController::class , 'index'])->name('products');
Route::get('/product-variant/{category}/{product}/{variant}/{code}', [ProductsController::class , 'variantDetails'])->name('productVariant');
Route::get('/product-variant-all/{category}/{product}', [ProductsController::class , 'variantList'])->name('productVariantAll');
Route::post('/product-enquiry', [ProductsController::class, 'enquirySubmit'])->name('productEnquirySubmit');
Route::get('/search', [ProductsController::class, 'search'])->name('search');

Route::post('/contact-us', [ContactusController::class, 'store'])->name('contactUsSubmit');
Route::post('/enquiry', [ContactusController::class, 'enquirySubmit'])->name('enquirySubmit');

Route::get('/franchise', [FranchiseController::class, 'index'])->name('franchise');
Route::post('/franchise', [FranchiseController::class, 'store'])->name('franchiseSubmit');

Route::get('/exhibitions', [ExhibitionController::class, 'index'])->name('exhibition');
