<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 20:06:13
 */

class ArrayTop3
{
    public function __construct()
    {
         $arr = [3,8,7,5,2,1,9,6,4];
         $ret = [$arr[0]];

         for($i=1;$i<count($arr);$i++)
         {
            for($j=0;$j<count($ret);$j++)
            {
                 if($ret[$j] > $arr[$i])
                 {
                     $ret = array_merge(array_slice($ret,0,$j>1?$j-1:0),[$arr[$i]],array_slice($ret,$j));
                     break;
                 }
                 if( $arr[$i] > $ret[$j] )
                 {
                     if(isset($ret[$j+1]))
                     {
                         if($arr[$i] < $ret[$j+1])
                         {
                             $ret = array_merge(array_slice($ret,0,$j+1),[$arr[$i]],array_slice($ret,$j+1));
                             break;
                         }
                     }else{
                         $ret[] = $arr[$i];
                         break;
                     }
                 }
            }
         }
         print_r($ret);
    }
}
new ArrayTop3;