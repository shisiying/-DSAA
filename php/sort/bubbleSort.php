<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/8
 * Time: 23:12
 */

/**
 * Class bubbleSort
 * 冒泡排序算法
 */
function bubbleSort(&$arr)
{
    $len = count($arr);
    for ($i=0;$i<$len;$i++){

        $flag = false;
        for ($j=0;$j<$len-$i-1;$j++){
            if ($arr[$j]>$arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1]=$temp;
                $flag =true;
            }
        }
        if (!$flag){
            break;
        }
    }
}

$arr = [1,4,6,2,3,5,4];
bubbleSort($arr);
var_dump($arr);