<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Auth\Strategy\Auth\ApiAuthStrategy;
use App\Http\Services\Auth\Strategy\Auth\AuthStrategyInterface;
use App\Http\Services\Auth\Strategy\Auth\WebAuthStrategy;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService{
//    protected $authRepository;
    protected AuthStrategyInterface $strategy;

    public function __construct(
//        AuthRepository  $authRepository,
        AuthStrategyInterface $strategy)
    {
//        $this->authRepository = $authRepository;
        $this->strategy = $strategy;

    }
    public function login(array $data)
    {
        return $this->strategy->login($data);

    }

//    public function register(array $data)
//    {
//        return $this->authRepository->createUser($data);
//    }
//    public function delete($user_id)
//    {
//        if ($this->authRepository->deleteUser($user_id)){
//            return redirect()->back()->withErrors(['message' => 'User deleted successfully']);
//        }
//        return response()->json(['message' => 'User Not found'], 404);
//    }

}
