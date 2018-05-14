<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * The PhpCsFixerFix class.
 */
class PhpCsFixerFix extends Command {

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'php-cs-fixer:fix {path* : The path to directory or file.}
        {--allow-risky : Allow risky fixers.}
        {--dry-run : Only shows which files would have been modified, leaving your files unchanged.}
        {--stop-on-violation : Stop execution on first violation.}
        {--diff : Also produce diff for each file.}
        {--using-cache : Enable cache usage.}
        {--path-mode=override : Specify path mode (override|intersection).}
        {--config= : The path to a .php-cs-fixer file.}
        {--rules= : The rules to apply for fixer (comma separated).}
        {--cache-file= : The path to the cache file.}
        {--format= : To output results in other formats.}
        {--show-progress=none : Type of progress indicator (none|run-in|estimating).}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix php coding standards for directories or files';

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

        // Get configuration file.

        if ($this->option('config') && file_exists(base_path($this->option('config')))) {
            $config = base_path($this->option('config'));
        } elseif (file_exists(base_path('.php-cs-fixer'))) {
            $config = base_path('.php-cs-fixer');
        } else {
            $config = __DIR__ . '/../config/.php-cs-fixer';
        }

        $params[] = '--config="' . $config . '"';

        // Prepare options.

        $params[] = '--path-mode="' . $this->option('path-mode') . '"';

        $params[] = '--allow-risky="' . ($this->option('allow-risky') ? 'yes' : 'no') . '"';

        $params[] = '--using-cache="' . ($this->option('using-cache') ? 'yes' : 'no') . '"';

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
