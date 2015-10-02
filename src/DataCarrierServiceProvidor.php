<?php
namespace Unisharp\DataCarrier;

use Illuminate\Support\ServiceProvider;

class DataCarrierServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include "helpers.php";
    }

    public function register()
    {
        $this->app->singleton('DataCarrier', function ($app) {
            return new DataCarrier();
        });
    }
}
