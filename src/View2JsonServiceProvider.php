<?php

namespace Khbd\View2json;


use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class View2JsonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->publishes([
            __DIR__ . '/config/view2json.php' => config_path('view2json.php'),
        ], 'view2json');

        $router->pupushMiddlewareToGroup('web', View2JsonMiddleware::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/view2json.php',
            'view2json'
        );
    }
}
