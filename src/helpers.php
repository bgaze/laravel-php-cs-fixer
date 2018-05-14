<?php

/**
 * Fix file(s) / dir(s) using PhpCsFixer.
 * 
 * @param mixed $path 
 * A path or an array of pathes
 * 
 * @param array $options
 * An array of options
 * 
 * @return boolean
 */
function php_cs_fixer($path, array $options = []) {
    if (!is_array($path)) {
        $path = [$path];
    }

    $options = array_merge($options, ['path' => $path]);
    
    return Artisan::call('php-cs-fixer:fix', $options);
}
