#!/bin/bash

# Cria os diretórios necessários no storage
echo "Criando diretórios de storage..."
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/testing
mkdir -p storage/framework/views
mkdir -p storage/logs

# Configura permissões para o storage e bootstrap/cache
echo "Configurando permissões..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 
# a
# Limpa e configura o cache do Laravel
echo "Limpando e configurando o cache do Laravel..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache

echo "Configuração concluída!"
