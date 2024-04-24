<?php

namespace App\Services;

interface AuthServiceInterface
{
    public function register(array $user);

    public function login($email, $password);

    public function logout();
}