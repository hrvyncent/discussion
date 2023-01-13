<?php

use App\Http\Controllers\Authentication\ForgotPasswordController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\RegistrationControler;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\Authentication\SendEmailVerificationController;
use App\Http\Controllers\Authentication\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', fn() => inertia('Authentication/Login'))->name('login');
    Route::post('login', LoginController::class)->name('authenticate');

    Route::get('create-account', fn() => inertia('Authentication/Register'))->name('users.create');
    Route::post('create-account', RegistrationControler::class)->name('users.store');

    Route::get('forgot-password', fn() => inertia('Authentication/ForgotPassword'))->name('password.request');
    Route::post('forgot-password', ForgotPasswordController::class)->name('password.email');

    Route::get('reset-password/{token}', [ResetPasswordController::class,'edit'])->name('password.reset');
    Route::put('reset-password', [ResetPasswordController::class,'update'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('email-verify', fn() => inertia('Authentication/EmailVerify'))->name('verification.notice');
    Route::get('email-verify/{id}/{hash}', VerifyEmailController::class)->name('verification.verify');
    Route::post('resend-verificaion', SendEmailVerificationController::class)->name('verification.send');

    Route::post('logout', LogoutController::class)->name('logout');
});