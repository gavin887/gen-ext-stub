<?php

namespace Swoole\Http;

class Response
{


    public $fd;

    public $socket;

    public $header;

    public $cookie;

    public $trailer;

    public static function create($server, $fd)
    {
    }

    public function initHeader()
    {
    }

    public function isWritable()
    {
    }

    public function cookie($name, $value, $expires, $path, $domain, $secure, $httponly, $samesite, $priority)
    {
    }

    public function setCookie($name, $value, $expires, $path, $domain, $secure, $httponly, $samesite, $priority)
    {
    }

    public function rawcookie($name, $value, $expires, $path, $domain, $secure, $httponly, $samesite, $priority)
    {
    }

    public function status($http_code, $reason)
    {
    }

    public function setStatusCode($http_code, $reason)
    {
    }

    public function header($key, $value, $format)
    {
    }

    public function setHeader($key, $value, $format)
    {
    }

    public function trailer($key, $value)
    {
    }

    public function ping()
    {
    }

    public function goaway()
    {
    }

    public function write($content)
    {
    }

    public function end($content)
    {
    }

    public function sendfile($filename, $offset, $length)
    {
    }

    public function redirect($location, $http_code)
    {
    }

    public function detach()
    {
    }

    public function upgrade()
    {
    }

    public function push($data, $opcode, $flags)
    {
    }

    public function recv()
    {
    }

    public function close()
    {
    }

    public function __destruct()
    {
    }

}