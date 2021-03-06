<?php

namespace Swoole;

class Process {

    public const IPC_NOWAIT = 256;

    public const PIPE_MASTER = 1;

    public const PIPE_WORKER = 2;

    public const PIPE_READ = 3;

    public const PIPE_WRITE = 4;

    public $pipe;

    public $msgQueueId;

    public $msgQueueKey;

    public $pid;

    public $id;

    private $callback;

    public static function wait($blocking) {
    }

    public static function signal($signal_no, $callback) {
    }

    public static function alarm($usec, $type) {
    }

    public static function kill($pid, $signal_no) {
    }

    public static function daemon($nochdir, $noclose, $pipes) {
    }

    public static function setAffinity(array $cpu_settings) {
    }

    public function __construct(callable $callback, $redirect_stdin_and_stdout, $pipe_type, $enable_coroutine) {
    }

    public function __destruct() {
    }

    public function setPriority($which, $priority) {
    }

    public function getPriority($which) {
    }

    public function set(array $settings) {
    }

    public function setTimeout($seconds) {
    }

    public function setBlocking($blocking) {
    }

    public function useQueue($key, $mode, $capacity) {
    }

    public function statQueue() {
    }

    public function freeQueue() {
    }

    public function start() {
    }

    public function write($data) {
    }

    public function close() {
    }

    public function read($size) {
    }

    public function push($data) {
    }

    public function pop($size) {
    }

    public function exit($exit_code) {
    }

    public function exec($exec_file, $args) {
    }

    public function exportSocket() {
    }

    public function name($process_name) {
    }

}