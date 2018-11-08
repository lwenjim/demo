<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 01:09:15
 */

class DateDemo
{
    public function __construct()
    {
        $preMonTimeStamp = strtotime('-1 week') - date('w') * 86400;
        $days = intdiv((time() - $preMonTimeStamp), 86400);
        $map = [
            '1' => '一',
            '2' => '二',
            '3' => '三',
            '4' => '四',

            '5' => '五',
            '6' => '六',
            '7' => '日',
        ];
        $ret = [date('Y/m/d', $preMonTimeStamp)];
        for ($i = 1; $i <= $days; $i++) {
            if ($i <= 6) {
                $ret[] = date('Y/m/d', $preMonTimeStamp + $i * 86400);
            } else {
                if ($i == $days) {
                    $ret[] = '今天';
                } elseif ($days > 8 && $i == $days - 1) {
                    $ret[] = '昨天';
                } else {
                    $index = date('w', $preMonTimeStamp + $i * 86400) + 1;
                    $ret[] = '周' . $map[$index];
                }
            }
        }
        print_r($ret);
    }
}

new DateDemo();