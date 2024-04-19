<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($userId)
    {
        $user = User::findOrFail($userId);
        return view("/User/Profile/details", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();  

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'bio' => 'nullable|string',
            'imgUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->bio = $request->bio;

        if ($request->hasFile('imgUrl')) {
            if ($user->imgUrl) {
                Storage::delete($user->imgUrl);
            }

            $path = $request->file('imgUrl')->store('product-img', 'public');
            $user->imgUrl = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
