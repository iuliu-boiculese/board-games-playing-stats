<?php

use App\Http\Controllers\BoardgameController;
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

// << Custom routes
Route::get('/boardgames', [BoardgameController::class, 'index'])->name('boardgames.index');
Route::get('/boardgames/{boardgame:slug}', [BoardgameController::class, 'show'])->name('boardgames.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('boardgames', BoardgameController::class)->except(['index', 'show']);
});
// >>

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
