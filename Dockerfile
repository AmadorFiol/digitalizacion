# Imagen oficial de PHP con servidor embebido
FROM php:8.2-cli

RUN docker-php-ext-install mysqli

# Copiar todo dentro del contenedor
COPY public/ /var/www/html/

# Puerto en el que corre PHP built-in server
EXPOSE 8080

# Comando para iniciar servidor
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]
