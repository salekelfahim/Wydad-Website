<?php

namespace App\Repositories;


interface AuthRepositoryInterface
{
    public function register(array $user);

    public function login($email, $password);


}