<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('dashboard');

Route::get('proxy-community', [CommunityController::class, 'create'])
                ->name('proxy-community');

Route::post('proxy-community', [CommunityController::class, 'store']);

Route::get('proxy-update-user', [UserController:: class, 'create'])
                ->name('proxy-update-user');
Route::post('proxy-update-user', [UserController:: class, 'profileUpdate']);

Route::get('change-password', [UserController::class, 'showChangePassword'])
                ->name('change-password');

Route::post('change-password', [UserController::class, 'changePassword']);

Route:: get('monthly-feedback', [FeedbackController:: class, 'showMonthlyFeedback'])
                ->name('monthly-feedback');

Route:: post('monthly-feedback', [FeedbackController:: class, 'monthlyFeedback']);

Route:: get('practice', [FeedbackController:: class, 'create'])
                ->name('practice');                

Route:: post('practice', [FeedbackController:: class, 'store']);
require __DIR__.'/auth.php';
