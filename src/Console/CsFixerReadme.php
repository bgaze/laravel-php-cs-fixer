<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;

/**
 * The CsFixerFix class.
 */
class CsFixerReadme extends Command {

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cs-fixer:readme';

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
