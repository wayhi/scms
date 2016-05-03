<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\CustomerRepository;
use Prettus\Repository\Providers\RepositoryServiceProvider;

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
        $this->app->register(RepositoryServiceProvider::class);
        $this->registerRoleRepository();
        $this->registerPermissionRepository();
        $this->registerSMSRepository();
        $this->registerCustomerRepository();
        $this->registerBankCardRepository();
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

    protected function registerCustomerRepository()
    {

        $this->app->singleton('customerrepository', function ($app) {
            $model = $app['config']['scms.customer'];
            $sms = new $model();

            $validator = $app['validator'];

            return new CustomerRepository($sms, $validator);
        });

        $this->app->alias('customerrepository', 'App\Repositories\CustomerRepository');
    }

    protected function registerBankCardRepository()
    {

        $this->app->singleton('bankcardrepository', function ($app) {
            $model = $app['config']['scms.bankcard'];
            $bankcard = new $model();
            $validator = $app['validator'];

            return new CustomerRepository($bankcard, $validator);
        });

        $this->app->alias('bankcardrepository', 'App\Repositories\BankCardRepository');
    }
}
