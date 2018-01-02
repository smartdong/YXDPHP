<?php

namespace core\lib\interfaces;

interface Log {
    public function __construct($option);
    public function log($message, $context = array());
}
