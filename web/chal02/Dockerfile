# Use the official PHP image based on Debian
FROM php:8.2.1-apache

# Copy your PHP project into the container
COPY ./index.php /var/www/html/index.php

COPY ./images/horse.jpg /var/www/html/images/horse.jpg

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for the web server
EXPOSE 80
