<?php

define('ROOT_PATH',     realpath('.'.DIRECTORY_SEPARATOR));

define('APP_FOLDER',    'application');
define('CONFIG_FOLDER', 'config');
define('CORE_FOLDER',   'core');

define('APP_PATH',      ROOT_PATH.DIRECTORY_SEPARATOR.APP_FOLDER);
define('CONFIG_PATH',   ROOT_PATH.DIRECTORY_SEPARATOR.CONFIG_FOLDER);
define('CORE_PATH',     ROOT_PATH.DIRECTORY_SEPARATOR.CORE_FOLDER);

define('DEBUG', true);

date_default_timezone_set('PRC');

include 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

if (DEBUG) {
    ini_set('display_errors',1);
} else {
    ini_set('display_errors',0);
}

include CORE_PATH.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'CommonFunction.php';
include CORE_PATH.DIRECTORY_SEPARATOR.'YXDPHP.php';

spl_autoload_register('\core\YXDPHP::load');

\core\YXDPHP::run();