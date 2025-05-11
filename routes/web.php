<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name("home");
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/search', [WelcomeController::class, 'search'])->name('search.products');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/community', function () {
    return view('community');
})->name('community');

Route::get('/products', function () {
    return view('products');
})->name('products');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products');

use Illuminate\Support\Facades\DB;

Route::get('/product/{product_id}', function($product_id) {
    // Fetch the product by ID using the query builder
    $product = DB::table('products')->where('product_id', $product_id)->first();

    if (!$product) {
        abort(404, 'Product not found');
    }

    return view('productdetails', compact('product'));
})->name('product.details');




Route::get('/product/{id}/image', [ProductController::class, 'show'])->name('product.image');

use App\Http\Controllers\CartController;

Route::post('/product/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('product.addToCart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/viewblogs', [BlogController::class, 'showBlogs'])->name('viewblogs');


Route::get('/compare', [ProductController::class, 'compare'])->name('compare.index');
Route::get('/compare/add/{product_id}', [ProductController::class, 'addToCompare'])->name('compare.add');
// In web.php
Route::get('/compare/remove/{product_id}', [ProductController::class, 'removeFromCompare'])->name('compare.remove');

use App\Http\Controllers\ShoutoutController;

Route::get('/shoutout', [ShoutoutController::class, 'index'])->name('shoutout.index');
Route::post('/shoutout', [ShoutoutController::class, 'store']);

// Admin login routes
use App\Http\Controllers\AdminLoginController;
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
use App\Http\Controllers\AdminController;
// Route::middleware('admin')->group(function() {
//     // Admin-specific routes
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.viewUsers');
});
Route::get('admin/users/{id}', [AdminController::class, 'viewUser'])->name('admin.viewUser');
Route::get('admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
Route::put('admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::delete('admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');




Route::post('/product/{product}/add-to-cart', [CartController::class, 'addToCart'])->name('product.add-to-cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update/{product_id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('update-shipping-method', [CartController::class, 'updateShippingMethod'])->name('cart.updateShippingMethod');


use App\Http\Controllers\OrderController;

Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');


Route::get('/order/confirmation/{order_id}', [OrderController::class, 'orderConfirmation'])->name('order.confirmation');

Route::get('/my-orders', [OrderController::class, 'index'])->name('my.orders');

Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('admin.orders');


Route::get('/admin/orders/{order}/details', [AdminController::class, 'showOrderDetails'])->name('admin.order.details');

Route::put('admin/order/{orderId}/update-shipping-status', [AdminController::class, 'updateShippingStatus'])->name('admin.updateShippingStatus');


Route::get('/admin/discounts', [AdminController::class, 'showDiscounts'])->name('admin.discounts');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
use App\Http\Controllers\CouponController;

// Route::post('/apply-coupon', [CouponController::class, 'applyCoupon'])->name('apply.coupon');
Route::post('/store-coupon', [CouponController::class, 'store'])->name('store.coupon');

Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');


Route::get('/admin/discounts', [AdminController::class, 'showDiscounts'])->name('admin.discounts');
Route::post('/discounts', [CouponController::class, 'store'])->name('discount.store');
Route::delete('/discount/{id}', [CouponController::class, 'destroy'])->name('discount.destroy');


Route::get('/clear-cart', function () {
    session()->forget('cart');
    return "Cart cleared!";
});

//Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('admin.orders');
// AdminController.php-> controller name
// showOrders-> method name in that controller
// admin.orders-> route name



















require __DIR__.'/auth.php';
