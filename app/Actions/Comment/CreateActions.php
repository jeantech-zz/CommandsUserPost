<?php

namespace App\Actions\Comment;

use App\Models\Comment;

class CreateActions
{
    public static function execute(array $data): Comment
    {
        return Comment::create([
            'name' =>  $data['name'],
            'email' => $data['email'] ,           
            'body' => $data['body'] ,  
            'post_id' => $data['post_id'] 
        ]);
    }
}
