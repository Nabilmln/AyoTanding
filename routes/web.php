<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TiketController;

// Landing
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/landing', function () {
    return view('welcome');
})->name('landing');

// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Main
Route::get('/main', [MainPageController::class, 'mainView'])->name('main')->middleware('auth');
Route::get('/lapangan/{id}', [MainPageController::class, 'detail'])->name('lapangan.detail');

// Field registration (owner & admin only)
Route::middleware(['auth', 'role:owner,admin'])->group(function () {
    Route::get('/daftarkan-lapangan', [LapanganController::class, 'showDaftarLapanganForm'])->name('daftarkan-lapangan');
    Route::post('/daftarkan-lapangan', [LapanganController::class, 'storeLapangan'])->name('storeLapangan');
});

// Cart
Route::get('/keranjang', [BookingController::class, 'showCart'])->name('keranjang');
Route::post('/keranjang/add/{lapanganId}', [BookingController::class, 'addToCart'])->name('keranjang.add');
Route::delete('/keranjang/remove/{bookingId}', [BookingController::class, 'removeFromCart'])->name('keranjang.remove');

// Checkout & Payment
Route::get('/checkout/{bookingId}', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [BookingController::class, 'processCheckout'])->name('checkout.process');
Route::post('/checkout/{bookingId}', [BookingController::class, 'checkout'])->name('checkout.post');
Route::post('/complete-checkout', [BookingController::class, 'completeCheckout'])->name('completeCheckout');
Route::get('/payment', [BookingController::class, 'showPaymentPage'])->name('payment');
Route::post('/payment/process', [BookingController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', [BookingController::class, 'successPayment'])->name('payment.success');

// Tickets & Profile
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');

// Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/dashboard/approve/{id}', [AdminController::class, 'approve'])->name('admin.dashboard.approve');
Route::post('/admin/dashboard/reject/{id}', [AdminController::class, 'reject'])->name('admin.dashboard.reject');

// Placeholder
Route::get('/fields', function () {
    return view('main');
})->name('fields')->middleware('auth');
