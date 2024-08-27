<?php
namespace App\Repositories;

/**
 * This layer contains repositories that interact with the database.
 */
use App\Models\User;
use App\Models\Permission;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class UserPermissionRepository
{
    public function __construct()
    {
    }

    /**
     * @param array $permissions
     * @param int $user_id
     * @return void
     */
    public function savePermissions($permissions, $user_id): void
    {
        dd($permissions);
//        foreach ($permissions as $category => $permissionList) {
//            foreach ($permissionList as $permission) {
//                if (!Permission::where([
//                    'user_id' => $user_id,
//                    'category' => $category,
//                    'permission' => $permission,
//                ])->exists()) {
//                    Permission::create([
//                        'user_id' => $user_id,
//                        'category' => $category,
//                        'permission' => $permission,
//                    ]);
//                }
//            }
//        }
    }
    /**
     * @param array $permissions
     * @param int $userId
     * @return void
     */
    public function updatePermissions_Repo(array $permissions, int $userId): void
    {
//        dd($permissions['permissions']);
        foreach ($permissions['permissions'] as $category => $permissionList) {
            foreach ($permissionList as $permission) {
//                dump($userId,$permissionList,$permission);
                if (!Permission::where([
                    'user_id' => $userId,
                    'category' => $category,
                    'permission' => $permission,
                ])->exists()) {
                    Permission::create([
                        'user_id' => $userId,
                        'category' => $category,
                        'permission' => $permission,
                    ]);
                }
            }
        }
    }

    public function getPermissionsUser()
    {
        $permissions = Permission::where('user_id', Auth::id())->pluck('permission')->toArray();
        return $permissions;
    }



}
