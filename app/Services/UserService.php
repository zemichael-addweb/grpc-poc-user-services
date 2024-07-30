<?php

namespace App\Services;

use Grpc\ServerContext;
use User\UserRequest;
use User\UserResponse;
use User\UserServiceInterface;
use User\UserServiceStub;

class UserService extends UserServiceStub
{
    public function GetUser(UserRequest $request, ServerContext $context): UserResponse
    {
        $response = new UserResponse();
        // TODO: Implement logic here
        $response->setId($request->getId());
        $response->setName("Zemichael From gRPC Checking - ID : " . $request->getId());
        $response->setEmail("user@example.com");

        return $response;
    }
}