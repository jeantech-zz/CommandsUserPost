<?php

namespace App\Repositories\Post;

use App\Models\Post;

class ColeccionsPostRepositories implements CommentRepositories
{
    public function getPostId()
    {
        $post = Post::get();
        $idPost = $post->random();
        return  $idPost->id;
    }

}