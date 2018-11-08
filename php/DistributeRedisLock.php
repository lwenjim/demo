<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 20:04:16
 */

class DistributeRedisLock
{
    public function __construct()
    {
        $redis = $this->getRedis();
        $couponCount = 10;
        $redisQueueKey = 'coupon:container';
        $redisLockKey = 'coupon:lock';
        $redisCountKey = 'coupon:count';
        $redis->del($redisQueueKey);
        $redis->del($redisCountKey);
        $redis->del($redisLockKey);
        for($i=0;$i<$couponCount;$i++)
        {
            $redis->lpush($redisQueueKey, 1000+$i );
        }
        print_r($redis->lrange($redisQueueKey,0,-1));

        for($i=0;$i<100;$i++)
        {
            if(pcntl_fork())continue;
            $redis = $this->getRedis();
            if($redis->get($redisCountKey)>=$couponCount)exit;
            if($redis->setnx($redisLockKey,time() + 600)==1)
            {
                usleep(rand(1000,5000));
                $myCoupon = $redis->rpop($redisQueueKey);
                echo getmypid()."\t".$myCoupon."\n";
                $redis->incr($redisCountKey);
                $redis->del($redisLockKey);
            }else{
                $expire = $redis->get($redisLockKey);
                if($expire != null && $expire < time()){
                    $expire2 = $redis->getset($redisLockKey,time() + 600);
                    if( $expire2 == null || $expire == $expire2 )
                    {
                        usleep(rand(1000,5000));
                        $myCoupon = $redis->rpop($redisQueueKey);
                        echo getmypid()."\t".$myCoupon."\n";
                        $redis->incr($redisCountKey);
                        $redis->del($redisLockKey);
                    }
                }
            }
            exit;
        }
    }

    public function getRedis()
    {
        $redis = new Redis();
        $redis->connect('127.0.0.1');
        return $redis;
    }
}
new DistributeRedisLock;