<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

// Directories to exclude when fixing files.
$exclude = [
    'bootstrap/cache',
    'vendor',
    'storage',
    'node_modules',
    'nbproject',
];

// Filename patterns to exclude when fixing files.
$notName = [
    '*.md',
    '*.yml',
    '*.xml',
    '_ide_helper.php',
    '_ide_helper_models.php',
    '.phpstorm.meta.php'
];

// Default rules set to use when fixing files.
// See : https://gistlog.co/sixlive/2862a2185c76988838acaa45687a575c
$rules = [
    '@PSR2' => true,
    'array_indentation' => true,
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'no_blank_lines_after_phpdoc' => true,
    'no_extra_blank_lines' => [
        'tokens' => ['curly_brace_block', 'extra', 'parenthesis_brace_block', 'square_brace_block', 'throw', 'use'],
    ],
    'no_multiline_whitespace_before_semicolons' => true,
    'no_short_echo_tag' => true,
    'no_unused_imports' => true,
    'no_useless_else' => true,
    'not_operator_with_successor_space' => true,
    'ordered_imports' => [
        'sortAlgorithm' => 'length',
    ],
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_var_without_name' => true,
    'single_quote' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline_array' => true,
    'trim_array_spaces' => true,
];

// Instantiate finder.
$finder = Finder::create()
    ->in(getcwd())
    ->exclude($exclude)
    ->name('*.php')
    ->notName($notName)
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

// Instantiate & return config.
return Config::create()
    ->setFinder($finder)
    ->setRules($rules);
