FROM mysql:latest
ENV MYSQL_ROOT_PASSWORD fourFours4!
ENV MYSQL_DATABASE cats
ENV MYSQL_USER kitten
ENV MYSQL_PASSWORD fourFours4!
ADD script.sql /docker-entrypoint-initdb.d
EXPOSE 3306
