<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendIndexController;
use App\Http\Controllers\ProfileIndexController;
use App\Http\Controllers\FriendStoreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/friends', FriendIndexController::class)->name('friends');
Route::post('/friends/{user}', FriendStoreController::class)->name('friends.store');

Route::get('/profile/{user}', ProfileIndexController::class)->name('profile');






require __DIR__.'/auth.php';
