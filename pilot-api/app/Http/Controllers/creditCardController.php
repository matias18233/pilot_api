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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_id' => 'required|string|unique:credit_cards',
            'bank_name' => 'required|string|max:255',
            'card_number' => 'required',
            'credit_limit' => 'required|numeric|min:0',
            'cardholder_dni' => 'required|digits:8',
            'cardholder_first_name' => 'required|string|max:255',
            'cardholder_last_name' => 'required|string|max:255',
            'card_type' => 'required|in:visa,amex',
        ]);
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
