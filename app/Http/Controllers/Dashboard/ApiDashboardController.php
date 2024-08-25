<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddUserRequest;
use App\Http\Requests\Dashboard\updateUserRequest;
use App\Http\Services\Dashboard\DashboardService;
use App\Http\Services\Dashboard\Strategy\ApiDashboardStrategy;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class ApiDashboardController extends Controller
{
    protected DashboardService $dashboardService;

    public function __construct(Guard $auth){
        $this->dashboardService = new DashboardService(
            new ApiDashboardStrategy(),
            new ImageService(),
            new AuthRepository($auth),
            $auth
        );
    }

//    public function home(){}

    public function users_list(){
        return $this->dashboardService->getAllUsers();
    }

    public function users_list__addUser(AddUserRequest $request){
        $validateData = $request->validated();
        return $this->dashboardService->addUser($validateData);
    }
    public function users_list__deleteUser($userId)
    {
        return $this->dashboardService->deleteUser($userId);
    }

//    --------------- User Profile ---------------
    public function users_profile(){
        return $this->dashboardService->getAuthUser();
    }
    public function user_profile__updateUser(updateUserRequest $request, $userId){
        $validatedData = $request->validated();
        return $this->dashboardService->updateUser($validatedData,$userId);

    }
}
