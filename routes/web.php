<?php

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

// HOME
Route::get('/', function () {
    return view('welcome');
});
// END HOME

// USER
Route::get('/dashboard', function () {
    return redirect()->route('wallet');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/wallet', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('wallet');

Route::get('/coupon', function () {
    return view('user.coupon');
})->middleware(['auth', 'verified'])->name('coupon');
// END USER

// CASHIER
Route::get('/pos', function () {
    return view('pos.pos');
})->middleware(['auth', 'verified'])->name('pos');

Route::get('/result', function () {
    return view('pos.result');
})->middleware(['auth', 'verified'])->name('result');
// END CASHIER

// CORPORATE
// END CORPORATE

// SUPERADMIN
Route::get('/playground', function () {
    return view('playground');
})->middleware(['auth', 'verified'])->name('playground');
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
