<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class creditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditCards = CreditCard::all();

        return response()->json($creditCards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string|max:255',
            'card_number' => 'required',
            'credit_limit' => 'required|numeric|min:0',
            'cardholder_dni' => 'required|digits:8',
            'cardholder_first_name' => 'required|string|max:255',
            'cardholder_last_name' => 'required|string|max:255',
            'card_type' => 'required|in:visa,amex',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $creditCard = new CreditCard();
        
        $creditCard->bank_name = $request->bank_name;
        $creditCard->card_number = $request->card_number;
        $creditCard->credit_limit = $request->credit_limit;
        $creditCard->cardholder_dni = $request->cardholder_dni;
        $creditCard->cardholder_first_name = $request->cardholder_first_name;
        $creditCard->cardholder_last_name = $request->cardholder_last_name;
        $creditCard->card_type = $request->card_type;

        $creditCard->save();

        return response()->json([
            'message' => 'Tarjeta de crédito almacenada correctamente!',
            'data' => $creditCard
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditCard $creditCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CreditCard $creditCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditCard $creditCard)
    {
        //
    }
}
