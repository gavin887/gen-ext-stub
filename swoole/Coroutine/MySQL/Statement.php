<?php

namespace Swoole\Coroutine\MySQL;

class Statement {

    
    public $id;

    public $affected_rows;

    public $insert_id;

    public $error;

    public $errno;

    public function execute($params, $timeout) {
    }

    public function fetch($timeout) {
    }

    public function fetchAll($timeout) {
    }

    public function nextResult($timeout) {
    }

    public function recv($timeout) {
    }

    public function close() {
    }

}