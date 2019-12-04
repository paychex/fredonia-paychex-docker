# Setting base container to build on
FROM php:7.3-apache

# Running updates and installing mysqli extention for php
RUN apt-get update && apt-get install -yq --no-install-recommends
RUN docker-php-ext-install mysqli

# Opening port 80
EXPOSE 80

# Set directory for index.php
COPY ./website/ /var/www/html

# Setup healthcheck for container
HEALTHCHECK --interval=5s --timeout=3s --retries=3 CMD curl -f http://localhost || exit 1

