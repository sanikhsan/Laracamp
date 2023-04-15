<?php

use App\Http\Controllers\CustomerController;
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

    Route::get('checkout', function () {
        return view('checkout');
    })->name('customer.checkout');

    Route::get('success', function () {
        return view('checkout-success');
    })->name('customer.checkout-success');
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
