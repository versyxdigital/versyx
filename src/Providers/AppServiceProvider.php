<?php

namespace App\Providers;

use Versyx\Service\Container;
use Versyx\Service\ServiceProviderInterface;

class AppServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // Bind and register application services to the container
        // e.g. $container[ApiClientInterface::class] = new ApiClient(...);
        //
        // Don't forget to register your providers in config/boostrap.php
        return $container;
    }
}