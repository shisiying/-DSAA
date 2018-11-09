<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/8
 * Time: 23:24
 */


/**
 * @param $arr
 * 插入排序法
 */

function insertSort(&$arr)
{
    $len =count($arr);
    for ($i=1;$i<$len;$i++){
        $value = $arr[$i];
        $j = $i-1;
        while($j>=0){
            if ($value>$arr[$j]){
                $arr[$j+1] = $arr[$j];
            }else{
                break;
            }
            $j--;
        }
        $arr[$j+1] = $value;
    }
}

$arr = [1,4,6,2,3,5,4];
insertSort($arr);
var_dump($arr);