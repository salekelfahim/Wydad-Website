<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ShowForm()
    {
        return view('auth');
    }

    
    public function Register(RegisterRequest $request)
    {

        User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        return back()->with('success', 'Account Created Successfully! Please Sign In.');
    }




    public function login(RegisterRequest $request)
    {
        $donnerUser = $request->only('email', 'password');
        if (Auth::attempt($donnerUser)) {
            
                return redirect()->route('welcome');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth');
    }
}
