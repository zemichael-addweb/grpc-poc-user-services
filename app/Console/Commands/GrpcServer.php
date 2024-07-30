<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Grpc\RpcServer;
use App\Services\UserService;

class GrpcServer extends Command
{
    protected $signature = 'grpc:serve';
    protected $description = 'Run the gRPC server';

    public function handle()
    {
        $server = new RpcServer();
        $server->addHttp2Port('0.0.0.0:50051');
        // $server->handle(new UserService());
        $server->handle(new UserService());

        //print server info
        echo 'Starting gRPC server on port 50051' . PHP_EOL;
        
        $server->run();
    }
}