<?php
namespace App\Http\Services\Auth\Strategy\Auth;

//use App\Http\Services\Strategy\Auth\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class WebAuthStrategy extends BaseAuthStrategy
{

    public function login(array $data): RedirectResponse
    {
        if ($this->attemptLogin($data)) {
            return redirect()->intended('');
        }
        return back()->withErrors(['loginError' => 'The username or password is incorrect.',]);
    }
    public function register($data): RedirectResponse
    {
        return redirect('/login')->with('success', 'User registered successfully.');
    }


    public function delete($user): RedirectResponse
    {
        if ($user) {
            return back()->with('message', 'User deleted successful');
        }
        return back()->with('message', 'User deletion failed');
    }
}
