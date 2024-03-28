<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login(){
        return view('login');
    } 

    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))->with("success", "Login successful!");
        }

        return redirect(route('login'))->with("error", "Login details are not valid!");
    }
    
    public function register(){
        return view('register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|email|unique:users',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data ['name'] = $request->name;
        $data ['username'] = $request->username;
        $data ['email'] = $request->email;
        $data ['password'] = Hash::make($request->password);

        dd($request->all());

        $user = User::create($data);

        if(!$user){
            return redirect(route('register'))->with("error", "There was an error creating your account. Please check your credentials!");
        }

        return redirect(route('login'))->with("success", "Registration successful!");

    }
}
