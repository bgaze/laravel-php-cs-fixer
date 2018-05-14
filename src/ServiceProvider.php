<?php

namespace Bgaze\LaravelPhpCsFixer;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // Publish configuration.
        $this->publishes([__DIR__ . '/config/.php-cs-fixer' => base_path('.php-cs-fixer')], 'bgaze-php-cs-fixer-config');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\PhpCsFixerVersion::class,
                Console\PhpCsFixerReadme::class,
                Console\PhpCsFixerDescribe::class,
                Console\PhpCsFixerFix::class,
            ]);
        }
    }

}
