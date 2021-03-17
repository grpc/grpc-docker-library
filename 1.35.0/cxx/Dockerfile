FROM debian:10.7

RUN apt-get update && \
  apt-get install -y git build-essential autoconf libtool pkg-config && \
  apt-get install -y wget zlib1g zlib1g-dev && \
  apt-get clean

# Install recent version of cmake
RUN wget -q -O cmake-linux.sh https://github.com/Kitware/CMake/releases/download/v3.19.6/cmake-3.19.6-Linux-x86_64.sh && \
    sh cmake-linux.sh -- --skip-license --prefix=/usr && \
    rm cmake-linux.sh

# choose a path to install gRPC
ENV MY_INSTALL_DIR /grpc_install

# make sure the directory exists
RUN mkdir -p $MY_INSTALL_DIR

# add "bin" to PATH env var
ENV PATH="$MY_INSTALL_DIR/bin:${PATH}"

# clone gRPC repository
RUN git clone --recurse-submodules -b v1.36.3 https://github.com/grpc/grpc

WORKDIR /grpc

RUN mkdir -p cmake/build && \
    cd cmake/build && \
    cmake -DgRPC_INSTALL=ON \
      -DgRPC_BUILD_TESTS=OFF \
      -DCMAKE_INSTALL_PREFIX=$MY_INSTALL_DIR \
      ../.. && \
      make -j 2 && \
      make install

RUN bash