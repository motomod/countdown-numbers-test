start:
	docker-compose up -d
	docker-compose exec php composer install
	sudo chmod 777 storage -R

test:
	docker-compose exec php vendor/bin/phpunit

default: start
