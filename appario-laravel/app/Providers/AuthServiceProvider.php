<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Apiario;
use App\Policies\ApiarioPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Apiario::class => ApiarioPolicy::class,
    ];


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
