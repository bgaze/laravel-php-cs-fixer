# PHP CS Fixer for Laravel 5.5+

[![Total Downloads](https://poser.pugx.org/bgaze/laravel-php-cs-fixer/downloads)](https://packagist.org/packages/bgaze/laravel-php-cs-fixer)
[![Latest Stable Version](https://poser.pugx.org/bgaze/laravel-php-cs-fixer/v/stable)](https://packagist.org/packages/bgaze/laravel-php-cs-fixer)
[![Latest Unstable Version](https://poser.pugx.org/bgaze/laravel-php-cs-fixer/v/unstable)](https://packagist.org/packages/bgaze/laravel-php-cs-fixer)
[![License](https://poser.pugx.org/bgaze/laravel-php-cs-fixer/license)](https://packagist.org/packages/bgaze/laravel-php-cs-fixer)

This package allows to use [PHP-CS-Fixer](https://cs.sensiolabs.org/) right into Laravel 5.5+ applications 
to format PHP code following PSR-1 and PSR-2 coding standards.

> Any comment, suggestion or contribution is welcomed. 

# Credits

This package is an adapted copy of [https://github.com/JackieDo/Artisan-PHP-CS-Fixer](https://github.com/JackieDo/Artisan-PHP-CS-Fixer).  
Credits and many thanks to [JackieDo](https://github.com/JackieDo) :-)

# Provided features

* A PHP-CS-Fixer installation right into Laravel 5.5+ projects.
* Commands to execute PHP-CS-Fixer via Laravel Artisan CLI :
    + **php-cs-fixer:fix :**         Fix php coding standards for directories or files.
    + **php-cs-fixer:describe :**    Describe rule / ruleset of fixer.
    + **php-cs-fixer:version :**     Display PHP-CS-Fixer version.
* An helper to fix files from the code : **php_cs_fixer**.

# Installation

Install this package using [Composer](https://getcomposer.org).

```$ composer require bgaze/laravel-php-cs-fixer```

To customize the configuration, publish it :

```$ php artisan vendor:publish --tag=php-cs-fixer```

> **Note :**  
> Configuration isn't a standard Laravel config files as it returns an instance of `PhpCsFixer\Config`.  
> It will be published into a `.php-cs-fixer` file at the Laravel installation root.

# Usage

Please see [PHP-CS-Fixer documentation](https://cs.sensiolabs.org/#usage) for more details.

## Fix

Fix your code with PHP Coding Standards.

### From Artisan CLI

Usage:

```$ php artisan php-cs-fixer:fix [options] [path/to/dir/or/file]```

Syntax:

Usage:

```$ php-cs-fixer:fix [options] path1 [path2 path3 ...]```

Arguments:

```path                             Path to directory or file (multiple values allowed).```

Options:

```
--allow-risky                    Allow risky fixers.
--dry-run                        Only shows which files would have been modified, leaving your files unchanged.
--stop-on-violation              Stop execution on first violation.
--diff                           Also produce diff for each file.
--using-cache                    Enable cache usage.
--path-mode[=PATH-MODE]          Specify path mode (override|intersection). [default: "override"]
--config[=CONFIG]                The path to a .php-cs-fixer file.
--rules[=RULES]                  The rules to apply for fixer (comma separated).
--cache-file[=CACHE-FILE]        The path to the cache file.
--format[=FORMAT]                To output results in other formats.
--show-progress[=SHOW-PROGRESS]  Type of progress indicator (none|run-in|estimating). [default: "none"]
-h, --help                       Display this help message
-q, --quiet                      Do not output any message
-V, --version                    Display this application version
--ansi                           Force ANSI output
--no-ansi                        Disable ANSI output
-n, --no-interaction             Do not ask any interactive question
    --env[=ENV]                  The environment the command should run under
-v|vv|vvv, --verbose             Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

Examples:

```
// Only shows which all files in your project would have been modified, leaving your files unchanged.
$ php artisan php-cs-fixer:fix --dry-run

// Really fixes all files in your project.
$ php artisan php-cs-fixer:fix

// Only fixes all files in the `app` directory.
$ php artisan php-cs-fixer:fix app

// Only fixes all files in the `app` directory with specific configuration file.
$ php artisan php-cs-fixer:fix --config="path/to/config/file" app
```

### From PHP code

The **php_cs_fixer()** helper wraps **php-cs-fixer:fix** command and allows to fix files right from the code.  
It returns the exit code of the command.

Usage :

```php
// $path : a path or an array of pathes.
// $options : an array of options.
php_cs_fixer($path, $options);
```

Exemples :

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

## Describe rule or set

Usage:

```$ php-cs-fixer:describe name```

Arguments:

```name                  Name of rule / set.```

Options:

```
-h, --help            Display this help message
-q, --quiet           Do not output any message
-V, --version         Display this application version
--ansi                Force ANSI output
--no-ansi             Disable ANSI output
-n, --no-interaction  Do not ask any interactive question
--env[=ENV]           The environment the command should run under
-v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

## Version

Displays PHP-CS-Fixer version installed.

Usage:

```$ php artisan php-cs-fixer:version```
