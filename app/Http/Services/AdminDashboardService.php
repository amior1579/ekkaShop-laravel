<?php
namespace App\Http\Services;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

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
    public function getUser()
    {
        return Auth::user();
    }
    public function userUpdate($data, $user_id)
    {
        return $this->authRepository->UpdateUser($data, $user_id);

    }

}
