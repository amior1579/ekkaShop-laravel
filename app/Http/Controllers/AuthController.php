<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Services\AuthService;
use App\Http\Services\ImageService;
use Illuminate\Http\Request;

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

    public function user_register(AuthRequest $request)
    {
        $validatedData = $request->validated();
        $data = $this->imageService->profileUser($validatedData);
        $this->authService->register($data);
        return redirect('/')->with('success', 'User registered successfully.');

    }
}
