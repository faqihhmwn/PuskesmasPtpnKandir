FROM php:8.2-cli

RUN apt-get update && apt-get install -y unzip git curl libonig-dev libxml2-dev libzip-dev zip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY . /app

RUN composer install --no-dev --optimize-autoloader

COPY .env.example .env

RUN chmod -R 777 storage bootstrap/cache

RUN php artisan key:generate

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
