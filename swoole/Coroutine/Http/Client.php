<?php

namespace Swoole\Coroutine\Http;

class Client {

    
    public $errCode;

    public $errMsg;

    public $connected;

    public $host;

    public $port;

    public $ssl;

    public $setting;

    public $requestMethod;

    public $requestHeaders;

    public $requestBody;

    public $uploadFiles;

    public $downloadFile;

    public $downloadOffset;

    public $statusCode;

    public $headers;

    public $set_cookie_headers;

    public $cookies;

    public $body;

    public function __construct($host, $port, $ssl) {
    }

    public function __destruct() {
    }

    public function set(array $settings) {
    }

    public function getDefer() {
    }

    public function setDefer($defer) {
    }

    public function setMethod($method) {
    }

    public function setHeaders(array $headers) {
    }

    public function setBasicAuth($username, $password) {
    }

    public function setCookies(array $cookies) {
    }

    public function setData($data) {
    }

    public function addFile($path, $name, $type, $filename, $offset, $length) {
    }

    public function addData($path, $name, $type, $filename) {
    }

    public function execute($path) {
    }

    public function getpeername() {
    }

    public function getsockname() {
    }

    public function get($path) {
    }

    public function post($path, $data) {
    }

    public function download($path, $file, $offset) {
    }

    public function getBody() {
    }

    public function getHeaders() {
    }

    public function getCookies() {
    }

    public function getStatusCode() {
    }

    public function getHeaderOut() {
    }

    public function getPeerCert() {
    }

    public function upgrade($path) {
    }

    public function push($data, $opcode, $flags) {
    }

    public function recv($timeout) {
    }

    public function close() {
    }

}