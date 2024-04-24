<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $user)
    {
        return User::create([
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'password' => $user['password'],
        ]);;
    }

    public function login($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            
                return true;

        }else false;
    }

}