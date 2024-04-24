<?php

namespace App\Services;

interface UserServiceInterface
{
    public function register(array $user);

    public function login($email, $password);

    public function logout();
}