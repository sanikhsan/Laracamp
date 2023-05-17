<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Customer\CustomerCheckoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Customer\CustomerProfileController;
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

Route::get('dashboard', [ProfileController::class, 'index'])->name('dashboard');

Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');

    // Socialite
    Route::get('sign-in-google', [CustomerController::class, 'google'])->name('customer.login.google');
    Route::get('auth/google/callback', [CustomerController::class, 'handleProviderCallback'])->name('customer.login.callback');

    Route::middleware(['auth','EnsureUserRole:customer'])->group(function () {
        Route::get('checkout/{camp:slug}', [CustomerCheckoutController::class, 'create'])->name('customer.checkout.create');
        Route::post('checkout/{camp}', [CustomerCheckoutController::class, 'store'])->name('customer.checkout.store');

        Route::get('success', function () {
            return view('customers.checkout-success');
        })->name('customer.checkout-success');

        // Midtrans
        Route::get('payment/success', [CustomerCheckoutController::class, 'midtransCallback']);
        Route::post('payment/success', [CustomerCheckoutController::class, 'midtransCallback']);

        Route::get('dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
        Route::get('/profile', [CustomerProfileController::class, 'edit'])->name('customer.edit');
        Route::patch('/profile', [CustomerProfileController::class, 'update'])->name('customer.update');
    });
});

Route::get('admin', [ProfileController::class, 'adminRedirect'])->name('admin.redirect');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'verified', 'EnsureUserRole:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('discount', DiscountController::class);
        // Route::post('/checkout/{checkout}', [DashboardController::class, 'updatePaid'])->name('checkout.update');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
