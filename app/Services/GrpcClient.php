<?php

namespace App\Services;

use Grpc\ChannelCredentials;
use User\UserRequest;
use User\UserServiceClient;

class GrpcClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new UserServiceClient('localhost:50051', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }

    public function getUser($id)
    {
        $request = new UserRequest();
        $request->setId($id);

        list($response, $status) = $this->client->GetUser($request)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            throw new \Exception($status->details);
        }

        return $response;
    }
}