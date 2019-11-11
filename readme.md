composer install
cp .env.dist .env
php artisan migrate
php artisan db:seed
php artisan passport:install
yarn install
yarn start

composer dump-autoload
php artisan clear-compiled
php artisan config:clear
php artisan route:clear
php artisan view:clear

php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan cache:clear
