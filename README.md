Versyx follows the MVC pattern of development and uses a service container with **Dependency Injection (DI)**.

## Request Lifecycle

A new application instance is created for every HTTP request, this means that for each request, the entire framework bootstraps from scratch, including loading all service providers, controllers, routes, and any other configurations or settings. This is a normal and common design pattern in many modern web frameworks and is known as the **request-response cycle** or **stateless request handling**.

### How it works

Application services are registered through [Service Providers](#), which provide concrete implementations mapped to interfaces or string identifiers. For example, [LogServiceProvider](#) binds a [PSR-3 compliant](https://www.php-fig.org/psr/psr-3/) logger instance to our service container.

```php
public function register(Container $container)
{
    $container[LoggerInterface::class] = new Logger('app');

    try {
        $container[LoggerInterface::class]
          ->pushHandler(new StreamHandler($this->logPath(), Logger::DEBUG));
    } catch (\Exception $e) {
        return $e->getMessage();
    }

    return $container;
}
```

Following the example, this allows you to use the logger, either through dependency injection in application controllers:

```php
class MyController
{
  public function __construct(LoggerInterface $logger) {
    $logger->info('Hello World');
  }
}
```

Or through the global `app()` resolver function anywhere in the application:

```php
app(LoggerInterface::class)->info('Hello World')
```


Application controllers are preloaded into the service container along with resolved dependencies for injection.

This is achieved through [Reflection](#), to inspect the controllers and resolve their arguments using the application services that are already loaded into the container.

For example, [Controller](./src/Controllers/Controller.php) is the abstract base controller that all application controllers will extend, it contains two injected dependencies

```php
public function __construct(LoggerInterface $logger, ViewEngineInterface $view)
{
  $this->log = $logger;
  $this->view = $view;

  $this->data['title'] = env("APP_NAME");
}
```

To see how the controllers are automatically resolved in the container, see the logic [here](./config/controllers.php).

It is recommended to bind to interfaces in the container as this allows you to swap service implementations, which is useful for mocking, testing etc.

For example, you can swap the logger instance to anything else as long as it implements the PSR-3 `LoggerInterface`. To do this, you just modify the service provider:

MyCustomLogger.php:
```php
class CustomLogger implements LoggerInterface {
  ...
}
```
LogServiceProvider.php:
```php
public function register(Container $container)
{
    $container[LoggerInterface::class] = new CustomLogger(); // not Monolog\Logger();
    return $container;
}
```