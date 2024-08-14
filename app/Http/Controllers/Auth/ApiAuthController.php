<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Http\Services\Auth\AuthService;
use App\Http\Services\Auth\Strategy\Auth\ApiAuthStrategy;
use App\Http\Services\Auth\Strategy\Auth\WebAuthStrategy;
use App\Http\Services\ImageService;
use Illuminate\Http\Request;

class ApiAuthController extends Controller{
    protected $authService;
    protected $imageService;
    public function __construct(ImageService $imageService,){
        $this->imageService = $imageService;
        $this->authService = new AuthService(new ApiAuthStrategy());

    }
    public function user_login(loginRequest $request)
    {
        $validatedData = $request->validated();
        return $this->authService->login($validatedData);

    }

    public function user_register(registerRequest $request)
    {
        $validatedData = $request->validated();
        $data = $this->imageService->profileUser($validatedData);
        $this->authService->register($data);
        return redirect('/login')->with('success', 'User registered successfully.');

    }

    public function user_delete(Request $request)
    {
        return $this->authService->delete($request->user_id);
    }
}
