# gRPC Node.js Docker image

This is the official docker image for the Node.js library of grpc.  For an
overview and usage examples, see the grpc nodejs documentation.

# What is gRPC ?

A high performance, open source, general RPC framework that puts mobile and
HTTP/2 first, available in many programming languages.  For full details, see
the official gRPC documentation.

# How to use this image

## Create a `Dockerfile` in your gRPC Node.js app project

```dockerfile
FROM grpc/node:0.10-onbuild
# replace this with your application's default port
EXPOSE 8888
```

You can then build and run the Docker image:

```console
$ docker build -t my-grpc-nodejs-client-or-server .
$ docker run -it --rm --name my-running-app my-grpc-nodejs-client-or-server
```

## Notes

The image assumes that your application has a file named `package.json` listing
its dependencies and defining its start script

## Run a single Node.js script

For many simple, single file projects, you may find it inconvenient to write a
`complete `Dockerfile`. In such cases, you can run a Node.js script by using the
Node.js Docker image directly:

```console
$ docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp grpc/node:0.10 node your-grpc-client-or-server.js
```


[grpc]:http:/grpc.io
[grpc documentation]:http://www.grpc.io/docs/
[grpc nodejs documentation]:http://www.grpc.io/docs/tutorials/basic/node.html
