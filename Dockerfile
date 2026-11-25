# Pinned base image version for Laravel PHP-FPM + Nginx
FROM richarvey/nginx-php-fpm:3.1.6

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Set permissions for Laravel storage and cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Environment configuration
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV RUN_CLI 0
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Expose HTTP port
EXPOSE 80

# Start server
CMD ["/start.sh"]
