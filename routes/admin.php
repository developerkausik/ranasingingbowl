<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Cms\BannerController;
use App\Http\Controllers\Admin\Cms\CmsController;
use App\Http\Controllers\Admin\Cms\LaserImageController;
use App\Http\Controllers\Admin\CopyData\DataController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use App\Http\Controllers\Admin\Exhibition\ExhibitionController;
use App\Http\Controllers\Admin\Exhibition\ExhibitionImageController;
use App\Http\Controllers\Admin\Gallery\GalleryPictureController;
use App\Http\Controllers\Admin\Gallery\GalleryVideoController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductImagesController;
use App\Http\Controllers\Admin\Product\ProductsController;
use App\Http\Controllers\Admin\Product\ProductSoundController;
use App\Http\Controllers\Admin\Product\ProductVariantsController;
use App\Http\Controllers\Admin\Product\ProductVariantSoundController;
use App\Http\Controllers\Admin\SeoMetaController;
use App\Http\Controllers\Admin\Settings\ProfileController;
use App\Http\Controllers\Admin\Testimonials\TestimonialsController;
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

Route::get('/admin-login', [AuthController::class, 'getLogin'])->name('adminLogin');
Route::post('/admin-login', [AuthController::class, 'postLogin'])->name('adminLoginPost');

Route::group(['middleware' => 'adminauth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('adminDashboard');

    Route::get('/banner', [BannerController::class, 'index'])->name('adminBanner');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('adminBannerAdd');
    Route::get('/banner/update/{id}', [BannerController::class, 'update'])->name('adminBannerUpdate');
    Route::post('/banner/delete', [BannerController::class, 'delete'])->name('adminBannerDelete');
    Route::post('/banner', [BannerController::class, 'store'])->name('adminBannerDataSubmit');

    Route::get('/seo', [SeoMetaController::class, 'index'])->name('adminSeo');
    Route::get('/seo/create', [SeoMetaController::class, 'create'])->name('adminSeoAdd');
    Route::get('/seo/update/{id}', [SeoMetaController::class, 'update'])->name('adminSeoUpdate');
    Route::post('/seo/delete', [SeoMetaController::class, 'delete'])->name('adminSeoDelete');
    Route::post('/seo', [SeoMetaController::class, 'store'])->name('adminSeoDataSubmit');

    Route::get('/cms', [CmsController::class, 'index'])->name('adminCms');
    Route::get('/cms/create', [CmsController::class, 'create'])->name('adminCmsAdd');
    Route::get('/cms/update/{id}', [CmsController::class, 'update'])->name('adminCmsUpdate');
    Route::post('/cms/delete', [CmsController::class, 'delete'])->name('adminCmsDelete');
    Route::post('/cms', [CmsController::class, 'store'])->name('adminCmsDataSubmit');

    Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('adminTestimonials');
    Route::get('/testimonials/create', [TestimonialsController::class, 'create'])->name('adminTestimonialsAdd');
    Route::get('/testimonials/update/{id}', [TestimonialsController::class, 'update'])->name('adminTestimonialsUpdate');
    Route::post('/testimonials/delete', [TestimonialsController::class, 'delete'])->name('adminTestimonialsDelete');
    Route::post('/testimonials', [TestimonialsController::class, 'store'])->name('adminTestimonialsDataSubmit');

    Route::get('/laser-image', [LaserImageController::class, 'index'])->name('adminLaserImage');
    Route::get('/laser-image/create', [LaserImageController::class, 'create'])->name('adminLaserImageAdd');
    Route::get('/laser-image/update/{id}', [LaserImageController::class, 'update'])->name('adminLaserImageUpdate');
    Route::post('/laser-image/delete', [LaserImageController::class, 'delete'])->name('adminLaserImageDelete');
    Route::post('/laser-image', [LaserImageController::class, 'store'])->name('adminLaserImageDataSubmit');

    Route::get('/gallery-image', [GalleryPictureController::class, 'index'])->name('adminGalleryPicture');
    Route::get('/gallery-image/create', [GalleryPictureController::class, 'create'])->name('adminGalleryPictureAdd');
    Route::get('/gallery-image/update/{id}', [GalleryPictureController::class, 'update'])->name('adminGalleryPictureUpdate');
    Route::post('/gallery-image/delete', [GalleryPictureController::class, 'delete'])->name('adminGalleryPictureDelete');
    Route::post('/gallery-image', [GalleryPictureController::class, 'store'])->name('adminGalleryPictureDataSubmit');

    Route::get('/gallery-video', [GalleryVideoController::class, 'index'])->name('adminGalleryVideo');
    Route::get('/gallery-video/create', [GalleryVideoController::class, 'create'])->name('adminGalleryVideoAdd');
    Route::get('/gallery-video/update/{id}', [GalleryVideoController::class, 'update'])->name('adminGalleryVideoUpdate');
    Route::post('/gallery-video/delete', [GalleryVideoController::class, 'delete'])->name('adminGalleryVideoDelete');
    Route::post('/gallery-video', [GalleryVideoController::class, 'store'])->name('adminGalleryVideoDataSubmit');

    /* product section */
    Route::get('/product-category', [CategoryController::class, 'index'])->name('adminProductCategory');
    Route::get('/product-category/create', [CategoryController::class, 'create'])->name('adminProductCategoryAdd');
    Route::get('/product-category/update/{id}', [CategoryController::class, 'update'])->name('adminProductCategoryUpdate');
    Route::post('/product-category/delete', [CategoryController::class, 'delete'])->name('adminProductCategoryDelete');
    Route::post('/product-category', [CategoryController::class, 'store'])->name('adminProductCategoryDataSubmit');

    Route::get('/products', [ProductsController::class, 'index'])->name('adminProduct');
    Route::post('/products/list', [ProductsController::class, 'productList'])->name('adminProductList');
    Route::post('/products/delete-seacrh', [ProductsController::class, 'deleteSearch'])->name('adminProductDeleteSearch');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('adminProductAdd');
    Route::get('/products/update/{id}', [ProductsController::class, 'update'])->name('adminProductUpdate');
    Route::post('/products/delete', [ProductsController::class, 'delete'])->name('adminProductDelete');
    Route::post('/products', [ProductsController::class, 'store'])->name('adminProductDataSubmit');
    Route::post('/products-sorting', [ProductsController::class, 'sortOrderSave'])->name('adminProductSortOrder');

    Route::get('/product-image/{id}', [ProductImagesController::class, 'index'])->name('adminProductImage');
    Route::get('/product-image/update/{id}/{imageId}', [ProductImagesController::class, 'update'])->name('adminProductImageUpdate');
    Route::post('/product-image/delete', [ProductImagesController::class, 'delete'])->name('adminProductImageDelete');
    Route::post('/product-image', [ProductImagesController::class, 'store'])->name('adminProductImageDataSubmit');

    Route::get('/product-variant/{id}', [ProductVariantsController::class, 'index'])->name('adminProductVariant');
    Route::get('/product-variant/create/{id}', [ProductVariantsController::class, 'create'])->name('adminProductVariantAdd');
    Route::get('/product-variant/update/{id}', [ProductVariantsController::class, 'update'])->name('adminProductVariantUpdate');
    Route::post('/product-variant/delete', [ProductVariantsController::class, 'delete'])->name('adminProductVariantDelete');
    Route::post('/product-variant', [ProductVariantsController::class, 'store'])->name('adminProductVariantDataSubmit');

    Route::get('/product-sound/{id}', [ProductSoundController::class, 'index'])->name('adminProductSound');
    Route::get('/product-sound/update/{id}/{soundId}', [ProductSoundController::class, 'update'])->name('adminProductSoundUpdate');
    Route::post('/product-sound/delete', [ProductSoundController::class, 'delete'])->name('adminProductSoundDelete');
    Route::post('/product-sound', [ProductSoundController::class, 'store'])->name('adminProductSoundDataSubmit');

    Route::get('/product-variant-sound/{id}', [ProductVariantSoundController::class, 'index'])->name('adminProductVariantSound');
    Route::get('/product-variant-sound/update/{id}/{soundId}', [ProductVariantSoundController::class, 'update'])->name('adminProductVariantSoundUpdate');
    Route::post('/product-variant-sound/delete', [ProductVariantSoundController::class, 'delete'])->name('adminProductVariantSoundDelete');
    Route::post('/product-variant-sound', [ProductVariantSoundController::class, 'store'])->name('adminProductVariantSoundDataSubmit');

    Route::get('/product-enquiry', [EnquiryController::class, 'productEnquiry'])->name('adminProductEnquiry');
    Route::post('/product-enquiry/delete', [EnquiryController::class, 'productEnquiryDelete'])->name('adminProductEnquiryDelete');

    Route::get('/contact-enquiry', [EnquiryController::class, 'contactEnquiry'])->name('adminContactEnquiry');
    Route::post('/contact-enquiry/delete', [EnquiryController::class, 'contactEnquiryDelete'])->name('adminContactEnquiryDelete');

    Route::get('/enquiry', [EnquiryController::class, 'enquiry'])->name('adminEnquiry');
    Route::post('/enquiry/delete', [EnquiryController::class, 'enquiryDelete'])->name('adminEnquiryDelete');

    Route::get('/franchise-enquiry', [EnquiryController::class, 'franchiseEnquiry'])->name('adminFranchiseEnquiry');
    Route::post('/franchise-enquiry/delete', [EnquiryController::class, 'franchiseEnquiryDelete'])->name('adminFranchiseEnquiryDelete');

    Route::get('/settings', [ProfileController::class, 'index'])->name('adminSettings');
    Route::post('/settings', [ProfileController::class, 'store'])->name('adminSettingsDataSubmit');

    Route::get('/change-password', [ProfileController::class, 'profilePassword'])->name('profilePassword');
    Route::post('/change-password', [ProfileController::class, 'profilePasswordSubmit'])->name('profilePasswordSubmit');

    /* EXHIBITION */
    Route::get('/exhibitions', [ExhibitionController::class, 'index'])->name('adminExhibitions');
    Route::get('/exhibitions/create', [ExhibitionController::class, 'create'])->name('adminExhibitionsAdd');
    Route::get('/exhibitions/update/{id}', [ExhibitionController::class, 'update'])->name('adminExhibitionsUpdate');
    Route::post('/exhibitions/delete', [ExhibitionController::class, 'delete'])->name('adminExhibitionsDelete');
    Route::post('/exhibitions', [ExhibitionController::class, 'store'])->name('adminExhibitionsDataSubmit');

    Route::get('/exhibitions-images/{id}', [ExhibitionImageController::class, 'index'])->name('adminExhibitionImages');
    Route::get('/exhibitions-images/update/{id}/{imageId}', [ExhibitionImageController::class, 'update'])->name('adminExhibitionImagesUpdate');
    Route::post('/exhibitions-images/delete', [ExhibitionImageController::class, 'delete'])->name('adminExhibitionImagesDelete');
    Route::post('/exhibitions-images', [ExhibitionImageController::class, 'store'])->name('adminExhibitionImagesDataSubmit');

    Route::get('/admin-logout', [AuthController::class, 'logout'])->name('adminLogout');

    /* OLD DATA COPY */
    Route::get('/copy-laser-data', [DataController::class, 'copyLaserData'])->name('copyLaserData');
    Route::get('/copy-gallery-picture-data', [DataController::class, 'copyGalleryData'])->name('copyGalleryData');
    Route::get('/copy-gallery-video-data', [DataController::class, 'copyGalleryVideoData'])->name('copyGalleryVideoData');
    Route::get('/copy-product-category', [DataController::class, 'copyProductCategory'])->name('copyProductCategory');
    Route::get('/copy-product', [DataController::class, 'copyProduct'])->name('copyProduct');
    Route::get('/copy-product-image', [DataController::class, 'copyProductImage'])->name('copyProductImage');
    Route::get('/copy-product-varient', [DataController::class, 'copyProductVarient'])->name('copyProductVarient');
    Route::get('/copy-contact-request', [DataController::class, 'copyContactRequest'])->name('copyContactRequest');
    Route::get('/copy-enquiry-request', [DataController::class, 'copyEnquiryRequest'])->name('copyEnquiryRequest');
    Route::get('/copy-product-enquiry-request', [DataController::class, 'copyProductEnquiryRequest'])->name('copyProductEnquiryRequest');
});
