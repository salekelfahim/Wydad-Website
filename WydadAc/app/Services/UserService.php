<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        
        $this->userRepository = $userRepository;
    }

    public function register(array $user)
    {   
        return $this->userRepository->register($user);
    }

    public function login($email, $password)
    {
        return $this->userRepository->login($email, $password);
    }

    public function logout()
    {
        return Auth::logout();
    }


}