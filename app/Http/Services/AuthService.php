<?php

namespace App\Http\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService{
    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data)
    {
        return $this->authRepository->createUser($data);
    }
    public function login(array $data)
    {
        if (Auth::attempt($data)) {
            return Auth::user();
        }
        return null;
    }

}
