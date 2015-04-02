# Laravel Subdivisions

Laravel Subdivisions is a bundle for Laravel 4.2, providing what is roughly all ISO 3166_2 subdivisions for all countries. Based on the awesome work Webpatser did for Countries.


## Installation

Add `sidm/laravel-subdivisions` to `composer.json`.

    "sidm/laravel-subdivisions": "dev-master"
    
Run `composer update` to pull down the latest version of the Subdivision List.

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => array(
        'sidm\Subdivisions\SubdivisionsServiceProvider',
    )

Now add the alias.

    'aliases' => array(
        'Subdivisions' => 'sidm\Subdivisions\SubdivisionsFacade',
    )
    

## Configuration

Start by publishing the configuration. The first variable is the table name, if the default name `subdivisions` is fine you should not modify it.

The next two variables are very important:
    
    'country_table_name' => 'countries',
    'iso_3166_2_column_name' => 'iso_3166_2',
    
If you only want subdivisions and do not have a countries table both of these values should be changed to null (i.e., ''). If you are using the Webpatser/laravel-countries package the defaults should work fine. If you are using another package, or have rolled your own, the `country_table_name` should be set to the table name that holds your list of countries, and `iso_3166_2_column_name` should be set to the name of the column that contains the iso_3166_2 values for each country.

When you have modified the configuration file (src/config/config.php) run the following command:

    $ php artisan config:publish sidm/laravel-subdivisions
    
## Model

Next generate the migration file:

    $ php artisan subdivisions:migration
    
It will generate the `<timestamp>_setup_subdivisions_table.php` migration and the `SubdivisionsSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the subdivisions
    $this->call('SubdivisionsSeeder');
    $this->command->info('Seeded the subdivisions!'); 

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled subdivisions table will be available
