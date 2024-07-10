# Versyx Starter Project

## About Versyx

This is the starter skeleton for projects using [Versyx](#).

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


