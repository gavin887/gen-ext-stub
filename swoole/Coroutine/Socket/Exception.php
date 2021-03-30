<?php

namespace Swoole\Coroutine\Socket;

class Exception extends \Swoole\Exception implements \Throwable {

    
    protected $message;

    protected $code;

    protected $file;

    protected $line;

    public function __construct($message, $code, $previous) {
    }

}