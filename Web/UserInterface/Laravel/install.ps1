Copy-Item .env.example .env
docker-compose up -d
docker-compose exec php composer install
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate:fresh
docker-compose exec php php artisan db:seed
docker-compose exec php mkdir -p public/images 
docker-compose exec php php artisan storage:link