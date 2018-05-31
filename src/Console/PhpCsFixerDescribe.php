<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;

/**
 * This Console application describes a rule or ruleset of PHP-CS-Fixer.
 * 
 * @author bgaze <benjamin@bgaze.fr>
 */
class PhpCsFixerDescribe extends Command {

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'php-cs-fixer:describe {name : Name of rule / set.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Describe rule / ruleset of fixer.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        passthru(base_path('vendor/bin/php-cs-fixer') . ' describe ' . $this->argument('name'));
    }

}
