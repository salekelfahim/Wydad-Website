<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use App\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository) {
        
        $this->authRepository = $authRepository;
    }

    public function register(array $user)
    {   
        return $this->authRepository->register($user);
    }

    public function login($email, $password)
    {
        return $this->authRepository->login($email, $password);
    }

    public function logout()
    {
        return Auth::logout();
    }


}