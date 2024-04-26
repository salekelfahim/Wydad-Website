<?php

namespace App\Repositories;


interface UserRepositoryInterface
{
    public function register(array $user);

    public function login($email, $password);


}