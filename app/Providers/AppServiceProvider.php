<?php

namespace App\Providers;

use App\Repositories\CategoriesRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoriesRepository as Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Category $category
     * @return void
     */
    public function boot(Category $category)
    {
        \Carbon\Carbon::setLocale('zh');
        view()->share('categories', $category->all());
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
