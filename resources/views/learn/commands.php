php artisan make:controller ProductController // for making controller
php artisan make:model Product -m //for making model of product and migrating
php artisan make:model Book // another example
php artisan make:migration create_books_table //for creating tabl in database
php artisan migrate // for migrating the changes you have done
php artisan make:seed BookSeeder // for adding temporary data to database its like schema
php artisan db:seed --class=BookSeeder // for adding data to actual table
php artisan migrate:fresh // for reverting all tables created