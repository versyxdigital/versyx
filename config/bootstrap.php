<?php

session_start();

/*----------------------------------------
 | Auto-load classes                      |
 ----------------------------------------*/
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/*----------------------------------------
 | Create service container               |
 ----------------------------------------*/
$app = new Versyx\Service\Container();

/*----------------------------------------
 | Register service providers             |
 ----------------------------------------*/
$app->register(new Versyx\Providers\LogServiceProvider());
$app->register(new Versyx\Providers\RouteServiceProvider());
$app->register(new Versyx\Providers\ViewServiceProvider());
// $app->register(new App\Providers\AppServiceProvider());

/**
 * service locator method to fetch services from the container
 *
 * @param mixed $dependency
 * @return mixed
 */
function app(mixed $dependency = null): mixed
{
    global $app;
    if (!$dependency) return $app;
    return $app->offsetExists($dependency) ? $app->offsetGet($dependency) : false;
}

/*----------------------------------------
 | Load resolver                          | 
 ----------------------------------------*/
require_once __DIR__.'/../config/resolver.php';

/*----------------------------------------
 | Set exception handler                  |
 ----------------------------------------*/
new Versyx\Exception\ExceptionHandler($app);