FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instala dependências
RUN composer install --no-dev --optimize-autoloader

# Ajusta permissões vitais para o Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Limpa caches que podem ter vindo da sua máquina local
RUN php artisan config:clear && php artisan cache:clear

# O Render define a porta na variável $PORT
CMD php artisan serve --host=0.0.0.0 --port=$PORT