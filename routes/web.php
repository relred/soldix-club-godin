<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CorporatesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('welcome');
});
// END HOME

Route::get('/dashboard', [DashboardController::class, 'redirect'])->middleware(['auth', 'verified'])->name('dashboard');

// USER
Route::middleware(['auth', 'verified', 'is_user'])->group(function (){
    Route::get('/wallet', function () {
        return view('user.index');
    })->name('wallet');
    
    Route::get('/coupon', function () {
        return view('user.coupon');
    })->name('coupon');
});
// END USER

// CASHIER
Route::get('/pos', function () {
    return view('pos.pos');
})->middleware(['auth', 'verified'])->name('pos');

Route::get('/result', function () {
    return view('pos.result');
})->middleware(['auth', 'verified'])->name('result');
// END CASHIER
Route::middleware(['auth', 'verified', 'is_admin'])->group(function (){
    Route::get('/corporate', [CorporateController::class, 'index'])->name('corporate.index');
});
// CORPORATE
// END CORPORATE

// SUPERADMIN
Route::middleware(['auth', 'verified', 'is_admin'])->group(function (){
    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
    Route::post('/admin', [AdminsController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{id}', [AdminsController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/corporate', [CorporatesController::class, 'index'])->name('admin.corporate.index');
    Route::post('/admin/corporate', [CorporatesController::class, 'store'])->name('admin.corporate.store');
    Route::delete('/admin/corporate/{id}', [CorporatesController::class, 'destroy'])->name('admin.corporate.destroy');
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
