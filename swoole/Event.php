<?php

namespace Swoole;

class Event {

    
    
    public static function add($fd, ?callable $read_callback, ?callable $write_callback, $events) {
    }

    public static function del($fd) {
    }

    public static function set($fd, ?callable $read_callback, ?callable $write_callback, $events) {
    }

    public static function isset($fd, $events) {
    }

    public static function dispatch() {
    }

    public static function defer(callable $callback) {
    }

    public static function cycle(?callable $callback, $before) {
    }

    public static function write($fd, $data) {
    }

    public static function wait() {
    }

    public static function rshutdown() {
    }

    public static function exit() {
    }

}