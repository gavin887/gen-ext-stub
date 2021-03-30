<?php

namespace Swoole\WebSocket;

class CloseFrame extends \Swoole\WebSocket\Frame {

    
    public $fd;

    public $data;

    public $flags;

    public $finish;

    public $opcode;

    public $code;

    public $reason;

    public static function pack($data, $opcode, $flags) {
    }

    public static function unpack($data) {
    }

    public function __toString() {
    }

}