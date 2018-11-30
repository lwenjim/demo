<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 20:23:54
 */

class StrToMultiSub
{
    public function __construct()
    {
         $str = 'abc12349';
         $strlen = strlen($str);
         $arr = [];
         for($i=0;$i<$strlen;$i++)
         {
             $arr[] = $str{$i};
         }
         $ret = [];
         function func($left,&$ret,$arr)
         {
             if(count($arr) <= 1)
             {
                 $ret[] = $left.$arr[0];
                 return;
             }
             for($i=0;$i<count($arr);$i++)
             {
                 $tmp = array_diff($arr,[$arr[$i]]);
                 $tmp = array_values($tmp);
                 func($left.$arr[$i],$ret,$tmp);
             }
         }
         func('',$ret,$arr);

         print_r($ret);
    }
}
new StrToMultiSub;