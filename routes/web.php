<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;

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
Route::get('/index', function () {
    return view('index');
});
Route::get('/contact-sales', function () {
    return view('contact-sales');
});
Route::get('/report-form', function () {
    return view('report-form');
});
Route::get('/subscription', function () {
    return view('subscription');
});
Route::get('/payment-portal', function () {
    return view('payment-portal');
});
Route::get('/terms-and-condition', function () {
    return view('terms-and-condition');
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

Route::get('change-password', [UserController::class, 'showChangePassword'])
                ->name('change-password');

Route::post('change-password', [UserController::class, 'changePassword']);

Route:: get('monthly-feedback', [FeedbackController:: class, 'create'])
                ->name('monthly-feedback');


require __DIR__.'/auth.php';
