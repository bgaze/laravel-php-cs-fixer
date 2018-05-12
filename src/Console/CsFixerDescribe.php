<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * The CsFixerFix class.
 */
class CsFixerDescribe extends Command {

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'bgaze:cs-fixer:describe {name : Name of rule / set.}';

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
        $params = [];

        // Prepare arguments.

        foreach ($this->argument('path') as $path) {
            $params[] = '"' . base_path($path) . '"';
        }

        // Prepare options.

        $params[] = '--path-mode="' . $this->option('path-mode') . '"';

        $params[] = '--allow-risky="' . ($this->option('allow-risky') ? 'yes' : 'no') . '"';

        $params[] = '--using-cache="' . ($this->option('using-cache') ? 'yes' : 'no') . '"';

        if ($this->option('config') && file_exists(base_path($this->option('config')))) {
            $params[] = '--config="' . base_path($this->option('config')) . '"';
        } elseif (file_exists(base_path('.php_cs'))) {
            $params[] = '--config="' . base_path('.php_cs') . '"';
        } else {
            $params[] = '--config="' . __DIR__ . '/../../config/.php_cs"';
        }

        foreach (['dry-run', 'stop-on-violation', 'diff', 'quiet', 'verbose', 'ansi', 'no-ansi', 'no-interaction'] as $option) {
            if ($this->option($option)) {
                $params[] = "--$option";
            }
        }

        foreach (['rules', 'cache-file', 'format', 'show-progress'] as $option) {
            if ($this->option($option)) {
                $params[] = "--$option=\"" . $this->option($option) . '"';
            }
        }

        // Fix files.

        chdir(base_path());
        passthru(base_path('vendor/bin/php-cs-fixer') . ' fix ' . implode(' ', $params));
    }

}
