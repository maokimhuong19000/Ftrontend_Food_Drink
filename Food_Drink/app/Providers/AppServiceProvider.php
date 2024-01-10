<?php

namespace App\Providers;

use Exception;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Builder::defaultStringLength(191);
        // try{
        //         DB::connection()->getPDO();
        //         dump('Database is Connected. Database Name is :'.DB::connection()->getDatabaseName());
        // }catch(Exception $e){
        //         dump('Database Connection Filed');
        // }
    }
}
