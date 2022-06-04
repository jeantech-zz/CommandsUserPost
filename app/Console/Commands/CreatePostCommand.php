<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Posts\CreateActions;
use App\GetDataGateway\GetDataGatewayContract;

class CreatePostCommand extends Command
{

    protected $signature = 'posts:create';

    protected $description = 'Command creation posts';

    private $url;

    public function handle(GetDataGatewayContract $getDataGateway):int
    {
        $this->url = "https://jsonplaceholder.typicode.com/posts";
        $posts = $getDataGateway->getData($this->url);

        foreach($posts as $post){
            $dataPost = [
                'title' =>  $post['title'],
                'body' => $post['body'] ,           
                'user_id' => $post['userId'] 
            ];
            $createPost = CreateActions::execute($dataPost);
        }
        
        return 1;
    }
}
