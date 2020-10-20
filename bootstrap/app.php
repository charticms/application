<?php

require PATH . 'vendor/autoload' . EXT;
require PATH . 'system/helpers' . EXT;

use Charti\Core\{
    Support\Autoloader,
    Kernel\Application,
    Kernel\RegistryRuntime,
    Database\DatabaseWatcher,
};

// Register the autoloader
spl_autoload_register([Autoloader::class, 'load']);
// set_exception_handler(['System\\Error', 'exception']);
// set_error_handler(['System\\Error', 'native']);
// register_shutdown_function(['System\\Error', 'shutdown']);

/**
 * Initialize the Application
 */
$app = new Application;

define('CORE_VERSION', $app::VERSION);
define('ROOT', $app->root());
define('DOC_ROOT', $app->docRoot());
define('BASE_FOLDER', $app->baseFolder());
define('APP_ENV', strtolower(config('app.env')));
define('ADMIN_FOLDER', trim(config('app.admin'), '/'));
define('ASSETS_FOLDER', trim(config('app.assets'), '/'));
date_default_timezone_set(config('app.timezone'));

/*
 * Set autoload directories to include your app models and libraries
 */
Autoloader::directory([
    APP . 'libraries',
]);

/**
 * Try database connection with given credentials.
 * @see .env file in the root of your project 
 */
$dbConnection = new DatabaseWatcher;
if( ! $dbConnection->checkDatabaseConnection() ) {
    $app->start(APP_ENV, $installation = true);
    exit;
}

/**
 * Collects data in Registry for later use
 * @todo make Registry collect and store data on disk in flat arrays for quick response
 */
(new RegistryRuntime)->call();

Session::start();


/**
 * Start the application
 */
$app->start(APP_ENV);
