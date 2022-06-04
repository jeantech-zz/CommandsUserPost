<?php

namespace App\Actions\Posts;

use Illuminate\Support\Facades\Hash;
use App\Models\Post;

class CreateActions
{
    public static function execute(array $data): Post
    {
        return Post::create([
            'title' =>  $data['title'],
            'body' => $data['body'] ,           
            'user_id' => $data['user_id'] 
        ]);
    }
}
