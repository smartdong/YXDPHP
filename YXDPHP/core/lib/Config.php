<?php

namespace core\lib;

class Config {

    public static $config = [];

    public static function get($fileName, $param) {
        $config = self::all($fileName);
        if ($config) {
            if (isset($config[$param])) {
                return $config[$param];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function all($fileName) {
        if (isset(self::$config[$fileName])) {
            return self::$config[$fileName];
        } else {
            $filePath = CONFIG_PATH.DIRECTORY_SEPARATOR.$fileName.'.php';
            if (is_file($filePath)) {
                $config = include "$filePath";
                self::$config[$fileName] = $config;
                return $config;
            } else {
                return false;
            }
        }
    }
}
