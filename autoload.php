<?php

// Check php version
if (version_compare(PHP_VERSION, '7.4') < 0) {
    echo 'PHP 7.4 or higher, you are running ' . PHP_VERSION;
    exit;
}

define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));
define('VERSION', '1.0');

define('PATH', __DIR__ . DS);
// Shared path is useful when you have multiple projects developed with Charti,
// all under the same server. So instead installing same vendors multiple times
// you can share the default vendors between applications.
define('SHARED_PATH', PATH);
define('APP', PATH . 'anchor' . DS);
define('SYS', PATH . 'system' . DS);
define('PLUG', PATH . 'plugins' . DS);
define('CORE_ASSETS', PATH . 'public/core/assets/');
define('CACHE_PATH', PATH . 'bootstrap/storage/cache' . DS);
define('EXT', '.php');

/**
 * Bootstrap the app
 */
require __DIR__ . '/bootstrap/app' . EXT;
