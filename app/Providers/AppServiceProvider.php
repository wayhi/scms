<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRoleRepository();
        $this->registerPermissionRepository();
        $this->registerSMSRepository();
    }

    protected function registerRoleRepository()
    {

        $this->app->singleton('rolerepository', function ($app) {
            $model = $app['config']['scms.role'];
            $role = new $model();

            $validator = $app['validator'];

            return new RoleRepository($role, $validator);
        });

        $this->app->alias('rolerepository', 'App\Repositories\RoleRepository');
    }
    protected function registerPermissionRepository()
    {

        $this->app->singleton('permissionrepository', function ($app) {
            $model = $app['config']['scms.permission'];
            $pem = new $model();

            $validator = $app['validator'];

            return new PermissionRepository($pem, $validator);
        });

        $this->app->alias('permissionrepository', 'App\Repositories\PermissionRepository');
    }
    protected function registerSMSRepository()
    {

        $this->app->singleton('smsrepository', function ($app) {
            $model = $app['config']['scms.sms'];
            $sms = new $model();

            $validator = $app['validator'];

            return new PermissionRepository($sms, $validator);
        });

        $this->app->alias('smsrepository', 'App\Repositories\SMSRepository');
    }
}
