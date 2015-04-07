# php-env-loader

Load PHP environment variables from various sources. Built-in implementation loads them from a .json file.

NOTE: Laravel 5 has a built-in implementation to load from an .ini-style .env file, and that is recommended instead of using this library.

## Installation

Add `npmweb/php-env-loader` as a requirement to `composer.json`:

```javascript
{
    "require": {
        "npmweb/php-env-loader": "1.*"
    }
}
```

Update your packages with `composer update`.

Add the service provider to your Laravel service providers list:

```php
return array(
    ...
    'providers' => array(
        ...
        'NpmWeb\PhpEnvLoader\Laravel\EnvLoaderServiceProvider',
    ),
);
```

## Usage

Create a `.env.example.json` at your project root and fill it with placeholders for any values you want to load:

```json
{
  "DB_HOST": "localhost",
  "DB_SCHEMA": "myappname",
  "DB_USERNAME": "myappname",
  "DB_PASSWORD": "myappname"
}
```

Then copy it to `.env.json`, git-ignore it so it won't be committed to version control, and add real values in there:

```json
{
  "DB_HOST": "db.mycompany.com",
  "DB_SCHEMA": "myappname",
  "DB_USERNAME": "myappname",
  "DB_PASSWORD": "swordfish"
}
```

You can then use PHP's built-in `getenv()` method to get these values and fill them into config files or anywhere else you need them:

```php

    ...
    'mysql' => array(
        'driver'    => 'mysql',
        'host'      => getenv('DB_HOST'),
        'database'  => getenv('DB_SCHEMA'),
        'username'  => getenv('DB_USERNAME'),
        'password'  => getenv('DB_PASSWORD'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ),
    ...

);


```

## License

This code is open-sourced under the MIT license. For more information,
see the LICENSE file.
