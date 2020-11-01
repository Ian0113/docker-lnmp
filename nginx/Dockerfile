ARG NGINX_VERSION
FROM nginx:${NGINX_VERSION}

COPY ./nginx.conf /etc/nginx

ARG NGINX_CONN_PHPFPM
ARG NGINX_CONN_PHPFPM_PORT
RUN set -xe; \
    apt-get update; \
    apt-get install -yqq \
        curl \
        openssl; \
    useradd web-user; \
    usermod -aG nginx web-user; \
    newgrp; \
    rm /etc/nginx/conf.d/default.conf; \
    echo "upstream phpfpm-upstream { server ${NGINX_CONN_PHPFPM}:${NGINX_CONN_PHPFPM_PORT}; }" > /etc/nginx/conf.d/phpfpm-upstream.conf