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
        if (\Schema::hasTable('footer_contents')) {
            $footer_content = FooterContent::first();
            \View::share(compact('footer_content'));
        }
        if (\Schema::hasTable('slider_images')) {
            $slider_images = SliderImage::first();
            \View::share(compact('slider_images'));
        }
        if (\Schema::hasTable('	logo')) {
            $logo_image =  Logo::first();
            \View::share(compact('logo_image'));
        }
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
