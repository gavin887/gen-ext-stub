<?php

namespace Swoole;

class Exception extends \Exception implements \Throwable {

    
    protected $message;

    protected $code;

    protected $file;

    protected $line;

    public function __construct($message, $code, $previous) {
    }

}