<?php
namespace App\Http\Services;
use App\Repositories\AuthRepository;

class AdminDashboardService{

    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function getAllUsers()
    {
        return $this->authRepository->allUser();
    }
    public function addUser($data)
    {
        return $this->authRepository->createUser($data);
    }

}
