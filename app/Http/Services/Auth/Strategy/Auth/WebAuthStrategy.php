<?php
namespace App\Http\Services\Auth\Strategy\Auth;

//use App\Http\Services\Strategy\Auth\AuthService;
use Illuminate\Support\Facades\Auth;

class WebAuthStrategy extends BaseAuthStrategy
{

    public function login(array $data)
    {
        if ($this->attemptLogin($data)) {
            return redirect()->intended('');
        }
        return back()->withErrors(['loginError' => 'The username or password is incorrect.',]);
    }
    public function register(array $data)
    {
//        return $this->authService->register($data);
    }


    public function delete(int $userId)
    {
//        return $this->authService->delete($userId);
    }
}
