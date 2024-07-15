<?php
/*----------------------------------------
 | Auto-load classes                      |
 ----------------------------------------*/
require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/*----------------------------------------
 | Create service container               |
 ----------------------------------------*/
$app = new Versyx\Service\Container();

/*----------------------------------------
 | Register service providers             |
 ----------------------------------------*/
$app->register(new Versyx\Providers\AppServiceProvider());
// $app->register(new App\Providers\AppServiceProvider());

/**
 * service locator method to fetch services from the container
 *
 * @param mixed $dependency
 * @return mixed
 */
function app (mixed $dependency = null): mixed
{
    global $app;
    if (!$dependency) return $app;
    return $app->offsetExists($dependency) ? $app->offsetGet($dependency) : false;
}

/**
 *  App configuration API access method
 *
 * @param string $key
 * @param ?string $default
 * @return mixed
 */
function config (string $key, string $default = null): mixed
{
    return app('config')->get($key, $default);
}

/*----------------------------------------
 | Load dependency injection              | 
 ----------------------------------------*/
Versyx\Resolver::map(
    $app,
    namespace: 'App\\Http\\Controllers',
    directory: __DIR__ . '/app/Http/Controllers'
);

/*----------------------------------------
 | Set exception handler                  |
 ----------------------------------------*/
new Versyx\Exception\ExceptionHandler($app);