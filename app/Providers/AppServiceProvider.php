<?php

namespace App\Providers;
use App\User;
use App\Logo;
use didcode\Blog\Models\Post;
use App\FooterContent;
use App\SliderImage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
