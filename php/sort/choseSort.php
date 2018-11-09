<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/9
 * Time: 8:43
 */

/**
 * @param $arr
 * 选择排序
 *
 */
function choseSort(&$arr)
{
    $len = count($arr);
    for ($i=0;$i<$len;$i++){
        $min = $arr[$i];
        for ($j=$i+1;$j<$len;$j++){
            if ($arr[$j]<$min){
                $temp = $arr[$j];
                $arr[$j] = $min;
                $min = $temp;
            }
        }
        $arr[$i] = $min;
    }

}


$arr = [1,4,6,2,3,5,4];
choseSort($arr);
var_dump($arr);