<?php



/**
 * This layer contains repositories that interact with the database.
 */


namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function allUser(){
        return User::all();
    }
}
