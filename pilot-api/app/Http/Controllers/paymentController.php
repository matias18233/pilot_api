<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_number' => 'required|string|exists:credit_cards,card_number',
            'amount' => 'required|numeric|min:0',
            'installments' => 'required|integer|min:1|max:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $creditCard = CreditCard::where('card_number', $request->card_number)->first();

        if (!$creditCard) {
            return response()->json([
                'error' => 'Card not found.'
            ], 404);
        }

        $amount = $request->amount;
        $installments = $request->installments;

        if ($installments > 1) {
            $percentIncrease = ($installments - 1) * 3;
            $finalAmount = $amount + ($amount * ($percentIncrease / 100));
        } else {
            $finalAmount = $amount;
        }

        $payment = new Payment();
        $payment->card_number = $request->card_number;
        $payment->amount = $amount;
        $payment->installments = $installments;
        $payment->final_amount = $finalAmount;
        $payment->save();

        return response()->json([
            'card_number' => $payment->card_number,
            'amount' => $payment->amount,
            'installments' => $payment->installments,
            'final_amount' => number_format($payment->final_amount, 2),
            'message' => 'Payment processed and saved successfully.'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
