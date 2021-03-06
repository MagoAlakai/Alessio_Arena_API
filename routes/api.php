<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Routes de JWT integradas en Routes de BREEZE para autenticación

Route::post('/register', [ RegisteredUserController::class, 'store' ]);

Route::post('/login', [ AuthenticatedSessionController::class, 'store' ]);

Route::post('/refresh-token', [AuthenticatedSessionController::class, 'refreshToken']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->middleware('jwt.verify')
            ->name('logout');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
            ->name('password.update');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['auth', 'throttle:6,1'])
            ->name('verification.send');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
            ->middleware('auth');

Route::get('/user/{email}', [UserController::class, 'getUser']);


//CRUD de eventos

Route::get('/eventos', [EventosController::class, 'index']);

Route::get('/eventos/{id}', [EventosController::class, 'show'])
            ->middleware('jwt.verify');

Route::post('/eventos/create', [EventosController::class, 'store'])
            ->middleware('jwt.verify');

Route::put('/eventos/update/{id}', [EventosController::class, 'update'])
            ->middleware('jwt.verify');

Route::delete('/eventos/delete/{id}', [EventosController::class, 'delete'])
            ->middleware('jwt.verify');


