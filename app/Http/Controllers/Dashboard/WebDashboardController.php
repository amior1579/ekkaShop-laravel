<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\AddUserRequest;
use App\Http\Requests\AdminDashboard\updateUserRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Services\AdminDashboardService;
use App\Http\Services\ImageService;
use Illuminate\Http\Request;

class WebDashboardController extends Controller
{
    protected $adminDashService;
    protected $imageService;
    public function __construct(
        AdminDashboardService $adminDashService,
        ImageService $imageService,
    )
    {
        $this->adminDashService = $adminDashService;
        $this->imageService = $imageService;
    }

    public function home()
    {

    }
    public function users_list(){
        $AllUsers = $this->adminDashService->getAllUsers();
        return view('dashboard.layouts.content.users.users_list',compact('AllUsers'));
    }

    public function addUser(AddUserRequest $request){
        $validatedData = $request->validated();
        $data = $this->imageService->profileUser($validatedData);
        $this->adminDashService->addUser($data);
        return redirect()->back();
    }
    public function users_profile(){
        $user = $this->adminDashService->getUser();
        return view('dashboard.layouts.content.users.users_profile',compact('user'));
    }
    public function userUpdate(updateUserRequest $request, $user_id){
        $validatedData = $request->validated();
        $data = $this->imageService->profileUser($validatedData);
        $this->adminDashService->userUpdate($data, $user_id);
        return redirect()->back();
    }
}
