<?php

use App\Http\Controllers\CustomerCheckout;
use App\Http\Controllers\CustomerCheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');

    // Socialite
    Route::get('sign-in-google', [CustomerController::class, 'google'])->name('customer.login.google');
    Route::get('auth/google/callback', [CustomerController::class, 'handleProviderCallback'])->name('customer.login.callback');

    Route::middleware('auth')->group(function () {
        Route::get('checkout/{camp:slug}', [CustomerCheckoutController::class, 'create'])->name('customer.checkout.create');
        Route::post('checkout/{camp}', [CustomerCheckoutController::class, 'store'])->name('customer.checkout.store');

        Route::get('success', function () {
            return view('checkout-success');
        })->name('customer.checkout-success');

        Route::get('dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
