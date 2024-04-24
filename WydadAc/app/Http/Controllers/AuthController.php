<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Dotenv\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $userServiceinterface;

    public function __construct(UserServiceInterface $userServiceinterface)
    {
        $this->userServiceinterface = $userServiceinterface;
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

        $create = $this->userServiceinterface->register($user);

        if($create){

            return back()->with('success', 'Account Created Successfully! Please Sign In.');
        }

        return back()->with('error', 'Account Created Unsuccessfully! Please Try Again.');

    }



    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = $this->userServiceinterface->login($email,$password);

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
