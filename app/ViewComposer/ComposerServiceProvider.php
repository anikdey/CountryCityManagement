<?php
namespace App\ViewComposer;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        View::composer('inc.sidebar', 'App\ViewComposer\SidebarComposer');
        View::composer(['admin.city.create', 'admin.city.edit', 'admin.city.search', 'admin.city.searchResult'], 'App\ViewComposer\CityComposer');
    }

    public function register()
    {

    }
} 