<?php

namespace Swoole\Http;

class Server extends \Swoole\Server
{


    public $setting;

    public $connections;

    public $host;

    public $port;

    public $type;

    public $mode;

    public $ports;

    public $master_pid;

    public $manager_pid;

    public $worker_id;

    public $taskworker;

    public $worker_pid;

    public $stats_timer;

    public function __construct($host, $port, $mode, $sock_type)
    {
    }

    public function __destruct()
    {
    }

    public function listen($host, $port, $sock_type)
    {
    }

    public function addlistener($host, $port, $sock_type)
    {
    }

    public function on($event_name, callable $callback)
    {
    }

    public function getCallback($event_name)
    {
    }

    public function set(array $settings)
    {
    }

    public function start()
    {
    }

    public function send($fd, $send_data, $server_socket)
    {
    }

    public function sendto($ip, $port, $send_data, $server_socket)
    {
    }

    public function sendwait($conn_fd, $send_data)
    {
    }

    public function exists($fd)
    {
    }

    public function exist($fd)
    {
    }

    public function protect($fd, $is_protected)
    {
    }

    public function sendfile($conn_fd, $filename, $offset, $length)
    {
    }

    public function close($fd, $reset)
    {
    }

    public function confirm($fd)
    {
    }

    public function pause($fd)
    {
    }

    public function resume($fd)
    {
    }

    public function task($data, $worker_id, ?callable $finish_callback)
    {
    }

    public function taskwait($data, $timeout, $worker_id)
    {
    }

    public function taskWaitMulti(array $tasks, $timeout)
    {
    }

    public function taskCo(array $tasks, $timeout)
    {
    }

    public function finish($data)
    {
    }

    public function reload()
    {
    }

    public function shutdown()
    {
    }

    public function stop($worker_id)
    {
    }

    public function getLastError()
    {
    }

    public function heartbeat($reactor_id)
    {
    }

    public function getClientInfo($fd, $reactor_id)
    {
    }

    public function getClientList($start_fd, $find_count)
    {
    }

    public function getWorkerId()
    {
    }

    public function getWorkerPid()
    {
    }

    public function getWorkerStatus($worker_id)
    {
    }

    public function getManagerPid()
    {
    }

    public function getMasterPid()
    {
    }

    public function connection_info($fd, $reactor_id)
    {
    }

    public function connection_list($start_fd, $find_count)
    {
    }

    public function sendMessage($message, $dst_worker_id)
    {
    }

    public function addProcess()
    {
    }

    public function stats()
    {
    }

    public function getSocket($port)
    {
    }

    public function bind($fd, $uid)
    {
    }

    public function after($ms, callable $callback)
    {
    }

    public function tick($ms, callable $callback)
    {
    }

    public function clearTimer($timer_id)
    {
    }

    public function defer(callable $callback)
    {
    }

}