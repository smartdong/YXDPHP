<?php

namespace core\base;

class YXDController {

    public $controllerPath;
    public $viewPath;
    public $assign = [];

    public function __construct($controllerPath = false) {
        if ($controllerPath) {
            $this->controllerPath = $controllerPath;
            $this->viewPath = rtrim($controllerPath,'controller').'view';
        }
    }

    public function display($view, $absolutePath = false) {

        if ($absolutePath === false) {
            $view = $this->viewPath.DIRECTORY_SEPARATOR.$view;
        }

        if (is_file($view)) {
            extract($this->assign);
            include "$view";
        } else {
            display404();
        }
    }
}
