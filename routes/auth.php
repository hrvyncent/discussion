<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegistrationControler;
use Illuminate\Support\Facades\Route;

Route::get('login', fn() => inertia('Authentication/Login'))->name('login');
Route::post('login', LoginController::class)->name('authenticate');

Route::get('create-account', fn() => inertia('Authentication/Register'))->name('users.create');
Route::post('create-account', RegistrationControler::class)->name('users.store');