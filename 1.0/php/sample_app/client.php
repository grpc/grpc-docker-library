<?php

require 'vendor/autoload.php';
require 'Helloworld/GreeterClient.php';
require 'helloworld.pb.php';


$client = new \Helloworld\GreeterClient('localhost:50051', [
	'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

$req = new \Helloworld\HelloRequest();
$req->setName('gRPC World');

$resp = $client->SayHello($req);
list($resp, $status) = $client->SayHello($req)->wait();

var_dump($resp->getMessage(), $status);
