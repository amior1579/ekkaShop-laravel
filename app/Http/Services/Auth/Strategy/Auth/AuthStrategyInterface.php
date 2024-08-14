<?php
namespace App\Http\Services\Auth\Strategy\Auth;
interface AuthStrategyInterface{
    public function login(array $data);
    public function register(array $data);
    public function delete(int $userId);
}
