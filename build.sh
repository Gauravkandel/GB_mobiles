composer update
php artisan optimize:clear
php artisan storage:link
php artisan migrate --force