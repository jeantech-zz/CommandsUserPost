<?php

namespace App\Actions\Users;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateActions
{
    public static function execute(array $data): User
    {
        return User::create([
            'name' =>  $data['name'],
            'email' => $data['email'] ,
            'password' => Hash::make($data['password']),            
            'address' => $data['address'] ,
            'phone' => $data['phone'] ,
            'website' => $data['website'] ,
            'company' => $data['company'] 
        ]);
    }
}
