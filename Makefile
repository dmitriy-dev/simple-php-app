init: build config composer-install

up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose up --build -d

php-bash:
	docker-compose exec php-fpm bash

composer-install:
	docker-compose exec php-fpm composer install

config:
	cp example.config.php config.php