<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create()
        ->exclude('bootstrap')
        ->exclude('storage')
        ->exclude('vendor')
        ->in(getcwd())
        ->name('*.php')
        ->name('*.phpt')
        ->notName('*.blade.php')
        ->notName('_ide_helper.php')
        ->ignoreDotFiles(true)
        ->ignoreVCS(true);

$rules = [
    '@Symfony' => true,
    'binary_operator_spaces' => [
        'align_double_arrow' => true,
        'align_equals' => true,
    ],
    'braces' => [
        'allow_single_line_closure' => true,
    ],
    'no_empty_comment' => false,
    'no_extra_consecutive_blank_lines' => [
        'tokens' => [
            'curly_brace_block',
            'parenthesis_brace_block',
            'extra',
            'throw',
            'use',
        ]
    ],
    'new_with_braces' => false,
];

return Config::create()
                ->setFinder($finder)
                ->setRules($rules)
                ->setUsingCache(true);
