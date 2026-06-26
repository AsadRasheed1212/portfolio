FROM php:8.3-cli

# Install extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip curl libpng-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd xml

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs --no-interaction

# Laravel setup
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 8080

CMD php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link && \
    php -S 0.0.0.0:8080 -t public
