FROM naonak/docker-apache-php7:latest

RUN apt update && apt install ca-certificates

COPY . /var/www/html

#RUN composer update


#CMD ["php push-server.php"]

# composer already installed
