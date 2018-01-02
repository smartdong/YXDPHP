<?php

namespace core\lib;

class Log {

    public static $driver;

    public static function init() {
        $config = \core\lib\Config::all('log');
        $driverClass = '\core\lib\driver\log\\'.$config['driver'];
        self::$driver = new $driverClass($config['option']);
    }

    public static function log($message, $context = array()) {
        if (self::$driver) {
            self::$driver->log($message, $context);
        }
    }
}
