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

FROM debian:jessie

RUN echo "deb http://ftp.us.debian.org/debian jessie-backports main" | tee -a /etc/apt/sources.list

# Install latest version of mono based on instructions from
# http://www.mono-project.com/docs/getting-started/install/linux/
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 3FA7E0328081BFF6A14DA29AA6A19B38D3D831EF
RUN echo "deb http://download.mono-project.com/repo/debian wheezy main" | tee /etc/apt/sources.list.d/mono-xamarin.list
RUN echo "deb http://download.mono-project.com/repo/debian wheezy-apache24-compat main" | tee -a /etc/apt/sources.list.d/mono-xamarin.list
RUN echo "deb http://download.mono-project.com/repo/debian wheezy-libjpeg62-compat main" | tee -a /etc/apt/sources.list.d/mono-xamarin.list
RUN echo "deb http://download.mono-project.com/repo/debian wheezy-libtiff-compat main" | tee -a /etc/apt/sources.list.d/mono-xamarin.list
RUN apt-get update && apt-get --no-install-recommends install -y mono-complete mono-devel nuget && apt-get clean

# Install trusted root certificates needed to restore NuGet packages
RUN mozroots --import --sync

ENV GRPC_RELEASE_TAG=0_11_0
ENV GRPC_VERSION=0.11.0.0-1
ENV GRPC_VERSION_BACKPORTS=${GRPC_VERSION}~bpo8+2

RUN apt-get update && apt-get --no-install-recommends install -y -q wget libgrpc0=${GRPC_VERSION_BACKPORTS} && apt-get clean

# Download and install C# native extension
RUN cd /root && wget https://github.com/grpc/grpc/releases/download/release-${GRPC_RELEASE_TAG}/libgrpc-csharp-ext0_${GRPC_VERSION}_amd64.deb \
    && dpkg -i libgrpc-csharp-ext0_${GRPC_VERSION}_amd64.deb

# Define the default command.
CMD ["bash"]

