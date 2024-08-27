<?php
namespace App\Http\Services\Dashboard;

use App\Http\Services\Dashboard\Strategy\DashboardStrategyInterface;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;
use App\Repositories\UserPermissionRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class DashboardService{

    protected DashboardStrategyInterface $strategy;
    protected ImageService $imageService;
    protected AuthRepository $authRepository;
    protected UserPermissionRepository $userPermissionRepository;
    public function __construct(
        DashboardStrategyInterface $strategy,
        ImageService $imageService,
        AuthRepository $authRepository,
        UserPermissionRepository $userPermissionRepository,
        )
    {
        $this->strategy = $strategy;
        $this->imageService = $imageService;
        $this->authRepository = $authRepository;
        $this->userPermissionRepository = $userPermissionRepository;
    }

    public function getAllUsers()
    {
        $users = $this->authRepository->allUsers();
        return $this->strategy->getAllUsers($users);
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
//    ------------ User Profile ------------
    public function getAuthUser()
    {
        $permissions = $this->authRepository->getPermissionsUser();
        return $this->strategy->AuthUser(Auth::user(),$permissions);
    }
    public function updateUser($data,$userId)
    {
        $newData = $this->imageService->updateProfileUser($data);
        $user = $this->authRepository->updateUser_Repo($newData, $userId);
        return $this->strategy->updateUser_str($user);
    }
    public function updatePermissions($data,$userId)
    {
        $this->userPermissionRepository->updatePermissions_Repo($data, $userId);
        return $this->strategy->updatePermissions_str(true);
    }

}
