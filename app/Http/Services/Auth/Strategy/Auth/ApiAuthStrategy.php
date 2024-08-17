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
            $token = $user->createToken($user->username)->plainTextToken;
            return response()->json([
                'Token' => $token,
                'User' => new AuthResource($user),
            ]);
        }
        throw new ApiAuthException('The username or password is incorrect.');
    }


    /**
     * @throws ApiAuthException
     */
    public function register($data): JsonResponse
    {
        if ($data){
            return response()->json([
                'User' => new AuthResource($data),
            ]);
        }
        throw new ApiAuthException();
    }


    /**
     * @throws ApiAuthException
     */
    public function delete($user): JsonResponse
    {
        if ($user){
            return response()->json(['message' => 'User deleted successfully']);
        }
        throw new ApiAuthException();
    }
}
