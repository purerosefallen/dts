FROM php:5.6-apache

RUN apt update && \
	env DEBIAN_FRONTEND=noninteractive apt -y install wget libcurl4-openssl-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
	docker-php-ext-install sockets curl mysql mbstring && \
	docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
	docker-php-ext-install gd

COPY . /defaults
#RUN chmod -R 777 gamedata && \
#	chmod -R 777 include && \
#	chmod -R 777 templates

EXPOSE 80
WORKDIR /var/www/html

CMD /defaults/docker-entrypoint.sh
