<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $noUsers = User::count();

        return view("/admin/user/list", compact("users", "noUsers"));
    }


    public function create()
    {
        return view("/admin/user/create");
    }


    public function store(Request $request)
    {
        $request->session()->put('userInput', $request->except(['_token', 'imgUrl']));

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        $validator->setCustomMessages([
            'username.unique' => 'Username already exists. Choose a different username.',
            'email.unique' => 'Email already exists. Choose a different email.',
            'email.email' => 'Email format is not correct.',
            'password.min' => 'Password must be at least 6 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fileName = '';

        if ($request->hasFile('imgUrl')) {
            $fileName = $request->file('imgUrl')->store('product-img', 'public');
        }
        
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'imgUrl' => $fileName,
            'bio' => $request->bio,
            'role' => $request->input('role'),
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'There was an error adding the user. Please try again!')->withInput();
        }

        $request->session()->forget('userInput');
        return redirect()->route('users.list')->with('success', 'User created successfully!');
    }



    public function show($id)
    {
        $user = User::find($id);
        $orders = Order::where("user_id", $id)->get();

        return view('/admin/user/details', compact('user', 'orders'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('/admin/user/edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);
    
        $validator->setCustomMessages([
            'username.unique' => 'Username already exists. Choose a different username.',
            'email.unique' => 'Email already exists. Choose a different email.',
            'email.email' => 'Email format is not correct.',
            'password.min' => 'Password must be at least 6 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $fileName='';

        if ($request->hasFile('imgUrl')) {
            $fileName = $request->file('imgUrl')->store('product-img', 'public');
            $user->imgUrl = $fileName;
        }
    
        $user->update($request->except('imgUrl'));
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            if(!$user->save()){

                return redirect()->route('users.list')->with('error', 'Error updating user!');
            }
        }
    
        return redirect()->route('users.list')->with('success', 'User updated successfully!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $confirmation = $user->delete();

        if(!$confirmation){
            return redirect()->back()->with('error','There was an error deleting the user. Try again.');
        }

        return redirect('/admin/users/list')->with('success','User deleted successfully!');
    }
}
