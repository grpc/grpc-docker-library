# Copyright 2019 The gRPC Authors
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

FROM debian:10.7

RUN apt-get update && apt-get install -y \
  git cmake build-essential autoconf libtool pkg-config \
  && apt-get clean

# choose a path to install gRPC
ENV MY_INSTALL_DIR /grpc_install

# make sure the directory exists
RUN mkdir -p $MY_INSTALL_DIR

# add "bin" to PATH env var
ENV PATH="$MY_INSTALL_DIR/bin:${PATH}"

# clone gRPC repo
RUN git clone --recurse-submodules -b v1.35.0 https://github.com/grpc/grpc

WORKDIR /grpc

RUN mkdir -p cmake/build && \
cd cmake/build && \
cmake -DgRPC_INSTALL=ON \
      -DgRPC_BUILD_TESTS=OFF \
      -DCMAKE_INSTALL_PREFIX=$MY_INSTALL_DIR \
      ../.. && \
make -j && \
make install

# curl automake  make  g++ unzip \

# # install protobuf first, then grpc
# ENV GRPC_RELEASE_TAG v1.35.0
# RUN git clone -b ${GRPC_RELEASE_TAG} https://github.com/grpc/grpc /var/local/git/grpc && \
#     cd /var/local/git/grpc && \
#     git submodule update --init

# RUN echo "--- installing protobuf ---" && \
#     cd /var/local/git/grpc && \
#     cd third_party/protobuf && \
#     git submodule update --init && \
#     ./autogen.sh && ./configure --enable-shared && \
#     make -j$(nproc) && make -j$(nproc) check && make install && make clean && ldconfig
    
    # echo "--- installing grpc ---" && \
    # cd /var/local/git/grpc && \
    # make -j$(nproc) && make install && make clean && ldconfig && \
    # rm -rf /var/local/git/grpc

RUN bash