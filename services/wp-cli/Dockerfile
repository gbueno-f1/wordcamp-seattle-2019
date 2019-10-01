FROM wordpress:cli-2.3

USER root

RUN set -ex \
  && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
  && apk del .build-deps \
  && apk add --no-cache openssh \
  && echo 'memory_limit = -1' >> /usr/local/etc/php/php-cli.ini

USER www-data