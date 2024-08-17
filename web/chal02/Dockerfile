# Use the official PHP image based on Debian
FROM php:8.2.1-apache

# Copy your PHP project into the container
COPY ./index.php /var/www/html/index.php

# Copy the custom PHP configuration file into the container
COPY ./custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

COPY ./images/horse.jpg /var/www/html/images/horse.jpg

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for the web server
EXPOSE 80
