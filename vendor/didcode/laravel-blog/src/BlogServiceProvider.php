<?php namespace didcode\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->loadViewsFrom(__DIR__.'/views', 'blog');

        $this->publishes([
            __DIR__.'/views'        => base_path('resources/views/vendor/blog'),
            __DIR__.'/migrations'   => $this->app->databasePath().'/migrations',
            __DIR__.'/config.php'   => config_path('blog.php'),
        ]);
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        include __DIR__.'/routes.php';
        $this->app->make('didcode\Blog\BlogController');
        $this->app->make('didcode\Blog\AdminController');
	}

}
