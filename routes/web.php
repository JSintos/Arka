<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\OrganizationalSubscriptionController;
use App\Http\Controllers\AdminController;


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

Route:: get('subscription', [SubscriptionController:: class, 'create'])
                ->name('subscription');

Route:: get('organizational-subscription', [OrganizationalSubscriptionController:: class, 'create'])
                ->name('organizational-subscription');

Route:: post('organizational-subscription', [OrganizationalSubscriptionController:: class, 'store']);

Route:: get('gcash-payment', [SubscriptionController:: class, 'getPayment'])
                ->name('gcash-payment');

Route:: post('gcash-payment', [SubscriptionController:: class, 'postPayment']);

Route::get('/admin/subscriptions', [AdminController:: class, 'getAdminPanel'])
                ->name('/admin/subscriptions');

Route::post('/admin/subscriptions', [AdminController:: class, 'verifySubscription']);

Route::get('/admin/community', [AdminController:: class, 'indexCommunity'])
                ->name('/admin/community');

Route::get('/admin/community/{id}', [AdminController:: class, 'showCommunity'])
                ->name('/admin/community/{id}');

Route::post('/admin/community/create', [AdminController:: class, 'storeCommunity']);

Route::get('/admin/community/create', [AdminController:: class, 'createCommunity'])
                ->name('/admin/community/create');
                

Route::get('/admin/community/{id}/delete', [AdminController:: class, 'destroyCommunity'])
                ->name('/admin/community/{id}/delete');

Route::post('/admin/community/edit', [AdminController:: class, 'updateCommunity']);

Route::get('/admin/community/{id}/edit', [AdminController:: class, 'editCommunity'])
                ->name('/admin/community/{id}/edit');





require __DIR__.'/auth.php';
