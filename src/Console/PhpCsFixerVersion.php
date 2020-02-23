<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;

/**
 * This console application shows the current PHP-CS-Fixer version.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class PhpCsFixerVersion extends Command
{

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
    public function handle()
    {
        passthru(base_path('vendor/bin/php-cs-fixer') . ' --version');
    }

}
