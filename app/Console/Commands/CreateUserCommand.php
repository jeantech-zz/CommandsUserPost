<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Users\CreateActions;
use App\GetDataGateway\GetDataGatewayContract;

class CreateUserCommand extends Command
{

    protected $signature = 'users:create';

    protected $description = 'Command description create users used data gateway';

    private $url;

    public function handle(GetDataGatewayContract $getDataGateway):int
    {
        $this->url = "https://jsonplaceholder.typicode.com/users";
        $users = $getDataGateway->getData($this->url);

        foreach($users as $user){
            //dd($user['address']['street']);
            $dataUser = [
                'name' =>  $user['name'],
                'email' => $user['email'] ,
                'password' => $user['email'],            
                'address' => $user['address']['street'] ,
                'phone' => $user['phone'] ,
                'website' => $user['website'] ,
                'company' => $user['company'] 
            ];
            $user = CreateActions::execute($dataUser);
        }
        
        return 1;
    }
}
