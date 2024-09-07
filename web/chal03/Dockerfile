# Use the official PHP image based on Debian
FROM php:8.2.1-apache

# Copy your PHP project into the container
COPY ./quick-access.php /var/www/html/quick-access.php

# Copy the custom PHP configuration file into the container
COPY ./custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for the web server
EXPOSE 80
