<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Comment\CreateActions;
use App\GetDataGateway\GetDataGatewayContract;
use App\Repositories\Post\ColeccionsPostRepositories;

class CreateCommentCommand extends Command
{

    protected $signature = 'commentPost:create';

    protected $description = 'Command for create comment depend of id post random';

    //private ColeccionsPostRepositories $getPost;

   /* public function __construct()
    {
        $this->getPostId = new ColeccionsPostRepositories;
    }*/

    public function handle(GetDataGatewayContract $getDataGateway, ColeccionsPostRepositories $getPostId):int
    {
        $this->url = "https://jsonplaceholder.typicode.com/comments";
        $comments = $getDataGateway->getData($this->url);
        $idPost = $getPostId->getPostId();

        foreach($comments as $comment){
            $dataPost = [
                'name' =>  $comment['name'],
                'email' => $comment['email'] ,           
                'body' => $comment['body'] ,  
                'post_id' =>  $idPost
            ];
            
            $createPost = CreateActions::execute($dataPost);
            return 1;
        }
        
       
    }
}
