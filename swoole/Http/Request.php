<?php

namespace Swoole\Http;

class Request
{


    public $fd;

    public $streamId;

    public $header;

    public $server;

    public $cookie;

    public $get;

    public $files;

    public $post;

    public $tmpfiles;

    public static function create($options)
    {
    }

    public function rawContent()
    {
    }

    public function getContent()
    {
    }

    public function getData()
    {
    }

    public function parse($data)
    {
    }

    public function isCompleted()
    {
    }

    public function getMethod()
    {
    }

    public function __destruct()
    {
    }

}