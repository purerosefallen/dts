FROM php:7.1.30-apache-stretch

RUN apt update && \
	env DEBIAN_FRONTEND=noninteractive apt -y install wget libcurl4-openssl-dev && \
	docker-php-ext-install sockets curl

COPY . /var/www/html
WORKDIR /var/www/html
RUN chmod -R 777 gamedata && \
	chmod -R 777 include && \
	chmod -R 777 templates

EXPOSE 80
VOLUME "/var/www/html"

CMD ./docker-entrypoint.sh
