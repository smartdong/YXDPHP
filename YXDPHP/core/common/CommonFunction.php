<?php

function p($var) {
    if (is_bool($var)) {
        var_dump($var);
    } else if (is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre>" . print_r($var, true) . "</pre>";
    }
}

function get($param = false, $default = false) {
    if ($param !== false) {
        $data = isset($_GET[$param]) ? $_GET[$param] : false;
        if ($data !== false) {
            return htmlspecialchars($data);
        } else {
            return $default;
        }
    } else {
        return $_GET;
    }
}

function post($param = false, $default = false) {
    if ($param !== false) {
        $data = isset($_POST[$param]) ? $_POST[$param] : false;
        if ($data !== false) {
            return htmlspecialchars($data);
        } else {
            return $default;
        }
    } else {
        return $_POST;
    }
}

function request_method() {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return 'POST';
    } else {
        return 'GET';
    }
}

function redirect($url) {
    header('Location:'.$url);
}

function display404() {
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit();
}

function json($data) {
    header('Content-Type:application/json; charset=utf-8');
    return json_encode($data);
}
