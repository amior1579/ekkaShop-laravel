<?php
namespace App\Http\Services\Dashboard\Strategy;
use App\Http\Services\Auth\Strategy\Auth\AuthStrategyInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

abstract class BaseDashboardStrategy implements DashboardStrategyInterface {
//    protected function attemptLogin(array $data): User|null
//    {
//        if (Auth::attempt($data)){
//            return Auth::user();
//        }
//        return null;
//    }
//    abstract public function login(array $data);

}
