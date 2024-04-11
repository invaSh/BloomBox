<?php

namespace App\Http\Controllers;

use App\Models\Role_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function login()
    {

        return view('/user/login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Login successful, welcome!');

            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'employee') {
                return redirect('/admin')->with("success", "Welcome to the admin dashboard!");
            } else {
                return redirect('/')->with("success", "Login successful!");
            }
        }

        return redirect(route('login'))->with("error", "Login details are not valid!");
    }

    public function register()
    {
        return view('User/register');
    }

    public function registerPost(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $customErrors = [];

            if (!empty($customErrors)) {
                return back()->withErrors($customErrors)->withInput();
            } else {
                return back()->with('error', 'Please ensure all required fields are filled out correctly.')->withInput();
            }
        }

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ];


        $user = User::create($data);


        return redirect(route('login'))->with("success", "Registration successful! Please log in!");
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'You have been logged out!');
    }

}
