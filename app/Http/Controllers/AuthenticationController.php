<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Repository\Interface\AuthenticationRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public $authenticationRepository;

    function __construct(AuthenticationRepositoryInterface $authenticationRepository){
    $this->authenticationRepository = $authenticationRepository;
}


    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        try {
            DB::beginTransaction();
            $validated['password'] = bcrypt($validated['password']);
            $this->authenticationRepository->register($validated);
            DB::commit();
            return back()->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        DB::beginTransaction();
        try{
            if($this->authenticationRepository->login($credentials)){
                DB::commit();
                return view('dashboard')->with('success', 'Login successful!');
            }
        }catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Login error: ' . $e->getMessage());
            return back();
        }
    }

    public function logout(){
        $this->authenticationRepository->logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}