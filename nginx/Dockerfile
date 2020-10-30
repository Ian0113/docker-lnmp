ARG NGINX_VERSION
FROM nginx:${NGINX_VERSION}

COPY ./nginx.conf /etc/nginx

RUN set -xe; \
    apt-get update; \
    apt-get install -yqq \
        curl \
        openssl; \
    useradd web-user; \
    usermod -aG nginx web-user; \
    newgrp; \
    rm /etc/nginx/conf.d/default.conf;

ARG NGINX_HOST_HTTP_PORT
ARG NGINX_HOST_HTTPS_PORT
EXPOSE ${NGINX_HOST_HTTP_PORT} ${NGINX_HOST_HTTPS_PORT}