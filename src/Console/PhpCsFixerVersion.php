<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;

/**
 * Laravel Console Command showing the current PHP-CS-Fixer version.
 * 
 * Usage : 
 * 
 * $ php artisan php-cs-fixer:version
 * 
 * No arguments nor options
 * 
 * @author bgaze <benjamin@bgaze.fr>
 */
class PhpCsFixerVersion extends Command {

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'php-cs-fixer:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display PHP-CS-Fixer version';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        passthru(base_path('vendor/bin/php-cs-fixer') . ' --version');
    }

}
