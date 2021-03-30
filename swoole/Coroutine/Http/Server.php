<?php

namespace Swoole\Coroutine\Http;

final class Server {

    
    public $fd;

    public $host;

    public $port;

    public $ssl;

    public $settings;

    public $errCode;

    public $errMsg;

    public function __construct($host, $port, $ssl, $reuse_port) {
    }

    public function __destruct() {
    }

    public function set(array $settings) {
    }

    public function handle($pattern, callable $callback) {
    }

    private function onAccept() {
    }

    public function start() {
    }

    public function shutdown() {
    }

}