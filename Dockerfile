# Usa una imagen base de PHP con Apache (PHP 8.2)
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \             
    unzip \            
    libzip-dev \    
    
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip     \
    
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html


EXPOSE 80
