<?php

/**
 * This is the bootstrap application file that puts your Chartí instance on and running.
 * 
 * Chartí CMS and all its products are fully open-source and
 * released under multiple licenses.
 *
 * 
 * The Application Directory - What is yours is yours.
 * @license Unlicensed.
 * @author  Your & Your company/team
 * 
 * Anything related to the projects instance stays in /app directory and is yours, fully non licensed.
 * The API provided can be used without any costs 
 * 
 * 
 * Anything related to Chartí CMS packages and products are released under AGPL license, and
 * by using Chartí you agree with the license terms and conditions but also with our guidelines.
 * @license  AGPL
 * @author  George Lemon & Chartí CMS <hi@charti.dev>
 *
 *
 * Vendor licenses and terms of use.
 * The Vendor packages required by Chartí CMS are released under MIT license
 * @license  MIT
 * @author   Multiple awesome Authors (for full list please see the composer.json in root of the project).
 * 
 * 
 * @see  https://charti.dev
 * @author George Lemon 
 */

require PATH . 'vendor/autoload' . EXT;

use Charti\Core\{Kernel\Application, Kernel\RegistryRuntime, Database\DatabaseWatcher};

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

/**
 * Try database connection with given credentials.
 * @see .env file in the root of your project 
 */
if( ! (new DatabaseWatcher)->checkDatabaseConnection() ) {
    $app->start(APP_ENV, $installation = true);
    exit;
}

/**
 * Collects data in Registry for later use
 * @todo make Registry collect and store data on disk in flat arrays for quick response
 */
(new RegistryRuntime)->call();

/**
 * Force creation of the session
 */
Session::start();

/**
 * Start the application
 */
$app->start(APP_ENV);
