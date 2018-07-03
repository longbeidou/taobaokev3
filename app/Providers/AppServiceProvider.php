<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('App\Repositories\Contracts\GoodsCategoryInterface', 'App\Repositories\Eloquents\GoodsCategoryRepository');
      $this->app->bind('App\Repositories\Contracts\TaobaoTbkDgMaterialOptionalInterface', 'App\Repositories\Eloquents\TaobaoTbkDgMaterialOptionalRepository');
      $this->app->bind('App\Repositories\Contracts\AlimamaRepositoryInterface', 'App\Repositories\Eloquents\AlimamaRepository');
    }
}
