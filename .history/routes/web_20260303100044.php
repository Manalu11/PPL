<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;




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
//admin routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {
        Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])
            ->name('products.bulkDelete');

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('/orders', AdminOrderController::class);
        Route::resource('/products', ProductController::class);
        Route::get('/products-pdf', [ProductController::class, 'exportPdf'])
            ->name('products.pdf');
        Route::resource('/users', UserController::class);
        Route::patch(
            '/orders/{order}/status',
            [AdminOrderController::class, 'updateStatus']
        )->name('orders.updateStatus');
        //ko
    });





require __DIR__ . '/auth.php';