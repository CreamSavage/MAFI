FROM php:8.2-apache

# Instalar extensiones PHP necesarias para MySQL/MariaDB
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite deflate expires headers

# Configurar socket de MySQL compartido para conexión vía 'localhost'
RUN echo "mysqli.default_socket=/run/mysqld/mysqld.sock" > /usr/local/etc/php/conf.d/mafi-mysql.ini \
    && echo "pdo_mysql.default_socket=/run/mysqld/mysqld.sock" >> /usr/local/etc/php/conf.d/mafi-mysql.ini

# Permitir .htaccess en /var/www/html
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
