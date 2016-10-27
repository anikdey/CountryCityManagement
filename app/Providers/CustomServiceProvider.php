<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 1:42 PM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('App\Services\CountryService', 'App\Services\CountryServiceImpl');
        $this->app->bind('App\Services\CityService', 'App\Services\CityServiceImpl');
    }
} 