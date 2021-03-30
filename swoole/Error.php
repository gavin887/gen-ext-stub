<?php

namespace Swoole;

class Error extends \Error implements \Throwable {

    
    protected $message;

    protected $code;

    protected $file;

    protected $line;

    public function __construct($message, $code, $previous) {
    }

}