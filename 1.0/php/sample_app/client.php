<?php

require 'vendor/autoload.php';
require 'helloworld.php';

$client = new helloworld\GreeterClient('localhost:50051', []);
var_dump($client);
