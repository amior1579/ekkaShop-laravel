<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\DashboardService;
use App\Http\Services\Dashboard\Strategy\ApiDashboardStrategy;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;

class ApiDashboardController extends Controller
{
    protected DashboardService $dashboardService;

    public function __construct(){
        $this->dashboardService = new DashboardService(
            new ApiDashboardStrategy(),
            new ImageService(),
            new AuthRepository()
        );
    }

//    public function home(){}

    public function users_list(){
        return $this->dashboardService->getAllUsers();
    }

//    public function addUser(AddUserRequest $request){
//        $validatedData = $request->validated();
//        $data = $this->imageService->profileUser($validatedData);
//        $this->adminDashService->addUser($data);
//        return redirect()->back();
//    }
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
