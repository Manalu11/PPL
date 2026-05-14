<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PromotionController; // ← tambahkan ini

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/skin/{skin}', [DashboardController::class, 'bySkin']);
Route::get('/category/{slug}', [DashboardController::class, 'byCategory']);
Route::get('/product/{id}', [DashboardController::class, 'show'])
    ->name('product.show');

Route::get('/promotion', [DashboardController::class, 'promotion'])
    ->name('promotion');
Route::get('/new-arrivals', [DashboardController::class, 'newArrivals'])
    ->name('new.arrivals');
Route::get('/best-seller', [DashboardController::class, 'bestSeller'])
    ->name('best.seller');

Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

Route::get('/orders/{id}', [CheckoutController::class, 'show'])
    ->name('orders.show')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

// ===== ADMIN ROUTES =====
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Products
        Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])
            ->name('products.bulkDelete');
        Route::resource('/products', ProductController::class);
        Route::get('/products-pdf', [ProductController::class, 'exportPdf'])
            ->name('products.pdf');

        // Orders
        Route::resource('/orders', AdminOrderController::class);
        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        // Users
        Route::resource('/users', UserController::class);

        // Checkout (admin)
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::get('/checkout/payment/{id}', [CheckoutController::class, 'payment'])->name('checkout.payment');
        Route::post('/checkout/payment/{id}/confirm', [CheckoutController::class, 'confirmPayment'])->name('checkout.confirm');

        // Promotions
        Route::post('/promotions/banner', [PromotionController::class, 'updateBanner'])
            ->name('promotions.banner.update');
        Route::delete('/promotions/banner', [PromotionController::class, 'destroyBanner'])
            ->name('promotions.banner.destroy');
        Route::resource('/promotions', PromotionController::class);

        // Banner — harus SEBELUM resource promotions tapi karena sudah prefix admin, tulis di sini
        Route::post('/promotions/banner', [PromotionController::class, 'updateBanner'])
            ->name('promotions.banner.update');
        Route::delete('/promotions/banner', [PromotionController::class, 'destroyBanner'])
            ->name('promotions.banner.destroy');
    });

require __DIR__ . '/auth.php';
