<?php

namespace Swoole\Coroutine;

class Socket {

    
    public $fd;

    public $domain;

    public $type;

    public $protocol;

    public $errCode;

    public $errMsg;

    public function __construct($domain, $type, $protocol) {
    }

    public function bind($address, $port) {
    }

    public function listen($backlog) {
    }

    public function accept($timeout) {
    }

    public function connect($host, $port, $timeout) {
    }

    public function checkLiveness() {
    }

    public function peek($length) {
    }

    public function recv($length, $timeout) {
    }

    public function recvAll($length, $timeout) {
    }

    public function recvLine($length, $timeout) {
    }

    public function recvWithBuffer($length, $timeout) {
    }

    public function recvPacket($timeout) {
    }

    public function send($data, $timeout) {
    }

    public function readVector($io_vector, $timeout) {
    }

    public function readVectorAll($io_vector, $timeout) {
    }

    public function writeVector($io_vector, $timeout) {
    }

    public function writeVectorAll($io_vector, $timeout) {
    }

    public function sendFile($filename, $offset, $length) {
    }

    public function sendAll($data, $timeout) {
    }

    public function recvfrom(&$peername, $timeout) {
    }

    public function sendto($addr, $port, $data) {
    }

    public function getOption($level, $opt_name) {
    }

    public function setProtocol(array $settings) {
    }

    public function setOption($level, $opt_name, $opt_value) {
    }

    public function sslHandshake() {
    }

    public function shutdown($how) {
    }

    public function cancel($event) {
    }

    public function close() {
    }

    public function getpeername() {
    }

    public function getsockname() {
    }

}