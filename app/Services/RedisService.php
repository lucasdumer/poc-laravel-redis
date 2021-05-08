<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class RedisService 
{
    public function get(string $key)
    {
        return json_decode(Redis::get($key));
    }

    public function set(string $key, $value): void
    {
        Redis::set($key, json_encode($value));
    }

    public function clear(string $key): void
    {
        $this->set($key, '');
    }
}
