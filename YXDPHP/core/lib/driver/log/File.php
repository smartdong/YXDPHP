<?php

namespace core\lib\driver\log;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class File implements \core\lib\interfaces\Log {

    public $logger;

    public function __construct($option) {
        $this->logger = new Logger('LOG');
        $path = $option['path'].DIRECTORY_SEPARATOR.date('Y-m-d-H-i').'.log';
        $this->logger->pushHandler(new StreamHandler($path, Logger::INFO));
    }

    public function log($message, $context = array()) {
        $this->logger->info($message, $context);
    }
}

