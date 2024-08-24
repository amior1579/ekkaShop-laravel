<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Services\Auth\AuthService;
use App\Http\Services\Auth\Strategy\Auth\WebAuthStrategy;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class WebAuthController extends Controller
{
    protected AuthService $authService;
    public function __construct(Guard $auth){
        $this->authService = new AuthService(
            new WebAuthStrategy(),
            new ImageService(),
            new AuthRepository($auth)
        );

    }
    public function user_login(loginRequest $request){
        $validatedData = $request->validated();
        return $this->authService->login($validatedData);
    }

    public function user_register(registerRequest $request){
        $validatedData = $request->validated();
        return $this->authService->register($validatedData);
    }

    public function user_delete(Request $request){
        return $this->authService->delete($request->user_id);
    }
}
