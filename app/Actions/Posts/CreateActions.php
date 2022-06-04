<?php

namespace App\Actions\Posts;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateActions
{
    public static function execute(array $data): User
    {
        return User::create([
            'title' =>  $data['title'],
            'body' => $data['body'] ,           
            'user_id' => $data['user_id'] 
        ]);
    }
}
