<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ParentCategoryController;
use App\Http\Controllers\Admin\PasswordChangeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestController as AdminRequestController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\FavoriteController as FrontFavoriteController;
use App\Http\Controllers\Front\Auth\LoginController as FrontLoginController;
use App\Http\Controllers\Front\Auth\RegisterController as FrontRegisterController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\BrandController as FrontBrandController;
use App\Http\Controllers\Front\RequestController;
use App\Http\Controllers\Front\ServiceController;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::middleware(['section'])->group(function () {


        // Authentication Routes...
        Route::get('/begler-05', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/begler-05', [LoginController::class, 'login'])->name('loginse');
        Route::post('/begler-06', [LoginController::class, 'logout'])->name('logout');

        Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::redirect('dashboard', 'section');
            Route::get('section', [SectionController::class, 'edit'])->name('sections.edit');
            Route::put('section', [SectionController::class, 'update'])->name('sections.update');
            Route::get('password-edit', [PasswordChangeController::class, 'edit'])->name('password.edit');
            Route::put('password-update/{user}', [PasswordChangeController::class, 'update'])->name('password.update');

            Route::resource('sliders', SliderController::class);
            Route::resource('cards', CardController::class);
            Route::resource('brands', BrandController::class);
            Route::resource('abouts', AdminAboutController::class);
            Route::resource('services', AdminServiceController::class);
            Route::resource('posts', PostController::class);
            Route::resource('banners', BannerController::class);
            Route::resource('contacts', AdminContactController::class);
            Route::resource('products', ProductController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('parent-categories', ParentCategoryController::class);
            Route::resource('requests', AdminRequestController::class);
        });

        Route::get('/sign-up', [FrontRegisterController::class, 'showRegistrationForm'])->name('front.register.form');
        Route::post('/sign-up', [FrontRegisterController::class, 'register'])->name('front.register');
        Route::get('/sign-in', [FrontLoginController::class, 'showLoginForm'])->name('front.login.form');
        Route::post('/sign-in', [FrontLoginController::class, 'login'])->name('front.login');
        Route::get('/sign-out', [FrontLoginController::class, 'logout'])->name('front.logout');
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get(LaravelLocalization::transRoute('routes.about'), [AboutController::class, 'index'])->name('about.index');
        Route::get(LaravelLocalization::transRoute('routes.services'), [ServiceController::class, 'index'])->name('services.index');
        Route::get(LaravelLocalization::transRoute('routes.services.show'), [ServiceController::class, 'show'])->name('services.show');
        Route::get(LaravelLocalization::transRoute('routes.contact'), [ContactController::class, 'index'])->name('contact.index');

        Route::get(LaravelLocalization::transRoute('routes.categories'), [FrontCategoryController::class, 'index'])->name('categories.index');
        Route::get(LaravelLocalization::transRoute('routes.brands'), [FrontBrandController::class, 'index'])->name('brands.index');
        Route::get(LaravelLocalization::transRoute('routes.products'), [FrontProductController::class, 'index'])->name('products.index');
        Route::get(LaravelLocalization::transRoute('routes.products.show'), [FrontProductController::class, 'show'])->name('products.show');
        Route::get(LaravelLocalization::transRoute('routes.posts'), [FrontPostController::class, 'index'])->name('posts.index');
        Route::get(LaravelLocalization::transRoute('routes.posts.show'), [FrontPostController::class, 'show'])->name('posts.show');
        Route::get('favorites', [FrontFavoriteController::class, 'index'])->name('favorites.index');
        Route::get('favorite-count', [FrontFavoriteController::class, 'favoriteCount'])->name('favorites.count');
        Route::post('add-to-favorites/{product}', [FrontFavoriteController::class, 'addToFavorites'])->name('favorites.add');
        Route::post('remove-from-favorites/{product}', [FrontFavoriteController::class, 'removeFromFavorites'])->name('favorites.remove');
        Route::get('cart', [CartController::class, 'index'])->name('cart');
        Route::get('load-cart-data',[CartController::class, 'loadData'])->name('loadCart');
        Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('addtocart');
        Route::post('update-to-cart', [CartController::class, 'updateToCart'])->name('updateToCart');
        Route::delete('delete-from-cart',[CartController::class, 'deleteFromCart'])->name('deleteFromCart');
        Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
        Route::post('cart/order', [CartController::class, 'order'])->name('cart.order');

        Route::post('/sender', [ContactController::class, 'sendMail'])->name('sendMail');
        Route::post('product-request', [RequestController::class, 'store'])->name('requests.store');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
