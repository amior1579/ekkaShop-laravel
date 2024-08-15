<?php
namespace App\Http\Services\Dashboard\Strategy;

use App\Http\Resources\AuthResource;
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
//
//
//    /**
//     * @throws ApiAuthException
//     */
//    public function register($data): JsonResponse
//    {
//        if ($data){
//            return response()->json([
//                'User' => new AuthResource($data),
//            ]);
//        }
//        throw new ApiAuthException();
//    }
//
//
//    /**
//     * @throws ApiAuthException
//     */
//    public function delete($user): JsonResponse
//    {
//        if ($user){
//            return response()->json(['message' => 'User deleted successfully']);
//        }
//        throw new ApiAuthException();
//    }
}
