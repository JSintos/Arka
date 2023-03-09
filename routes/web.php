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
use App\Http\Controllers\ReportController;

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

Route::get('/UsersList', function () {
    return view('UsersList');
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

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

// Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('community', [CommunityController::class, 'create'])
                    ->name('community');

    Route::post('community/{community}/add', [CommunityController::class, 'addCommunity'])
                    ->name('addCommunity');

    Route::post('community/{community}/remove', [CommunityController::class, 'removeCommunity'])
                    ->name('removeCommunity');

    Route::post('community', [CommunityController::class, 'store']);

    Route::get('/community-list', [CommunityController::class, 'index'])
                    ->name('community-list');

    Route::post('community/{community}/add', [CommunityController::class, 'addCommunity'])
                    ->name('addCommunity');

    Route::post('community/{community}/remove', [CommunityController::class, 'removeCommunity'])
                    ->name('removeCommunity');

    Route::get('update-user', [UserController:: class, 'create'])
                    ->name('update-user');

    Route::post('update-user', [UserController:: class, 'profileUpdate']);

    Route::get('change-password', [UserController::class, 'showChangePassword'])
                    ->name('change-password');

    Route::post('change-password', [UserController::class, 'changePassword']);

    Route::post('store-monthly-feedback', [HomeController::class, 'storeMonthlyFeedback'])
                    ->middleware(['auth'])->name('storeMonthlyFeedback');

    Route::get('subscription', [SubscriptionController:: class, 'create'])
                    ->name('subscription');

    Route::get('organizational-subscription', [OrganizationalSubscriptionController:: class, 'create'])
                    ->name('organizational-subscription');

    Route::post('organizational-subscription', [OrganizationalSubscriptionController:: class, 'store']);

    Route::get('gcash-payment', [SubscriptionController:: class, 'getPayment'])
                    ->name('gcash-payment');

    Route::post('gcash-payment', [SubscriptionController:: class, 'postPayment']);

    Route::get('request-community', [ReportController:: class, 'getRequestCommunity'])
                    ->name('request-community');

    Route::post('request-community', [ReportController:: class, 'postRequestCommunity']);

    Route::get('/chat', [ChatsController::class, 'index']);

    Route::get('/messages', [ChatsController::class, 'fetchMessages']);

    Route::post('/messages', [ChatsController::class, 'sendMessage']);

    Route::post('/commend/{badgeNumber}/{userId}', [ChatsController::class, 'commendUser']);

    Route::get('/report/{userId}/', [ChatsController::class, 'reportUser']);

    Route::post('/report/{userId}/', [ChatsController::class, 'sendReport']);
});

// Superadmin routes
Route::group(['middleware' => ['App\Http\Middleware\MustBeAdmin']], function () {
    Route::get('admin/subscriptions', [AdminController:: class, 'getAdminPanel'])->name('admin/subscriptions');

    Route::post('admin/subscriptions', [AdminController:: class, 'verifySubscription']);

    Route::get('admin/community', [AdminController:: class, 'indexCommunity'])
                ->name('admin/community');

    Route::post('admin/community', [AdminController:: class, 'createPetitionedCommunity']);

    Route::get('admin/community/create', [AdminController:: class, 'createCommunity'])
                ->name('admin/community/create');

    Route::post('admin/community/create', [AdminController:: class, 'storeCommunity']);

    Route::post('admin/community/delete', [AdminController:: class, 'destroyCommunity'])
                ->name('admin/community/delete');

    Route::get('admin/community/{community}/edit', [AdminController:: class, 'editCommunity'])
                ->name('admin/community/{community}/edit');

    Route::put('admin/community/{community}/edit', [AdminController:: class, 'updateCommunity']);

    Route::get('admin/reports', [AdminController:: class, 'getReports'])->name('admin/reports');

    Route::post('admin/reports', [AdminController:: class, 'resolveReport']);

    Route::post('admin/reports/ban', [AdminController:: class, 'reportBanUser'])->name('admin/reports/ban');

    Route::get('admin/feedbacks', [AdminController:: class, 'indexFeedback'])->name('admin/feedbacks');

    Route::get('admin/organizational-registration', [AdminController:: class, 'organizationalRegistration'])->name('admin/organizational-registration');

    Route::post('admin/organizational-registration', [AdminController:: class, 'handleOrganizationalRegistration']);
});

// School admin routes
Route::group(['middleware' => ['App\Http\Middleware\MustBeSchoolAdmin']], function () {
    Route::get('/school-admin', [AdminController:: class, 'getSchoolAdminPanel'])->name('school-admin-panel');

    Route::post('/deactivate', [AdminController:: class, 'deactivateStudent'])->name('deactivate');
});

// Route::get('/chat/{id}', [ChatMessagesController::class, 'communityChat'])->name('communityChat');

// Route::get('/chatmessages', [ChatMessagesController::class, 'fetchChatMessages']);

// Route::post('/chatmessages', [ChatMessagesController::class, 'sendChatMessage']);

require __DIR__.'/auth.php';

