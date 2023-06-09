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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test-select-gadget', function () {
    return view('test-select-gadget');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/playground', function () {
    return view('playground');
})->middleware(['auth', 'verified'])->name('playground');

Route::get('/pos', function () {
    return view('pos.pos');
})->middleware(['auth', 'verified'])->name('pos');

Route::get('/result', function () {
    return view('pos.result');
})->middleware(['auth', 'verified'])->name('result');

Route::get('/wallet', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('wallet');

Route::get('/coupon', function () {
    return view('user.coupon');
})->middleware(['auth', 'verified'])->name('coupon');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
