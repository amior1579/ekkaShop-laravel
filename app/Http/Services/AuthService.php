<?php

namespace App\Http\Services;

use App\Repositories\AuthRepository;

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

}
