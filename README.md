# Versyx Starter Project

## About Versyx

This is the starter skeleton for projects using [Versyx](https://github.com/versyxdigital/framework).

Versyx is a lightweight PHP framework suitable for developing web applications. It is a small-yet-powerful framework that comes with many features to aid in development, such as:

- A powerful dependency injection container.
- Built-in routing using [FastRoute](https://github.com/nikic/FastRoute).
- View rendering using [Twig](https://twig.symfony.com/).
- Application logging using [Monolog](https://github.com/Seldaek/monolog).

## Getting Started

### Requirements

- Composer
- PHP
- Docker (optional)


### Installing Versyx

You may create a new Versyx project via Composer's `create-project` command:

```sh
composer create-project versyx/versyx my-app
```

### Initial Configuration

Once the project has been created, you're ready to begin configuring your application.

Copy the `.env.example` file that is provided to `.env` and configure your application's environment variables:

```sh
# The name of your application, can be used in various places such as templates
APP_NAME="My App"

# The absolute path to the root of your application, used by Versyx's default
# routing and logging service providers to resolve paths to your application
# route and log files respectively.
APP_ROOT="/var/www/html"

# When set to true, Versyx's error handler will print exceptions.
APP_DEBUG=true

# When set to true, compiled twig templates will be cached.
APP_CACHE=false

# Sets the host port for the docker container
HTTP_LOCAL_PORT=80

# Sets the container port for the docker container
HTTP_CONTAINER_PORT=80
```

Now you are ready!

### Docker

Versyx comes with a pre-configured docker environment for easy development.

To start the container:

```sh
docker-compose up -d
```

Once the container is running, head over to http://localhost to view your application, don't forget to add the port number if you have changed the value of `HTTP_LOCAL_PORT` to something other than the default port 80.

## How it works

Versyx follows the MVC pattern and uses a service container with powerful dependency injection in order to make development a breeze.

### Application Services

#### The Service Container

The [service container](https://github.com/versyxdigital/framework/blob/main/src/Service/Container.php) is a core component of Versyx, designed to manage the registration and resolution of application services.

The service container facilitates dependency injection ensuring services are decoupled and easily testable, and singleton support to ensure single instances through the application lifecycle.

#### Service Providers

Application services are created and registered to the container through [service providers](https://github.com/versyxdigital/framework/blob/main/src/Service/ServiceProviderInterface.php) using the `register()` method.

For example, here is Versyx's [ViewServiceProvider](https://github.com/versyxdigital/framework/blob/main/src/Providers/ViewServiceProvider.php)'s service registration:

```php
public function register(Container $container): Container
{
  $container[ViewEngineInterface::class] = new TwigEngine();
  return $container;
}
```

It creates a new view rendering service and binds it to the `ViewEngineInterface` contract in the container.

Service providers are instantiated inside the application's bootstrapping script and passed to the service container's `register()` method. Here is the registration for the view service provider:

```php
$app = new Versyx\Service\Container();
...
$app->register(new Versyx\Providers\ViewServiceProvider());
...
```


#### Service Resolution

Application services can be resolved from the container in two ways:

**Service locator**
```php
public function foo () {
  return app(MyService::class)->myServiceMethod('bar');
}
```

**Dependency Injection**

```php
public function foo (MyService $service) {
  return $service->myServiceMethod('bar');
}
```