#!make

validate:
	docker compose exec php-fpm ./vendor/bin/phpstan analyse app tests --memory-limit=-1
	docker compose exec php-fpm ./vendor/bin/psalm
	docker compose exec php-fpm ./vendor/bin/phpcs --standard=PSR12 app --report=diff --colors

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

migrate:
	docker compose exec php-fpm php artisan migrate

migraterollback:
	docker compose exec php-fpm php artisan migrate:rollback

clearchash:
	docker compose exec php-fpm php artisan cache:clear

createvalidate:
	docker compose exec php-fpm php artisan make:request Api/V1/MasterCreateRequest

resourse:
	docker compose exec php-fpm php artisan make:resource MasterResource
