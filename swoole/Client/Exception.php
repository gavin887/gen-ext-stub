<?php

namespace Swoole\Client;

use Throwable;

class Exception extends \Swoole\Exception implements Throwable
{


    protected $message;

    protected $code;

    protected $file;

    protected $line;

    public function __construct($message, $code, $previous)
    {
    }

}