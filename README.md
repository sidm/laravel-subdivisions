# Laravel Subdivisions

Laravel Subdivisions is a bundle for Laravel 4.2, providing what is roughly all ISO 3166_2 subdivisions for all countries. Based on the awesome work Webpatser did for Countries.


## Installation

Add `sidm/laravel-subdivisions` to `composer.json`.

    "sidm/laravel-subdivisions": "dev-master"
    
Run `composer update` to pull down the latest version of Country List.

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => array(
        'sidm\Subdivisions\SubdivisionsServiceProvider',
    )

Now add the alias.

    'aliases' => array(
        'Subdivisions' => 'sidm\Subdivisions\SubdivisionsFacade',
    )
    

## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `subdivisions` suits you, leave it. Otherwise run the following command

    $ php artisan config:publish sidm/laravel-subdivisions

Next generate the migration file:

    $ php artisan subdivisions:migration
    
It will generate the `<timestamp>_setup_subdivisions_table.php` migration and the `SubdivisionsSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the subdivisions
    $this->call('SubdivisionsSeeder');
    $this->command->info('Seeded the subdivisions!'); 

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled subdivisions table will be available