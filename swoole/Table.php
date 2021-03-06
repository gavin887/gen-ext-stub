<?php

namespace Swoole;

class Table implements \Iterator, \Traversable, \ArrayAccess, \Countable {

    public const TYPE_INT = 1;

    public const TYPE_STRING = 3;

    public const TYPE_FLOAT = 2;

    public $size;

    public $memorySize;

    public function __construct($table_size, $conflict_proportion) {
    }

    public function column($name, $type, $size) {
    }

    public function create() {
    }

    public function destroy() {
    }

    public function set($key, array $value) {
    }

    public function get($key, $field) {
    }

    public function count() {
    }

    public function del($key) {
    }

    public function delete($key) {
    }

    public function exists($key) {
    }

    public function exist($key) {
    }

    public function incr($key, $column, $incrby) {
    }

    public function decr($key, $column, $decrby) {
    }

    public function getSize() {
    }

    public function getMemorySize() {
    }

    public function offsetExists($offset) {
    }

    public function offsetGet($offset) {
    }

    public function offsetSet($offset, $value) {
    }

    public function offsetUnset($offset) {
    }

    public function rewind() {
    }

    public function next() {
    }

    public function current() {
    }

    public function key() {
    }

    public function valid() {
    }

}