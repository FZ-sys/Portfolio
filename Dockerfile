FROM php:8.2-apache

# Copie tous tes fichiers dans le dossier du serveur Apache
COPY . /var/www/html/

# Active le port 80
EXPOSE 80
