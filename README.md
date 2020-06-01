# PHP CS Fixer for Laravel 5.5+

[![GitHub license](https://img.shields.io/github/license/bgaze/laravel-php-cs-fixer)](https://github.com/bgaze/laravel-php-cs-fixer/blob/master/LICENSE) 
![Maintenance](https://img.shields.io/maintenance/yes/2020)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/bgaze/laravel-php-cs-fixer)](https://github.com/bgaze/laravel-php-cs-fixer/releases) 
[![GitHub stars](https://img.shields.io/github/stars/bgaze/laravel-php-cs-fixer)](https://github.com/bgaze/laravel-php-cs-fixer/stargazers) 
[![Packagist](https://img.shields.io/packagist/dt/bgaze/laravel-php-cs-fixer)](https://packagist.org/packages/bgaze/laravel-php-cs-fixer)

This package allows to use [PHP-CS-Fixer](https://cs.sensiolabs.org/) right into Laravel 5.5+ applications 
to format PHP code.

# Documentation

Full documentation is available at [https://packages.bgaze.fr/laravel-php-cs-fixer](https://packages.bgaze.fr/laravel-php-cs-fixer)

# Quick start

Install this package using [Composer](https://getcomposer.org).

```
$ composer require bgaze/laravel-php-cs-fixer
```

To customize the configuration, publish it:

```
$ php artisan vendor:publish --tag=bgaze-php-cs-fixer-config
```

> **Notes :** Configuration returns an instance of `\PhpCsFixer\Config` and will be published into a `.php_cs.dist` file at the Laravel installation root.

Use `php-cs-fixer:fix` artisan command to fix files in your application:

```
$ php-cs-fixer:fix [options] path1 [path2 path3 ...]
```

Use `php_cs_fixer()` helper to fix files from the code:  

```php
// Quick.
php_cs_fixer('path/to/a/file/or/dir');

// Advanced.
php_cs_fixer(['path/to/file/or/dir/1', 'path/to/file/or/dir/2'], [
    '--allow-risky' => true,
    '--dry-run' => true,
    '--config' => 'path/to/a/config/file'
]);
```
