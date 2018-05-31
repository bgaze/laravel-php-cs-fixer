<?php

namespace Bgaze\LaravelPhpCsFixer;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * The package Service Provider
 * 
 * @author bgaze <benjamin@bgaze.fr>
 */
class ServiceProvider extends BaseServiceProvider {

    /**
     * Bootstrap the application services and publishes it's configuration.
     *
     * @return void
     */
    public function boot() {
        // Publish configuration.
        $this->publishes([__DIR__ . '/config/.php-cs-fixer' => base_path('.php-cs-fixer')], 'bgaze-php-cs-fixer-config');

        // Register helpers file.
        require __DIR__ . '/helpers.php';

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\PhpCsFixerVersion::class,
                Console\PhpCsFixerDescribe::class,
                Console\PhpCsFixerFix::class,
            ]);
        }
    }

}
