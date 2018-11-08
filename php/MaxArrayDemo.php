<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 00:49:55
 */

class MaxArrayDemo
{
    public function __construct()
    {
        $arr = [10, 30, -40, 50, 20, -32, 67, 21, -56];
        $maxSum = 0;
        $currentSum = 0;
        $start = 0;
        $end = 0;
        foreach ($arr as $key => $val) {
            if ($currentSum < 0) {
                $currentSum = $val;
                $start = $key;
            } else {
                $currentSum += $val;
            }
            if ($currentSum > $maxSum) {
                $maxSum = $currentSum;
                $end = $key;
            }
        }
        echo $maxSum, "\t", $start, "\t", $end;
    }
}

new MaxArrayDemo;