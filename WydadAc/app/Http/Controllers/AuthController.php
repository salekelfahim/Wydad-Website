<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryInterface;
use App\Services\authService;
use App\Services\AuthServiceInterface;
use Dotenv\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $authServiceinterface;

    public function __construct(AuthServiceInterface $authServiceinterface)
    {
        $this->authServiceinterface = $authServiceinterface;
    }


    public function ShowForm()
    {
        return view('auth');
    }

    
    public function Register(RegisterRequest $request)
    {
        $user = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        $create = $this->authServiceinterface->register($user);

        if($create){

            return back()->with('success', 'Account Created Successfully! Please Sign In.');
        }

        return back()->with('error', 'Account Created Unsuccessfully! Please Try Again.');

    }



    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = $this->authServiceinterface->login($email,$password);

        if ($user){
            
            return redirect()->route('index');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
