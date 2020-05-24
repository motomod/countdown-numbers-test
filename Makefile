start:
	docker-compose up -d
	docker-compose exec php composer install
	sudo chmod 777 storage -R

default: start
