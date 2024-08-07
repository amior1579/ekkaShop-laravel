<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Services\AuthService;
use App\Http\Services\ImageService;

class AuthController extends Controller
{
    protected $authService;
    protected $imageService;
    public function __construct(
        AuthService $authService,
        ImageService $imageService,
    )
    {
        $this->authService = $authService;
        $this->imageService = $imageService;
    }

    public function user_register(registerRequest $request)
    {
        $validatedData = $request->validated();
        $data = $this->imageService->profileUser($validatedData);
        $this->authService->register($data);
        return redirect('/')->with('success', 'User registered successfully.');

    }

    public function user_login(loginRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->authService->login($validatedData);
        if ($user) {
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials'])->withInput();
        }
    }
}
