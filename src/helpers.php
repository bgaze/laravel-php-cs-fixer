<?php

use Illuminate\Support\Facades\Artisan;

if (! function_exists('php_cs_fixer')) {
  /**
   * Fix file(s) / dir(s) using PhpCsFixer.
   *
   * @param  mixed  $path
   * A path or an array of paths
   *
   * @param  array  $options
   * An array of options
   *
   * @return boolean
   */
  function php_cs_fixer($path, array $options = []) {
      return Artisan::call('php-cs-fixer:fix', array_merge($options, [
          'path' => (array) $path
      ]));
  }
}
