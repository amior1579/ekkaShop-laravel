<?php
namespace App\Http\Services\Auth\Strategy\Auth;
//use App\Http\Services\Strategy\Auth\AuthService;
use Illuminate\Support\Facades\Auth;

class ApiAuthStrategy extends BaseAuthStrategy
{

    public function login(array $data)
    {

        if ($user = $this->attemptLogin($data)) {
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'User' => $user,
            ]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function register(array $data)
    {
    $this->authService->register($data);
    return response()->json(['message' => 'User registered successfully.'], 201);
    }


    public function delete(int $userId)
    {
    $this->authService->delete($userId);
    return response()->json(['message' => 'User deleted successfully.'], 200);
    }
}
