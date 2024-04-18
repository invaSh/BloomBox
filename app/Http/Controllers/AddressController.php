<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index($userId)
    {
        $addresses = Address::where('user_id', $userId)->get();

        return view("/User/Address/details", compact("addresses"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required|numeric|digits:5'
        ]);

        $validator->setCustomMessages([
            'street.required' => 'Street',
            'city.required' => 'City',
            'state.required' => 'State',
            'country.required' => 'Country',
            'zip.required' => 'Zip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $address = Address::create([
            "user_id" => $user->id,
            "street" => $request->street,
            "city" => $request->city,
            "state" => $request->input("state"),
            "country" => $request->input("country"),
            "zip" => $request->zip
        ]);

        if (!$address) {
            return redirect()->back()->with("addressError", "Error trying to add address. Try again.");
        }
        return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());

        return redirect()->back()->with('success', 'Address updated successfully.');
    }


    public function destroy($id)
    {
        $address = Address::findOrFail($id);

        if (Auth::id() != $address->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $address->user_id = null;
        $address->save();

        return redirect()->back()->with('success', 'Address has been successfully deleted.');
    }
}
