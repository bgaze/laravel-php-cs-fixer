<?php

namespace Bgaze\LaravelPhpCsFixer\Console;

use Exception;
use Illuminate\Console\Command;

/**
 * This Console application fixes PHP file(s) using PHP-CS-Fixer.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class PhpCsFixerFix extends Command
{

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'php-cs-fixer:fix {path?* : The path to directory or file.}
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
     * @throws Exception
     */
    public function handle()
    {
        $params = [];

        // Prepare arguments.
        $this->preparePaths($params);

        // Get configuration file.
        $this->setConfigFile($params);

        // Prepare options.
        $this->prepareOptions($params);

        // Fix files.
        chdir(base_path());
        passthru($this->getCommand($params));
    }


    /**
     * Compile the PHP-CS-Fixer command to execute
     *
     * @param  array  $params  The PHP-CS-Fixer parameters array
     *
     * @return string
     */
    protected function getCommand(array &$params)
    {
        return base_path('vendor/bin/php-cs-fixer') . ' fix ' . implode(' ', $params);
    }


    /**
     * Add the list of file(s) and dir(s) to fix to PHP-CS-Fixer parameters
     *
     * @param  array  $params  The PHP-CS-Fixer parameters array
     *
     * @throws Exception
     */
    protected function preparePaths(array &$params)
    {
        foreach ($this->argument('path') as $path) {
            if (!file_exists(base_path($path))) {
                throw new Exception("Provided path doesn't exists : " . base_path($path));
            }

            $params[] = '"' . base_path($path) . '"';
        }
    }


    /**
     * Get the configuration file to use.
     *
     * @param  array  $params  The PHP-CS-Fixer parameters array
     *
     * @throws Exception
     */
    protected function setConfigFile(array &$params)
    {
        if ($this->option('config')) {
            $config = base_path($this->option('config'));
            if (!file_exists($config)) {
                throw new Exception("Provided config doesn't exists : " . $config);
            }
        } elseif (file_exists(base_path('.php_cs'))) {
            $config = base_path('.php_cs');
        } elseif (file_exists(base_path('.php_cs.dist'))) {
            $config = base_path('.php_cs.dist');
        } elseif (file_exists(base_path('.php-cs'))) {
            $config = base_path('.php-cs');
        } else {
            $config = realpath(__DIR__ . '/../config/.php_cs.dist');
        }

        $params[] = '--config="' . $config . '"';
    }


    /**
     * Adjust PHP-CS-Fixer parameters based on command options.
     *
     * @param  array  $params  The PHP-CS-Fixer parameters array
     *
     * @throws Exception
     */
    protected function prepareOptions(array &$params)
    {
        $params[] = '--path-mode="' . $this->option('path-mode') . '"';

        $params[] = '--allow-risky="' . ($this->option('allow-risky') ? 'yes' : 'no') . '"';

        $params[] = '--using-cache="' . ($this->option('using-cache') ? 'yes' : 'no') . '"';

        foreach (['dry-run', 'stop-on-violation', 'diff', 'quiet', 'verbose', 'ansi', 'no-ansi', 'no-interaction'] as $option) {
            if ($this->option($option)) {
                $params[] = "--{$option}";
            }
        }

        foreach (['rules', 'cache-file', 'format', 'show-progress'] as $option) {
            if ($this->option($option)) {
                $params[] = "--$option=\"" . $this->option($option) . '"';
            }
        }
    }

}
