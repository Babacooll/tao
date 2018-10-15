# Introdution

The project is based on Symfony.

The files modified are :

* src/* (except src/Kernel.php)
* tests/*
* data/*
* config/packages/dev/data_sources.yaml
* config/packages/test/data_sources.yaml
* config/services.yaml
* composer.json
* swagger.yaml

# Installation

## Composer

``` 
composer install
```

## Docker

```
docker-compose up -d
```

# Tests

```
vendor/bin/phpunit
```

# API Documentation

The API documentation is available in `swagger.yml`.

# Add new data source

In order to add a new data source :

* Create a new repository implementing the `TestTakerRepositoryInterface`.
* Add the repository to the switch in the `ListTestTakerService`.
