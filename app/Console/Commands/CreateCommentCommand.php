<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Comment\CreateActions;
use App\GetDataGateway\GetDataGatewayContract;

class CreateCommentCommand extends Command
{

    protected $signature = 'commentPost:create';

    protected $description = 'Command for create comment depend of id post random';

    public function handle(GetDataGatewayContract $getDataGateway):int
    {
        $this->url = "https://jsonplaceholder.typicode.com/comments";
        $comments = $getDataGateway->getData($this->url);

        foreach($comments as $comment){
            $dataPost = [
                'name' =>  $comment['name'],
                'email' => $comment['email'] ,           
                'body' => $comment['body'] ,  
                'post_id' => $data['post_id']
            ];
            
            $createPost = CreateActions::execute($dataPost);
        }
        
        return 1;
    }
}
