<?php



/**
 * This layer contains repositories that interact with the database.
 */


namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    public function findUser($user_id): User|null
    {
        if ($user = User::find($user_id)){
            return $user;
        }
        return null;
    }
    public function createUser($data): User
    {
        return User::create($data);
    }

    public function allUser(){
        return User::all();
    }
    public function deleteUser($user_id): true|null
    {
        $user = $this->findUser($user_id);
        return $user ?->delete();
    }
    public function UpdateUser(array $data, $user_id){
        $user = $this->findUser($user_id);
        return $user?->update($data);
    }
}
