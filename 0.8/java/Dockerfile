# Copyright 2015, Google Inc.
# All rights reserved.
#
# Redistribution and use in source and binary forms, with or without
# modification, are permitted provided that the following conditions are
# met:
#
#     * Redistributions of source code must retain the above copyright
# notice, this list of conditions and the following disclaimer.
#     * Redistributions in binary form must reproduce the above
# copyright notice, this list of conditions and the following disclaimer
# in the documentation and/or other materials provided with the
# distribution.
#     * Neither the name of Google Inc. nor the names of its
# contributors may be used to endorse or promote products derived from
# this software without specific prior written permission.
#
# THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
# "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
# LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
# A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
# OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
# SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
# LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
# DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
# THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
# (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
# OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

# Dockerfile for gRPC Java
FROM java:8-jdk

# Define version variables
ENV PROTOBUF_VERSION 3.0.0-alpha-3.1
ENV GRPC_JAVA_VERSION 0.8.0

# Define the JAVA_HOME variable
ENV JAVA_HOME /usr/lib/jvm/java-8-openjdk-amd64

RUN apt-get update && apt-get install -y \
  autoconf \
  autotools-dev \
  build-essential \
  libtool && apt-get clean

# Get the protobuf source from GitHub and install it
RUN wget -O - https://github.com/google/protobuf/archive/v${PROTOBUF_VERSION}.tar.gz | \
  tar xz && \
  cd protobuf-${PROTOBUF_VERSION} && \
  ./autogen.sh && \
  ./configure --prefix=/usr && \
  make -j12 && make check && make install && \
  rm -r "$(pwd)"

# Get the grpc java source from GitHub and install it
RUN wget -O - https://github.com/grpc/grpc-java/archive/v${GRPC_JAVA_VERSION}.tar.gz | \
  tar xz && \
  cd grpc-java-${GRPC_JAVA_VERSION} && \
  ./gradlew build
