<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\OrganizationalSubscriptionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\ChatMessagesController;

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
    return view('index');
});

Route::get('/contact-sales', function () {
    return view('contact-sales');
})->name('contact-sales');

Route::get('/report-form', function () {
    return view('report-form');
});

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/payment-portal', function () {
    return view('payment-portal');
})->name('payment-portal');

Route::get('/terms-and-condition', function () {
    return view('terms-and-condition');
})->name('terms-and-condition');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('dashboard');

Route::get('community', [CommunityController::class, 'create'])
                ->name('community');

Route::post('community/{community}/add', [CommunityController::class, 'addCommunity'])
->name('addCommunity');

Route::post('community/{community}/remove', [CommunityController::class, 'removeCommunity'])
->name('removeCommunity');

Route::post('community', [CommunityController::class, 'store']);

Route::get('/community-list', [CommunityController::class, 'index'])->name('community-list');

Route::get('update-user', [UserController:: class, 'create'])
                ->name('update-user');

Route::post('update-user', [UserController:: class, 'profileUpdate']);

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

Route:: get('proxy-subscription', [SubscriptionController:: class, 'create'])
                ->name('proxy-subscription');

Route:: get('gcash-payment', [SubscriptionController:: class, 'getPayment'])
                ->name('gcash-payment');

Route:: post('gcash-payment', [SubscriptionController:: class, 'postPayment']);

Route::group(['middleware' => ['App\Http\Middleware\MustBeAdmin']], function () {
//     //admin routes

    Route::get('admin/subscriptions', [AdminController:: class, 'getAdminPanel'])->name('admin/subscriptions');

    Route::post('admin/subscriptions', [AdminController:: class, 'verifySubscription']);

    Route::get('admin/community', [AdminController:: class, 'indexCommunity'])
                ->name('admin/community');


    Route::post('admin/community/create', [AdminController:: class, 'storeCommunity']);

    Route::get('admin/community/create', [AdminController:: class, 'createCommunity'])
                ->name('admin/community/create');

    Route::post('admin/community/{community}/delete', [AdminController:: class, 'destroyCommunity'])
                ->name('admin/community/{community}/delete');

    Route::put('admin/community/{community}/edit', [AdminController:: class, 'updateCommunity']);

    Route::get('admin/community/{community}/edit', [AdminController:: class, 'editCommunity'])
                ->name('admin/community/{community}/edit');

    Route::get('admin/feedbacks', [AdminController:: class, 'indexFeedback'])->name('admin/feedbacks');
});

Route::get('/chat', [ChatsController::class, 'index']);

// Route::get('/chat/{id}', [ChatMessagesController::class, 'communityChat'])->name('communityChat');

Route::get('/messages', [ChatsController::class, 'fetchMessages']);

// Route::get('/chatmessages', [ChatMessagesController::class, 'fetchChatMessages']);

Route::post('/messages', [ChatsController::class, 'sendMessage']);

// Route::post('/chatmessages', [ChatMessagesController::class, 'sendChatMessage']);

Route::post('/commend/{badgeNumber}/{userId}', [ChatsController::class, 'commendUser']);

Route::post('/report/{userId}', [ChatsController::class, 'reportUser']);

require __DIR__.'/auth.php';
