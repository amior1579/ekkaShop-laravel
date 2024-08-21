<?php
namespace App\Http\Services\Dashboard;

use App\Http\Services\Dashboard\Strategy\DashboardStrategyInterface;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

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
    public function AuthUser()
    {
        $user = Auth::user();
        return $this->strategy->AuthUser($user);
    }
    public function addUser($data)
    {
        $newData = $this->imageService->profileUser($data);
        $user = $this->authRepository->createUser($newData);
        return $this->strategy->addUser($user);
    }
    public function deleteUser($userId)
    {
        $user = $this->authRepository->deleteUser_Repo($userId);
        return $this->strategy->deleteUser_str($user);
    }
}
