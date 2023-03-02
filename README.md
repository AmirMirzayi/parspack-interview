# to start application please consider that if you haven't redis or any queue driver, comment codes that run job
# set sync to queue driver might bring execution timeout

### i - composer install && composer dump-autoload
### ii - setup queue and database driver
### iii - migrate database using php artisan migrate command
### iv - seed database to fill fake data using php artisan db:seed command
### v - run php artisan schedule:work command to run scheduler sync service in every weekend(fridays)
### vi - run php artisan queue:work to rerun sync subscription checking after X hours
### vii - run php artisan serve to serve application
### viii - run php artisan test to show all api test
