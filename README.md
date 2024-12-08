# Laravel audit login is a another package for laravel framework. The purpose is to auditing login events

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fikrimastor/audit-login.svg?style=flat-square)](https://packagist.org/packages/fikrimastor/audit-login)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/fikrimastor/audit-login/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fikrimastor/audit-login/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/fikrimastor/audit-login/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/fikrimastor/audit-login/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fikrimastor/audit-login.svg?style=flat-square)](https://packagist.org/packages/fikrimastor/audit-login)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

## Installation

You can install the package via composer:

```bash
composer require fikrimastor/audit-login
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="audit-login-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="audit-login-config"
```

This is the contents of the published config file:

```php
return [
    'enabled' => env('AUDIT_LOGIN_ENABLED', true),
    'drivers' => [
        'database' => [
            'table' => env('AUDIT_LOGIN_DATABASE_TABLE', 'audit-logins'),
            'connection' => env('AUDIT_LOGIN_DATABASE_CONNECTION', 'mysql'),
        ],
    ],
    ...
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="audit-login-views"
```

## Usage

```php

```

## Testing

```bash
composer test
```
Testing not yet implemented. But open for contribution, please refer to [CONTRIBUTING](CONTRIBUTING.md) for details.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Fikri Mastor](https://github.com/fikrimastor)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
