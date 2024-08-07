<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminDashboard\AddUserRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Services\AdminDashboardService;
use App\Http\Services\ImageService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
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

    public function users_list(){
        $AllUsers = $this->adminDashService->getAllUsers();
        return view('dashboard.adminDashboard.layouts.content.users.users_list',compact('AllUsers'));
    }

    public function addUser(AddUserRequest $request){
        $validatedData = $request->validated();
        $data = $this->imageService->profileUser($validatedData);
        $this->adminDashService->addUser($data);
        return redirect()->back();
    }
}
