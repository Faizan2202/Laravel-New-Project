<?php

namespace App\Repository;

use App\Repository\Interface\AuthenticationRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    public $user;
    function __construct(User $user){
        $this->user = $user;
    }

    public function register(array $data){
        return $this->user::create($data);
    }

    public function login(array $credentials){
        return Auth::attempt($credentials);
    }

    public function logout(){
        return Auth::logout();
    }

}
?>