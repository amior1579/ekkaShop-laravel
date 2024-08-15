<?php
namespace App\Http\Services\Dashboard\Strategy;
//use App\Http\Services\Strategy\Auth\AuthService;
use App\Http\Services\Dashboard\Strategy\BaseDashboardStrategy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class WebDashboardStrategy extends BaseDashboardStrategy
{

    public function getAllUsers($AllUsers)
    {
        if ($AllUsers) {
            return view('dashboard.layouts.content.users.users_list',compact('AllUsers'));
        }
        return back()->withErrors(['loginError' => 'The username or password is incorrect.',]);
    }
//    public function register($data): RedirectResponse
//    {
//        return redirect('/login')->with('success', 'User registered successfully.');
//    }
//
//
//    public function delete($user): RedirectResponse
//    {
//        if ($user) {
//            return back()->with('message', 'User deleted successful');
//        }
//        return back()->with('message', 'User deletion failed');
//    }
}
