<?php

namespace Swoole\WebSocket;

class Frame {

    
    public $fd;

    public $data;

    public $opcode;

    public $flags;

    public $finish;

    public static function pack($data, $opcode, $flags) {
    }

    public static function unpack($data) {
    }

    public function __toString() {
    }

}