<?php

use Illuminate\Support\Facades\Route;

use App\Services\GrpcClient;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/grpc/{id}', function ($id) {
    $grpcClient = new GrpcClient();
    $response = $grpcClient->getUser($id);

    return 'Name: '.$response->getName();
});
