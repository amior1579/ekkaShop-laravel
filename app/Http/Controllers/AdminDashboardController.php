<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminDashboardService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected $adminDashService;
    public function __construct(AdminDashboardService $adminDashService){
        $this->adminDashService = $adminDashService;
    }

    public function users_list(){
        $AllUsers = $this->adminDashService->getAllUsers();
        return view('dashboard.adminDashboard.layouts.content.users.users_list',compact('AllUsers'));
    }
}
