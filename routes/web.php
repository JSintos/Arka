<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;

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

Route::get('proxy-community', [CommunityController::class, 'create'])
                ->name('proxy-community');

Route::post('proxy-community', [CommunityController::class, 'store']);

Route::get('proxy-update-user', [UserController:: class, 'create'])
                ->name('proxy-update-user');
Route::post('proxy-update-user', [UserController:: class, 'profileUpdate']);


require __DIR__.'/auth.php';
