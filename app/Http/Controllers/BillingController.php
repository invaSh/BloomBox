<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Billing;
use Illuminate\Support\Facades\Validator;

class BillingController extends Controller
{
    
    public function index($userId)
    {
        $billings = Billing::where('user_id', $userId)->get();

        return view("/User/Billing/details", compact("billings"));
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "zip" => "required"
        ]);

        $validator->setCustomMessages([
            "name" => "Name",
            "email" => "Email",
            "phone" => "Phone",
            "address" => "Address",
            "city" => "City",
            "state" => "State",
            "country" => "Country",
            "zip" => "Zip",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = Auth::user();

        $billing = Billing::create([
            "user_id" => $user->id,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->input("state"),
            "country" => $request->input("country"),
            "zip" => $request->zip
        ]);

        if (!$billing) {
            return redirect()->back()->with("addressError", "Error trying to add address. Try again.");
        }

        return redirect()->back();
    }
   
    public function update(Request $request, $id)
    {
        $billing = Billing::findOrFail($id);
        $billing->update($request->all());

        return redirect()->back()->with('success', 'Billing updated successfully.');
    }

   
    public function destroy($id)
    {
        $billing = Billing::findOrFail($id);

        if (Auth::id() != $billing->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $billing->user_id = null;
        $billing->save();

        return redirect()->back()->with('success', 'Billing has been successfully deleted.');
    }
}
