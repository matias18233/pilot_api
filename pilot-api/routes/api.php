<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreditCardController;

Route::post('credit-cards', [CreditCardController::class, 'store']);