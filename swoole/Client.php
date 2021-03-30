<?php

namespace Swoole;

class Client {

    public const MSG_OOB = 1;

    public const MSG_PEEK = 2;

    public const MSG_DONTWAIT = 64;

    public const MSG_WAITALL = 256;

    public const SHUT_RDWR = 2;

    public const SHUT_RD = 0;

    public const SHUT_WR = 1;

    public $errCode;

    public $sock;

    public $reuse;

    public $reuseCount;

    public $type;

    public $id;

    public $setting;

    public function __construct($type, $async, $id) {
    }

    public function __destruct() {
    }

    public function set(array $settings) {
    }

    public function connect($host, $port, $timeout, $sock_flag) {
    }

    public function recv($size, $flag) {
    }

    public function send($data, $flag) {
    }

    public function sendfile($filename, $offset, $length) {
    }

    public function sendto($ip, $port, $data) {
    }

    public function shutdown($how) {
    }

    public function enableSSL() {
    }

    public function getPeerCert() {
    }

    public function verifyPeerCert() {
    }

    public function isConnected() {
    }

    public function getsockname() {
    }

    public function getpeername() {
    }

    public function close($force) {
    }

    public function getSocket() {
    }

}