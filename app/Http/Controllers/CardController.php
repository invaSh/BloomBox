<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index($userId)
    {
        $cards = Card::where('user_id', $userId)->get();

        return view("/User/Card/details", compact("cards"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required',
            'expiration_date' => 'required',
            'cvc' => 'required',
            'holder' => 'required',
        ]);

        $validator->setCustomMessages([
            'number.required' => 'Card number',
            'expiration_date.required' => 'Card Expiration date',
            'cvc.required' => 'CVC',
            'holder.required' => 'Card holder',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $card = Card::create([
            "number" => $request->number,
            "expiration_date" => $request->expiration_date,
            "cvc" => $request->cvc,
            "holder" => $request->holder,
            "user_id" => $user->id,
        ]);

        if (!$card) {
            return redirect()->back()->with("addressError", "Error trying to add card. Try again.");
        }

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $card = Card::findOrFail($id);
        $card->update($request->all());

        return redirect()->back()->with('success', 'Card updated successfully.');
    }


    public function destroy($id)
    {
        $card = Card::findOrFail($id);

        if (Auth::id() != $card->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $card->user_id = null;
        $card->save();

        return redirect()->back()->with('success', 'Card has been successfully deleted.');
    }
}
