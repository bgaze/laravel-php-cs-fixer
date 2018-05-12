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
        $this->publishes([__DIR__ . '/config/.php_cs' => base_path('.php_cs')], 'bgaze-php-cs-fixer-config');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\CsFixerVersion::class,
                Console\CsFixerReadme::class,
                Console\CsFixerDescribe::class,
                Console\CsFixerFix::class,
            ]);
        }
    }

}
