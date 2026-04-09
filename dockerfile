# Base PHP-FPM
FROM php:8.2-fpm

# Dépendances système pour Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev default-mysql-client libicu-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www/laravel

# Permissions pour Laravel
RUN mkdir -p /var/www/laravel/tmp \
    && chmod -R 777 /var/www/laravel/tmp \
    && chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache

# Lancer PHP-FPM au premier plan
CMD ["php-fpm", "-F"]