<?php
namespace App\Http\Services\Dashboard\Strategy;
//use App\Http\Services\Strategy\Auth\AuthService;
use App\Http\Services\Dashboard\Strategy\BaseDashboardStrategy;
use http\Client\Curl\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class WebDashboardStrategy extends BaseDashboardStrategy
{

    public function getAllUsers($AllUsers): View|RedirectResponse
    {
        if ($AllUsers) {
            return view('dashboard.layouts.content.users.users_list',compact('AllUsers'));
        }
        return back()->withErrors(['loginError' => 'The username or password is incorrect.',]);
    }
    public function AuthUser($user,$permissions): View|RedirectResponse
    {
        if ($user){
            return view('dashboard.layouts.content.users.users_profile',compact('user','permissions'));
        }
        return redirect()->route('login-form');
    }
    public function addUser($user): RedirectResponse
    {
        if ($user) {
            return back()->with('message', 'User created successfully');
        }
        return back()->with('message', 'User not created');
    }

    public function deleteUser_str($user): RedirectResponse
    {
        if ($user) {
            return back()->with('message', 'User deleted successfully');
        }
        return back()->with('message', 'The user was not deleted');
    }
}
