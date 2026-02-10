<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The namespace for the controllers.
     *
     * @var string
     */
    protected $namespace = 'App\\Http\\Controllers';  // Explicitly set the namespace

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
    public function boot(): void
    {
        $this->mapWebRoutes();
        $this->mapAuthRoutes(); // Only include this if you want auth routes
    }

    /**
     * Define the "web" routes for the application.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->namespace($this->namespace) // Now it will work
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "auth" routes for the application.
     */
    protected function mapAuthRoutes(): void
    {
        Route::middleware('web')
             ->namespace($this->namespace) // Now it will work
             ->group(base_path('routes/auth.php')); // Use the namespace
    }
}
