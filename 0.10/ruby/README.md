# gRPC Ruby Docker image

This is the official docker image for the Ruby library of grpc.  For an
overview and usage examples, see the grpc ruby documentation.

# What is gRPC ?

A high performance, open source, general RPC framework that puts mobile and
HTTP/2 first, available in many programming languages.  For full details, see
the official gRPC documentation.

# How to use this image

## Create a `Dockerfile` in your gRPC Ruby app project

```dockerfile
FROM grpc/ruby:0.10-onbuild
CMD ["./your-client-or-server.rb"]
```

Put this file in the root of your app, next to the `Gemfile`.

This image includes multiple `ONBUILD` triggers which should be all you need to
bootstrap most gRPC Ruby applications. The build will `COPY . /usr/src/app` and
`RUN bundle install`.

You can then build and run the Ruby image:

```console
$ docker build -t my-ruby-app .
$ docker run -it --name my-running-script my-ruby-app
```

### Generate a `Gemfile.lock`

The `onbuild` tag expects a `Gemfile.lock` in your app directory. This `docker
run` will help you generate one. Run it in the root of your app, next to the
`Gemfile`:


```console
$ docker run --rm -v "$PWD":/usr/src/app -w /usr/src/app grpc/ruby:0.10 bundle install
```

## Run a single Ruby script

For many simple, single file projects, you may find it inconvenient to write a
complete `Dockerfile`. In such cases, you can run a gRPC Ruby app by using the
gRPC Ruby Docker image directly:


```console
$ docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp grpc/ruby:0.10 ruby your-grpc-client-or-server.rb
```


[grpc]:http:/grpc.io
[grpc documentation]:http://www.grpc.io/docs/
[grpc ruby documentation]:http://www.grpc.io/docs/tutorials/basic/ruby.html
