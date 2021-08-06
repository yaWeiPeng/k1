<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/8/6 0006
 * Time: 11:25
 */

namespace module;


class Redis extends \Redis
{
    public static function redis() {
        $con = new \Redis();
        $con->connect(config('redis.host'), config('redis.port'), 5);
        return $con;
    }
}