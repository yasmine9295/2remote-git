#!/bin/sh
set -e

cd /var/www/laravel

echo " Starting Laravel container..."

# Installer les dépendances si besoin
if [ -f composer.json ]; then
    if [ ! -d vendor ]; then
        echo " Installing Composer dependencies..."
        composer install --no-interaction --prefer-dist
    fi
fi

# Créer .env si absent
if [ ! -f .env ] && [ -f .env.example ]; then
    echo " Creating .env file..."
    cp .env.example .env
fi

# Générer la clé UNIQUEMENT si absente
if ! grep -q "APP_KEY=base64" .env; then
    echo " Generating Laravel APP_KEY..."
    php artisan key:generate --force
fi

# Permissions (important parfois)
chmod -R 775 storage bootstrap/cache || true

echo "Laravel pret!"

# Lancer PHP-FPM
php-fpm