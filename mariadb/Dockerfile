ARG VERSION
FROM mariadb:${VERSION}

COPY ./my.cnf /etc/mysql/conf.d/my.cnf

RUN chmod -R 644 /etc/mysql/conf.d/my.cnf

CMD ["mysqld"]

EXPOSE 3306