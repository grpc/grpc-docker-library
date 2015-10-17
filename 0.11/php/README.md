# gRPC PHP Docker image

This is the official docker image for the PHP library of [gRPC][].  For an
overview and usage examples, see the [gRPC PHP documentation][].

# What is gRPC ?

A high performance, open source, general RPC framework that puts mobile and
HTTP/2 first, available in many programming languages.  For full details, see
the official [gRPC documentation][].

# How to use this image

Assume that you are building an app called `sample_app`

```sh
$ mkdir -p sample_app
```

You will need the following files in the [`sample_app`](./sample_app) directory


Build a `Dockerfile` for your app, based on the gRPC PHP onbuild image.

```dockerfile
FROM grpc/php:0.11-onbuild

CMD ["apache2ctl", "-DFOREGROUND"]
```

You will need a `composer.json` file, similar to this

```json
{
  "require": {
    "php": ">=5.5.0",
    "grpc/grpc": "dev-release-0_11",
    "google/auth": "dev-master",
    "datto/protobuf-php": "dev-master"
  },
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/stanley-cheung/Protobuf-PHP"
    }
  ]
}
```

Assume that you have a service defined in a `helloworld.proto` file. Use
the `protoc-gen-php` tool to generate the client stub `helloworld.php` file.

```sh
$ protoc-gen-php -i sample_app/ -o sample_app/ helloworld.proto
```

Build your client app: `client.php`

```php
<?php

require 'vendor/autoload.php';
require 'helloworld.php';

$client = new helloworld\GreeterClient('localhost:50051', []);
var_dump($client);
```

Build the app's docker image

```sh
$ docker build -t grpc-php-client sample_app/
```

Run the docker image, which will start an Apache server

```sh
$ docker run -it --rm -p 9998:80 grpc-php-client
```

Use a browser to test your app: `localhost:9998/client.php`

[gRPC]:http:/grpc.io
[gRPC documentation]:http://www.grpc.io/docs/
[gRPC PHP documentation]:http://www.grpc.io/docs/tutorials/basic/php.html
