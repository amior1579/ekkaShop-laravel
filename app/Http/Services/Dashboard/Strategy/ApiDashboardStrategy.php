<?php
namespace App\Http\Services\Dashboard\Strategy;

use App\Http\Requests\Dashboard\AddUserRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\Dashboard\AddUserResource;
use App\Http\Services\Dashboard\Strategy\BaseDashboardStrategy;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ApiAuthException;

class ApiDashboardStrategy extends BaseDashboardStrategy
{

    /**
     * @throws ApiAuthException
     */
    public function getAllUsers($data): JsonResponse
    {
        if ($data){
            return response()->json([
                'Users' => $data,
            ]);
        }
        throw new ApiAuthException();
    }
    public function addUser($data): JsonResponse
    {
        if ($data){
            return response()->json([
                'Users' => new AddUserResource($data),
            ]);
        }
        throw new ApiAuthException();
    }

    /**
     * @throw ApiAuthException
     */
    public function deleteUser_str($user): JsonResponse
    {
        if($user){
            return response()->json([
                'message' => "User deleted successfully",
            ]);
        }
        throw new ApiAuthException();
    }

    /**
     * @throws ApiAuthException
     */
    public function AuthUser($user): JsonResponse
    {
        if ($user){
            return response()->json(['message' => $user]);
        }
        throw new ApiAuthException();
    }
    /**
     * @throws ApiAuthException
     */
    public function updateUser_str($user): JsonResponse
    {
        if ($user){
            return response()->json([
                'User' => 'updated successfully',
            ]);
        }
        throw new ApiAuthException();
    }
//
//
}
