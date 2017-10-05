<?php

namespace App\Providers;
use App\User;
use App\Logo;
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
      $user =  User::where('role' , '1')->first();
      if(!$user){
          User::create([
              'first_name' => 'Admin',
              'last_name' => 'Admin',
              'email' => 'admin@gmail.com',
              'password' => bcrypt('tyom666'),
              'role' => '1'
          ]);


      }

        $logo_image =  Logo::first();
        $footer_content = FooterContent::first();
        $slider_images = SliderImage::first();
        \View::share(compact('logo_image' , 'footer_content' , 'slider_images'));
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
