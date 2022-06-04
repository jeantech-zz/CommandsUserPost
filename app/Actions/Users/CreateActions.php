<?php

namespace App\Actions\User;

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
            'phone' => $data['phone_number'] ,
            'website' => $data['website'] ,
            'company' => $data['company'] 
        ]);
    }
}
