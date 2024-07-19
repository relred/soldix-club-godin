<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CorporatesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\WalletsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\RedeemedCouponController;
use App\Models\RedeemedCoupon;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('welcome');
});
// END HOME

//GENERAL
Route::get('/dashboard', [DashboardController::class, 'redirect'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/coupons/{id}', [CouponsController::class, 'view'])->name('coupon'); //coupon view

Route::get('/access/{email}/{phone}', [ClientController::class, 'accessByLink'])->name('access');

// USER
Route::middleware(['auth', 'verified', 'is_user'])->group(function () {
    Route::get('/home', function () {
        return view('user.index');
    })->name('home');

    Route::get('/wallets', [WalletsController::class, 'public_index'])->name('public.wallets.index');
    Route::get('/wallets/{id}', [WalletsController::class, 'public_view'])->name('public.wallets.view');
});
// END USER

// CASHIER
Route::middleware(['auth', 'is_cashier', 'verified'])->group(function (){
    Route::get('/pos', function () {
        return view('pos.pos');
    })->name('pos');
    
    Route::get('/result', function () {
        return view('pos.result');
    })->name('result');
    
    Route::get('/redeem/{coupon_id}/{user_id}', [RedeemedCouponController::class, 'view'])->name('pos.coupon.vew');
    Route::post('/redeem', [RedeemedCouponController::class, 'store'])->name('pos.coupon.redeem');
    Route::get('/pos/error/{coupon_id}/{user_id}', [RedeemedCouponController::class, 'errorView'])->name('pos.error');
    Route::get('/pos/success', fn() => view('pos.success'))->name('pos.success');
    Route::get('/pos/history', [CashierController::class, 'redeemHistory'])->name('pos.history');

});
// END CASHIER

// CORPORATE
Route::middleware(['auth', 'verified', 'is_corporate'])->group(function () {
    //USERS
    Route::get('/corporate/users', [CorporatesController::class, 'index'])->name('corporate.index');
    Route::post('/corporate/users', [CorporatesController::class, 'store'])->name('corporate.store');

    //BRANDS
    Route::get('/corporate/brands', [BrandsController::class, 'index'])->name('corporate.brands');
    Route::get('/corporate/brands/{id}', [BrandsController::class, 'view'])->name('corporate.brands.view');
    Route::post('/corporate/brands/{id}', [WalletsController::class, 'store'])->name('corporate.wallets.store');
    Route::post('/corporate/brands', [BrandsController::class, 'store'])->name('corporate.brands.store');

    //STORES
/*     Route::get('/corporate/stores', [StoresController::class, 'index'])->name('corporate.stores');
    Route::post('/corporate/stores', [StoresController::class, 'store'])->name('corporate.stores.store'); */
    
    //Clients
/*     Route::get('/corporate/clients', [ClientController::class, 'index'])->name('corporate.clients');
    Route::post('/corporate/clients', [ClientController::class, 'store'])->name('corporate.clients.store'); */

    Route::get('/corporate/cashiers', [CashierController::class, 'index'])->name('corporate.cashiers');
    Route::post('/corporate/cashiers', [CashierController::class, 'store'])->name('corporate.cashiers.store');

    // COUPONS
    Route::get('/corporate/coupons', [CouponsController::class, 'index'])->name('corporate.coupons');
    Route::get('/corporate/coupons/add', [CouponsController::class, 'add'])->name('corporate.coupons.add');
    Route::get('/corporate/coupons/edit/{id}', [CouponsController::class, 'edit'])->name('corporate.coupons.edit');
    Route::patch('/corporate/coupons/update', [CouponsController::class, 'update'])->name('corporate.coupons.update');

    // WALLETS
    Route::get('/corporate/wallets', [WalletsController::class, 'index'])->name('corporate.wallets');
    Route::get('/corporate/wallets/{id}', [WalletsController::class, 'view'])->name('corporate.wallets.view');
    Route::post('/corporate/wallets/{id}', [WalletsController::class, 'update'])->name('corporate.wallets.update');
    Route::patch('/corporate/wallets/{id}/bulk-date', [WalletsController::class, 'bulkEditDate'])->name('corporate.wallets.bulk.date');
    Route::patch('/corporate/wallets/{id}/bulk-days', [WalletsController::class, 'bulkEditDays'])->name('corporate.wallets.bulk.days');
    Route::patch('/corporate/wallets/{id}/bulk-public', [WalletsController::class, 'bulkEditPublic'])->name('corporate.wallets.bulk.public');
    Route::get('/corporate/wallets/{id}/add', [CouponsController::class, 'add_to_wallet'])->name('corporate.wallets.coupon.add');
});
// END CORPORATE

// SUPERADMIN
Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/admin/users', [AdminsController::class, 'index'])->name('admin.index');
    Route::post('/admin/users', [AdminsController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{id}', [AdminsController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/corporates', [CorporatesController::class, 'index'])->name('admin.corporate.index');
    Route::post('/admin/corporates', [CorporatesController::class, 'store_local_admin'])->name('admin.corporate.store');
    Route::delete('/admin/corporates/{id}', [CorporatesController::class, 'destroy'])->name('admin.corporate.destroy');
});
// END SUPERADMIN

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// TESTS
Route::get('/test', function () {
    return view('test');
});

Route::get('/test-select-gadget', function () {
    return view('test-select-gadget');
});
// END TESTS

require __DIR__.'/auth.php';
