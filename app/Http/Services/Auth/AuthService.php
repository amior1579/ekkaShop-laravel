<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Auth\Strategy\Auth\AuthStrategyInterface;
use App\Http\Services\Auth\Strategy\Auth\WebDashboardStrategy;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService{
//    protected $authRepository;
    protected AuthStrategyInterface $strategy;
    protected ImageService $imageService;
    protected AuthRepository $authRepository;


    public function __construct(
        AuthStrategyInterface $strategy,
        ImageService $imageService,
        AuthRepository $authRepository)
    {
        $this->strategy = $strategy;
        $this->imageService = $imageService;
        $this->authRepository = $authRepository;
    }
    public function login(array $data){
        return $this->strategy->login($data);
    }

    public function register(array $data){
        $newData = $this->imageService->profileUser($data);
        $user = $this->authRepository->createUser($newData);
        return $this->strategy->register($user);
    }
    public function delete(int $user_id){
        $user = $this->authRepository->deleteUser($user_id);
        return $this->strategy->delete($user);
    }

}
