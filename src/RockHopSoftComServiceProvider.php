<?php
namespace RockHopSoft\RockHopSoftCom;

use RockHopSoft\RockHopSoftCom\RockHopSoftComFacade;
use Illuminate\Support\ServiceProvider;

class RockHopSoftComServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('rockhopsoftcomfacade', function($app) {
            return new RockHopSoftComFacade();
        });
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
//        $dbMig = '2020_09_14_000000_create_rockhopsoftcom_installs_tables';
        $this->publishes([

              __DIR__ . '/Views'
                  => base_path('resources/views/vendor/rockhopsoftcom'),

              __DIR__ . '/Uploads'
                  => base_path('public/rockhopsoftcom'),

              __DIR__.'/Models'
                  => base_path('app/Models'),

//              __DIR__ . '/Database/' . $dbMig . '.php'
//                  => base_path('database/migrations/' . $dbMig . '.php'),

              __DIR__ .'/Database/RockHopSoftComSeeder.php'
                  => base_path('database/seeders/RockHopSoftComSeeder.php')

        ]);
    }
}