<?php

namespace Swoole\Coroutine;

class Redis {

    
    public $host;

    public $port;

    public $setting;

    public $sock;

    public $connected;

    public $errType;

    public $errCode;

    public $errMsg;

    public function __construct($config) {
    }

    public function __destruct() {
    }

    public function connect($host, $port, $serialize) {
    }

    public function getAuth() {
    }

    public function getDBNum() {
    }

    public function getOptions() {
    }

    public function setOptions($options) {
    }

    public function getDefer() {
    }

    public function setDefer($defer) {
    }

    public function recv() {
    }

    public function request(array $params) {
    }

    public function close() {
    }

    public function set($key, $value, $timeout, $opt) {
    }

    public function setBit($key, $offset, $value) {
    }

    public function setEx($key, $expire, $value) {
    }

    public function psetEx($key, $expire, $value) {
    }

    public function lSet($key, $index, $value) {
    }

    public function get($key) {
    }

    public function mGet($keys) {
    }

    public function del($key, $other_keys) {
    }

    public function hDel($key, $member, $other_members) {
    }

    public function hSet($key, $member, $value) {
    }

    public function hMSet($key, $pairs) {
    }

    public function hSetNx($key, $member, $value) {
    }

    public function delete($key, $other_keys) {
    }

    public function mSet($pairs) {
    }

    public function mSetNx($pairs) {
    }

    public function getKeys($pattern) {
    }

    public function keys($pattern) {
    }

    public function exists($key, $other_keys) {
    }

    public function type($key) {
    }

    public function strLen($key) {
    }

    public function lPop($key) {
    }

    public function blPop($key, $timeout_or_key, $extra_args) {
    }

    public function rPop($key) {
    }

    public function brPop($key, $timeout_or_key, $extra_args) {
    }

    public function bRPopLPush($src, $dst, $timeout) {
    }

    public function lSize($key) {
    }

    public function lLen($key) {
    }

    public function sSize($key) {
    }

    public function scard($key) {
    }

    public function sPop($key) {
    }

    public function sMembers($key) {
    }

    public function sGetMembers($key) {
    }

    public function sRandMember($key, $count) {
    }

    public function persist($key) {
    }

    public function ttl($key) {
    }

    public function pttl($key) {
    }

    public function zCard($key) {
    }

    public function zSize($key) {
    }

    public function hLen($key) {
    }

    public function hKeys($key) {
    }

    public function hVals($key) {
    }

    public function hGetAll($key) {
    }

    public function debug($key) {
    }

    public function restore($ttl, $key, $value) {
    }

    public function dump($key) {
    }

    public function renameKey($key, $newkey) {
    }

    public function rename($key, $newkey) {
    }

    public function renameNx($key, $newkey) {
    }

    public function rpoplpush($src, $dst) {
    }

    public function randomKey() {
    }

    public function pfadd($key, $elements) {
    }

    public function pfcount($key) {
    }

    public function pfmerge($dstkey, $keys) {
    }

    public function ping() {
    }

    public function auth($password) {
    }

    public function unwatch() {
    }

    public function watch($key, $other_keys) {
    }

    public function save() {
    }

    public function bgSave() {
    }

    public function lastSave() {
    }

    public function flushDB() {
    }

    public function flushAll() {
    }

    public function dbSize() {
    }

    public function bgrewriteaof() {
    }

    public function time() {
    }

    public function role() {
    }

    public function setRange($key, $offset, $value) {
    }

    public function setNx($key, $value) {
    }

    public function getSet($key, $value) {
    }

    public function append($key, $value) {
    }

    public function lPushx($key, $value) {
    }

    public function lPush($key, $value) {
    }

    public function rPush($key, $value) {
    }

    public function rPushx($key, $value) {
    }

    public function sContains($key, $value) {
    }

    public function sismember($key, $value) {
    }

    public function zScore($key, $member) {
    }

    public function zRank($key, $member) {
    }

    public function zRevRank($key, $member) {
    }

    public function hGet($key, $member) {
    }

    public function hMGet($key, $keys) {
    }

    public function hExists($key, $member) {
    }

    public function publish($channel, $message) {
    }

    public function zIncrBy($key, $value, $member) {
    }

    public function zAdd($key, $score, $value) {
    }

    public function zPopMin($key, $count) {
    }

    public function zPopMax($key, $count) {
    }

    public function bzPopMin($key, $timeout_or_key, $extra_args) {
    }

    public function bzPopMax($key, $timeout_or_key, $extra_args) {
    }

    public function zDeleteRangeByScore($key, $min, $max) {
    }

    public function zRemRangeByScore($key, $min, $max) {
    }

    public function zCount($key, $min, $max) {
    }

    public function zRange($key, $start, $end, $scores) {
    }

    public function zRevRange($key, $start, $end, $scores) {
    }

    public function zRangeByScore($key, $start, $end, $options) {
    }

    public function zRevRangeByScore($key, $start, $end, $options) {
    }

    public function zRangeByLex($key, $min, $max, $offset, $limit) {
    }

    public function zRevRangeByLex($key, $min, $max, $offset, $limit) {
    }

    public function zInter($key, $keys, $weights, $aggregate) {
    }

    public function zinterstore($key, $keys, $weights, $aggregate) {
    }

    public function zUnion($key, $keys, $weights, $aggregate) {
    }

    public function zunionstore($key, $keys, $weights, $aggregate) {
    }

    public function incrBy($key, $value) {
    }

    public function hIncrBy($key, $member, $value) {
    }

    public function incr($key) {
    }

    public function decrBy($key, $value) {
    }

    public function decr($key) {
    }

    public function getBit($key, $offset) {
    }

    public function lInsert($key, $position, $pivot, $value) {
    }

    public function lGet($key, $index) {
    }

    public function lIndex($key, $integer) {
    }

    public function setTimeout($key, $timeout) {
    }

    public function expire($key, $integer) {
    }

    public function pexpire($key, $timestamp) {
    }

    public function expireAt($key, $timestamp) {
    }

    public function pexpireAt($key, $timestamp) {
    }

    public function move($key, $dbindex) {
    }

    public function select($dbindex) {
    }

    public function getRange($key, $start, $end) {
    }

    public function listTrim($key, $start, $stop) {
    }

    public function ltrim($key, $start, $stop) {
    }

    public function lGetRange($key, $start, $end) {
    }

    public function lRange($key, $start, $end) {
    }

    public function lRem($key, $value, $count) {
    }

    public function lRemove($key, $value, $count) {
    }

    public function zDeleteRangeByRank($key, $start, $end) {
    }

    public function zRemRangeByRank($key, $min, $max) {
    }

    public function incrByFloat($key, $value) {
    }

    public function hIncrByFloat($key, $member, $value) {
    }

    public function bitCount($key) {
    }

    public function bitOp($operation, $ret_key, $key, $other_keys) {
    }

    public function sAdd($key, $value) {
    }

    public function sMove($src, $dst, $value) {
    }

    public function sDiff($key, $other_keys) {
    }

    public function sDiffStore($dst, $key, $other_keys) {
    }

    public function sUnion($key, $other_keys) {
    }

    public function sUnionStore($dst, $key, $other_keys) {
    }

    public function sInter($key, $other_keys) {
    }

    public function sInterStore($dst, $key, $other_keys) {
    }

    public function sRemove($key, $value) {
    }

    public function srem($key, $value) {
    }

    public function zDelete($key, $member, $other_members) {
    }

    public function zRemove($key, $member, $other_members) {
    }

    public function zRem($key, $member, $other_members) {
    }

    public function pSubscribe($patterns) {
    }

    public function subscribe($channels) {
    }

    public function unsubscribe($channels) {
    }

    public function pUnSubscribe($patterns) {
    }

    public function multi() {
    }

    public function exec() {
    }

    public function eval($script, $args, $num_keys) {
    }

    public function evalSha($script_sha, $args, $num_keys) {
    }

    public function script($cmd, $args) {
    }

}