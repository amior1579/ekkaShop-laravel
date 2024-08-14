<?php
namespace App\Http\Services\Auth\Strategy\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

abstract class BaseAuthStrategy implements AuthStrategyInterface{
    protected function attemptLogin(array $data): User|null
    {
        if (Auth::attempt($data)){
            return Auth::user();
        }
        return null;
    }
    abstract public function login(array $data);

}
