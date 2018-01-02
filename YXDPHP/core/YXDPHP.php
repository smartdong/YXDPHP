<?php

namespace core;

use \core\lib\Log;
use \core\lib\Route;

class YXDPHP {

    public static function load($class) {
        $classPath = ROOT_PATH.DIRECTORY_SEPARATOR.str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';
        if (is_file($classPath)) {
            include_once "$classPath";
        } else {
            return false;
        }
    }

    public static function run() {
        Log::init();
        Route::route();

        $controllerFile = Route::$controllerFile;
        $controllerClass = Route::$controllerClass;
        $action = Route::$action;

        include_once "$controllerFile";
        $c = new $controllerClass(Route::$controllerPath);
        $c->$action();
    }
}
