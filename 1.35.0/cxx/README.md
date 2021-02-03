# gRPC C++ Docker image

This is a Docker image for the C++ installation of [gRPC][].

For an overview and usage examples, see the [gRPC C++ documentation][].

# What is gRPC ?

A high performance, open source, general RPC framework that puts mobile and
HTTP/2 first, available in many programming languages.  For full details, see
the official [gRPC documentation][].

[grpc]:http:/grpc.io
[grpc documentation]:http://www.grpc.io/docs/
[grpc C++ documentation]:http://www.grpc.io/docs/tutorials/basic/c.html


# Build it

```
docker build -t voxowl/grpc-cxx:1.35.0 .
```