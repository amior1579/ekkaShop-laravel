<?php



/**
 * This layer contains repositories that interact with the database.
 */


namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    public function findUser($user_id){
        return User::find($user_id);
    }
    public function createUser(array $data){
        return User::create($data);
    }

    public function allUser(){
        return User::all();
    }
    public function deleteUser($user_id){
        $user = $this->findUser($user_id);
        return $user ? $user->delete() : null;
    }
    public function UpdateUser(array $data, $user_id){
        $user = $this->findUser($user_id);
        return $user ? $user->update($data) : null;
    }
}
