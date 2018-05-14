<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;

/**
 * The PhpCsFixerReadme class.
 */
class PhpCsFixerReadme extends Command {

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'php-cs-fixer:readme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display PHP-CS-Fixer README content';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        passthru(base_path('vendor/bin/php-cs-fixer') . ' readme');
    }

}
