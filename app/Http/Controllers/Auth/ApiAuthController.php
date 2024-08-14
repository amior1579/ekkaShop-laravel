<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Services\Auth\AuthService;
use App\Http\Services\Auth\Strategy\Auth\ApiAuthStrategy;
use App\Http\Services\ImageService;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    protected AuthService $authService;
    public function __construct(){
        $this->authService = new AuthService(
            new ApiAuthStrategy(),
            new ImageService(),
            new AuthRepository()
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
