<?php



/**
 * This layer contains repositories that interact with the database.
 */


namespace App\Repositories;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Contracts\Auth\Guard;

class AuthRepository
{
    public function __construct(private Guard $auth) {}

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
    public function getPermissionsUser()
    {
        $permissions = Permission::where('user_id', $this->auth->id())->pluck('permission')->toArray();
        return $permissions;
    }

    public function createUser(array $data): User|null
    {
        $user = User::create($data);
        if (isset($data['permissions'])){
            $this->savePermissions($data['permissions'], $user->id);
        }
        return $user;
    }

    public function allUsers(){
        return User::where('id', '!=', $this->auth->id())
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function deleteUser_Repo($userId): true|null
    {
        $user = $this->findUser($userId);
        return $user ?->delete();
    }
    public function updateUser_Repo(array $data, $userId): true|null
    {
        $user = $this->findUser($userId);
        return $user?->update($data);
    }
}
