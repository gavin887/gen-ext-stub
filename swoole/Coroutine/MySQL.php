<?php

namespace Swoole\Coroutine;

class MySQL {

    
    public $serverInfo;

    public $sock;

    public $connected;

    public $connect_errno;

    public $connect_error;

    public $affected_rows;

    public $insert_id;

    public $error;

    public $errno;

    public function __construct() {
    }

    public function __destruct() {
    }

    public function getDefer() {
    }

    public function setDefer($defer) {
    }

    public function connect(array $server_config) {
    }

    public function query($sql, $timeout) {
    }

    public function fetch() {
    }

    public function fetchAll() {
    }

    public function nextResult() {
    }

    public function prepare($query, $timeout) {
    }

    public function recv() {
    }

    public function begin($timeout) {
    }

    public function commit($timeout) {
    }

    public function rollback($timeout) {
    }

    public function escape($string, $flags) {
    }

    public function close() {
    }

}