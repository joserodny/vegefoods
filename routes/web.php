<?php

use App\Http\Controllers\Pages\CartController;
use App\Http\Controllers\Pages\CheckoutController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pages\ProductController;
use App\Http\Controllers\Pages\SingleProductController;
use App\Http\Controllers\Pages\WishlistController;


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



Route::get('/', function () {
    return view('index');
})->name('welcome');

//Pages
Route::get('/shop', ProductController::class)->name('product');
Route::get('/wish-list', WishlistController::class)->name('wishlist');
Route::get('/product', SingleProductController::class)->name('single-product');
Route::get('/cart', CartController::class)->name('cart');
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/check-out', CheckoutController::class)->name('check-out');
//End Pages



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('adminDashboard');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
