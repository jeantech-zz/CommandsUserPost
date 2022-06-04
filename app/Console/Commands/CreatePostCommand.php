<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Posts\CreateActions;
use App\GetDataGateway\GetDataGatewayContract;
use App\Repositories\User\ColeccionsUserRepositories;

class CreatePostCommand extends Command
{

    protected $signature = 'posts:create';

    protected $description = 'Command creation posts';

    private $url;

    public function handle(GetDataGatewayContract $getDataGateway, ColeccionsUserRepositories $getUserId):int
    {
        $this->url = config('app.urlPosts');
    
        $posts = $getDataGateway->getData($this->url);

        $idUser = $getUserId->getUserId();

        foreach($posts as $post){
            $dataPost = [
                'title' =>  $post['title'],
                'body' => $post['body'] ,           
                'user_id' => $idUser 
            ];
            $createPost = CreateActions::execute($dataPost);
        }
        
        return 1;
    }
}
