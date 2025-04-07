<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\PaymentController;

Route::get('/credit-cards', [CreditCardController::class, 'index']);
Route::post('/credit-cards', [CreditCardController::class, 'store']);

Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);