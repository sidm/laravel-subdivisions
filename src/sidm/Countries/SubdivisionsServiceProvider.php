<?php

namespace sidm\Subdivisions;

use Illuminate\Support\ServiceProvider;

/**
 * CountryListServiceProvider
 *
 */ 

class SubdivisionsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

        /**
        * Bootstrap the application.
        *
        * @return void
        */
        public function boot()
        {
            $this->package('sidm/laravel-subdivisions');
        }        
        
	/**
	 * Register everything.
	 *
	 * @return void
	 */
	public function register()
	{
	    $this->registerSubdivisions();
	    $this->registerCommands();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function registerSubdivisions()
	{
	    $this->app->bind('subdivisions', function($app)
	    {
	        return new Subdivisions();
	    });
	}
	
	/**
	 * Register the artisan commands.
	 *
	 * @return void
	 */
	protected function registerCommands()
	{		    
	    $this->app['command.subdivisions.migration'] = $this->app->share(function($app)
	    {
	        return new MigrationCommand($app);
	    });
	    
	    $this->commands('command.subdivisions.migration');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('subdivisions');
	}
}