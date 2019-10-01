FROM node:10 AS build

WORKDIR /app

# Install dependencies

COPY ["package*.json", "./"]

RUN if test -e package-lock.json; then npm ci; else npm install; fi

FROM php:7.3-cli

WORKDIR /app

# Add node.js to a PHP environment for Pattern Lab

ENV NODE_VERSION=v10.16.3 \
    NODE_CHECKSUM=2f0397bb81c1d0c9901b9aff82a933257bf60f3992227b86107111a75b9030d9

ENV NODE_FILENAME=node-${NODE_VERSION}-linux-x64.tar.gz

RUN set -ex \
  && cd /tmp \
  && curl https://nodejs.org/dist/${NODE_VERSION}/${NODE_FILENAME} -o ${NODE_FILENAME} \
  && echo "${NODE_CHECKSUM}  ${NODE_FILENAME}" | sha256sum -c \
  && tar --strip-components=1 -xzf ${NODE_FILENAME} -C /usr/local \
  && npm install -g gulp-cli

# Add Node modules and copy configuration

COPY --from=build ["/app/node_modules", "./node_modules"]

COPY ["gulpfile.js", "package*.json", "patternlab-config.json", ".stylelintignore", ".stylelintrc.yml", "./"]