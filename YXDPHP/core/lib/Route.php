<?php

namespace core\lib;

class Route {

    public static $module;
    public static $controller;
    public static $action;

    public static $controllerPath;
    public static $controllerFile;
    public static $controllerClass;

    public static function route() {
        //默认 uri 中只包含 模块、控制器、方法   所有参数均在 ？之后拼接
        //需要考虑没有重定向的情况   暂时默认会有 apache 进行重定向
        $uri = $_SERVER['REQUEST_URI'];
        if (strpos($uri,'?')) {
            $uri = explode('?',$uri)[0];
        }
        $uri = trim($uri,DIRECTORY_SEPARATOR);
        $paths = explode(DIRECTORY_SEPARATOR,$uri);

        $config = \core\lib\Config::all('route');

        if (count($paths) < 2) {
            self::$module = $config['default_module'];
            self::$controller = $config['controller'];
            self::$action = $config['action'];
        } else {
            self::$action = array_pop($paths);
            self::$controller = array_pop($paths);
            self::$module = (count($paths) > 0) ? implode(DIRECTORY_SEPARATOR,$paths) : $config['default_module'];
        }

        $controllerRelativePath = DIRECTORY_SEPARATOR.APP_FOLDER.DIRECTORY_SEPARATOR.self::$module.DIRECTORY_SEPARATOR.'controller';
        $controllerClass = $controllerRelativePath.DIRECTORY_SEPARATOR.ucfirst(self::$controller).'Controller';
        $controllerPath = ROOT_PATH.$controllerRelativePath;
        $controllerFile = ROOT_PATH.$controllerClass.'.php';

        if (is_file($controllerFile)) {
            self::$controllerPath = $controllerPath;
            self::$controllerFile = $controllerFile;
            self::$controllerClass = str_replace(DIRECTORY_SEPARATOR,'\\',$controllerClass);
        } else {
            display404();
        }
    }
}