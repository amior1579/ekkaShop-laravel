<?php



/**
 * This layer contains repositories that interact with the database.
 */


namespace App\Repositories;

use App\Models\User;
use App\Models\Permission;

class AuthRepository
{
    public function findUser($user_id): User|null
    {
        if ($user = User::find($user_id)){
            return $user;
        }
        return null;
    }
    /**
     * @param array $permissions
     * @param int $user_id
     * @return void
     */
    public function savePermissions(array $permissions, int $user_id): void
    {
        foreach ($permissions as $category => $permissionList) {
            foreach ($permissionList as $permission){
                if (!Permission::where([
                    'user_id' => $user_id,
                    'category' => $category,
                    'permission' => $permission,
                ])->exists()) {
                    Permission::create([
                        'user_id' => $user_id,
                        'category' => $category,
                        'permission' => $permission,
                    ]);
                }
            }
        }
    }
    public function createUser(array $data): User|null
    {
        $user = User::create($data);
        if (isset($data['permissions'])){
            $this->savePermissions($data['permissions'], $user->id);
        }
        return $user;
    }

    public function allUser(){
        return User::all();
    }
    public function deleteUser_Repo($userId): true|null
    {
        $user = $this->findUser($userId);
        return $user ?->delete();
    }
//    public function UpdateUser(array $data, $user_id){
//        $user = $this->findUser($user_id);
//        return $user?->update($data);
//    }
}
