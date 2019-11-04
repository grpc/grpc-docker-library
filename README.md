# IMPORTANT: This repository contains gRPC docker images that are no longer maintained and most of them are out of date (and potentially broken).

*We are working on providing an improved installation story and a better automated mechanism for updating the docker images
in this repository. Until than happens, please refrain from using the docker images defined in this repository.*

# About this repo

This is the Git repo containing the official Docker images for [grpc][].


# What is gRPC ?

A high performance, open source, general RPC framework that puts mobile and
HTTP/2 first, available in many programming languages.  For full details, see
the official [gRPC documentation][].


# Organization

The repo is set up to mirror the structure of [docker-library][] repos.

- For each grpc release, there is a folder named after the release version.
- Within each release folder, there is a folder containing Dockerfiles for each of the supported grpc programming languages.
- Within each language folder, there is a main Dockerfile derived from the latest stable debian release and version of the programming language.
  - Optionally, there may be sub-folders containing other docker images, e.g, 'slim' versions or versions built at other versions of debian or the programming language

The folder structure matches that used by [official docker images][]. This
anticipates the future publishing gRPC as an official docker image once it
reaches it GA milestone.


[docker-library]:https://github.com/docker-library
[grpc]:http:/grpc.io
[official docker images]:https://github.com/docker-library/official-images
[grpc documentation]:http://www.grpc.io/docs/
