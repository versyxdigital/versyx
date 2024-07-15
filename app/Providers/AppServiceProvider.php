<?php

namespace App\Providers;

use Versyx\Service\Container;
use Versyx\Service\ServiceProviderInterface;

class AppServiceProvider implements ServiceProviderInterface
{
    /**
     * Register application services into the container.
     * 
     * @param Container $container
     * @return void
     */
    public function register(Container $container): Container
    {
        // Bind and register application services to the container
        // e.g. $container[ApiClientInterface::class] = new ApiClient(...);
        //
        // Don't forget to register your providers in config/boostrap.php
        return $container;
    }
}