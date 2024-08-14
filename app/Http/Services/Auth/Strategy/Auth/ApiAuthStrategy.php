<?php
namespace App\Http\Services\Auth\Strategy\Auth;

use App\Http\Resources\AuthResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ApiAuthException;

class ApiAuthStrategy extends BaseAuthStrategy
{

    /**
     * @throws ApiAuthException
     */
    public function login(array $data): JsonResponse
    {
        if ($user = $this->attemptLogin($data)){
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'Token' => $token,
                'User' => new AuthResource($user),
            ]);
        }
        throw new ApiAuthException('The username or password is incorrect.');
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
