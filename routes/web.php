<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SubscriptionsController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'role:user'])->group(function () {

// });

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.login.submit');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware(['auth', 'role:admin'])->group(function () {

        Route::get('/admindashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/subscriptions', [SubscriptionsController::class, 'index'])
            ->name('admin.subscriptions');

        Route::post('/subscriptions', [SubscriptionsController::class, 'store'])
            ->name('admin.subscriptions.store');

        Route::put('/subscriptions/{subscription}', [SubscriptionsController::class, 'update'])
            ->name('admin.subscriptions.update');

        Route::delete('/subscriptions/{subscription}', [SubscriptionsController::class, 'destroy'])
            ->name('admin.subscriptions.delete');
    });

});
