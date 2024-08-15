<?php
namespace App\Http\Services\Dashboard;

use App\Http\Services\Dashboard\Strategy\DashboardStrategyInterface;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;

class DashboardService{

    protected DashboardStrategyInterface $strategy;
    protected ImageService $imageService;
    protected AuthRepository $authRepository;
    public function __construct(
        DashboardStrategyInterface $strategy,
        ImageService $imageService,
        AuthRepository $authRepository)
    {
        $this->strategy = $strategy;
        $this->imageService = $imageService;
        $this->authRepository = $authRepository;
    }

    public function getAllUsers()
    {
        $users = $this->authRepository->allUser();
        return $this->strategy->getAllUsers($users);
    }
//    public function addUser($data)
//    {
//        return $this->authRepository->createUser($data);
//    }
//    public function getUser()
//    {
//        return Auth::user();
//    }
//    public function userUpdate($data, $user_id)
//    {
//        return $this->authRepository->UpdateUser($data, $user_id);
//
//    }
}
