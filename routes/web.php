<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideosController;
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
    return view('auth.login');
});

// Route::get('transmision', function() {
//     return view('transmision');
// })->name('transmision');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/send_users_confimation', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('videos', VideosController::class);
});

require __DIR__.'/auth.php';


// Route::resource('videos', VideosController::class);


// Route::middleware('auth')->group(function () {
    
// });