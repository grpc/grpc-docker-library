# gRPC Python Docker image

This is the official docker image for the Python facility of gRPC.  For an
overview and usage examples, see the gRPC Python documentation.

# What is gRPC ?

A high performance, open source, general RPC framework that puts mobile and
HTTP/2 first, available in many programming languages.  For full details, see
the official gRPC documentation.


# How to use this image

## Create a `Dockerfile` in your Python app project


```dockerfile
FROM grpc/python:1.0-onbuild
CMD [ "python", "./your-daemon-or-script.py" ]
```

These images include multiple `ONBUILD` triggers, which should be all you need
to bootstrap most applications. The build will `COPY` a `requirements.txt` file,
`RUN pip install` on said file, and then copy the current directory into
`/usr/src/app`.

You can then build and run the Docker image:

```console
$ docker build -t my-grpc-python-client-or-server .
$ docker run -it --rm --name my-running-app my-grpc-python-client-or-server
```

## Run a single Python script

For many simple, single file projects, you may find it inconvenient to write a
complete `Dockerfile`. In such cases, you can run a Python script by using the
Python Docker image directly:


```console
$ docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp grpc/python:0.11 python your-grpc-python-client-or-server.py
```

[grpc]:http:/grpc.io
[grpc documentation]:http://www.grpc.io/docs/
[grpc python documentation]:http://www.grpc.io/docs/tutorials/basic/python.html
