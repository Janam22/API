<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Kernel as HttpKernel;
use App\Http\Middleware\BasicAuthMiddleware;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(HttpKernel $kernel)
    {
        $kernel->pushMiddleware(BasicAuthMiddleware::class);
    }
}
