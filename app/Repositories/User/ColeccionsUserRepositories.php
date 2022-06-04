<?php

namespace App\Repositories\User;

use App\Models\User;

class ColeccionsUserRepositories implements UserRepositories
{
    public function getUserId()
    {
        $user = User::get();
        $idUser = $user->random();
        return  $idUser->id;
    }

}