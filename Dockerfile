FROM php:8.2-fpm

# Instala dependências
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip


# roda o node e npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Limpa cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Diretório de trabalho
WORKDIR /var/www/html

# Copia APENAS os arquivos do Composer primeiro (para otimizar o cache)
COPY composer.json composer.lock ./

# Instala dependências (sem scripts para evitar erros)
RUN composer install --optimize-autoloader --no-dev --no-scripts

# Copia o restante do projeto
COPY . .

# Permite que o Composer execute scripts (como o `post-autoload-dump`)
RUN composer dump-autoload --optimize

# Expõe a porta 9000
EXPOSE 9000

CMD ["php-fpm"]