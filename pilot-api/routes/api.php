<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\PaymentController;

Route::post('/credit-cards', [CreditCardController::class, 'store']);

Route::post('/payments', [PaymentController::class, 'store']);