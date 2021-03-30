<?php

namespace Swoole\Server;

final class Task
{


    public $data;

    public $dispatch_time;

    public $id;

    public $worker_id;

    public $flags;

    public static function pack($data)
    {
    }

    public function finish($data)
    {
    }

}