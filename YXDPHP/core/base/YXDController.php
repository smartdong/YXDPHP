<?php

namespace core\base;

class YXDController {

    public $option;

    public $path;
    public $viewPath;

    public $assign = [];

    public function __construct($option = []) {

        $this->option = $option;
        $this->path = $option['path'];

        if ($this->path) {
            $this->viewPath = rtrim($this->path,'controller').'view';
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
