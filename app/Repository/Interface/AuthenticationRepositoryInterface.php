<?php

namespace App\Repository\Interface;

interface AuthenticationRepositoryInterface
{
    public function register(array $data);
    public function login(array $credentials);
    public function logout();
}