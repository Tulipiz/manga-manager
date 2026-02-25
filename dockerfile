FROM php:8.3-cli

# Instala dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instala as dependências sem rodar scripts do Laravel que precisam de ENV
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Ajusta permissões (Crítico para o erro 500)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# O Render injeta a porta automaticamente na variável $PORT
# Usamos o 'sh -c' para garantir que os comandos de cache rodem ao iniciar
CMD sh -c "php artisan config:cache && php artisan route:cache && php artisan serve --host=0.0.0.0 --port=$PORT"