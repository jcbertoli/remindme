<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebhookController;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return Auth::check() ? redirect()->to('dashboard') : redirect()->to('login');
});

Route::get('/login', [AuthController::class, 'getLoginPage'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/changePassword', [DashboardController::class, 'changePassword'])->name('dashboard.changePassword');
    Route::put('/changePassword', [UserController::class, 'changePassword'])->name('user.changePassword');

    Route::middleware('userMustChangePassword')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::post('/createReminder', [ReminderController::class, 'create'])->name('createReminder');
        Route::delete('/deleteReminder', [ReminderController::class, 'delete'])->name('deleteReminder');

        Route::get('/dashboard/webhooks', [WebhookController::class, 'index'])->name('webhook.index');
        Route::post('/createWebhook', [WebhookController::class, 'create'])->name('createWebhook');

        Route::middleware('isUserAdmin')->group(function () {
            Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.index');

            Route::post('/dashboard/admin/user/create', [AdminController::class, 'createUser'])->name('admin.createUser');
            Route::get('/dashboard/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
            Route::put('/dashboard/admin/user/update', [AdminController::class, 'updateUser'])->name('admin.updateUser');
            Route::delete('/dashboard/admin/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

            Route::get('/dashboard/admin/user/{id}/webhooks', [AdminController::class, 'listUserWebhooks'])->name('admin.listUserWebhooks');
        });
    });
});
