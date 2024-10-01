# Use the official PHP image with Apache
FROM php:8.0-apache

# Install PHP extensions required for your project
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your project files into the container's web directory
COPY . /var/www/html/

# Set correct permissions for the Apache web server to access your files
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to allow the container to serve the web app
EXPOSE 80

