<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddUserRequest;
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
            new AuthRepository($auth)
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
//    public function users_profile(){
//        $user = $this->adminDashService->getUser();
//        return view('dashboard.layouts.content.users.users_profile',compact('user'));
//    }
//    public function userUpdate(updateUserRequest $request, $user_id){
//        $validatedData = $request->validated();
//        $data = $this->imageService->profileUser($validatedData);
//        $this->adminDashService->userUpdate($data, $user_id);
//        return redirect()->back();
//    }
}
