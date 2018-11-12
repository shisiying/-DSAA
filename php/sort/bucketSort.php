<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/12
 * Time: 11:26
 */
/**
 * @param $min 排序数组中最小值
 * @param $max 排序数组中最大值
 * @param $array 需要排序的数组
 * 木桶排序 严格上来说是计数排序，计数排序时桶排序的一种特殊情况
 * 对于数据范围不大，非负整数排序的場景
 */

function bucketSort($min,$max,$array)
{
    //填充木桶
    for ($i=$min;$i<=$max;$i++){
        $buckteArr[$i]=0;
    }

    //开始标识木桶
    for ($i=0;$i<=count($array)-1;$i++){
        $buckteArr[$array[$i]]++;
    }

    $sortArr = array();
    //开始从木桶中拿出数据
    for($i = $min; $i <= $max; $i ++)
    {
        if (isset($buckteArr[$i])){
            for($j = 1; $j <= $buckteArr[$i]; $j++)
            { //这一行主要用来控制输出多个数字
                $sortArr[] = $i;
            }
        }
    }
    return $sortArr;

}

$arr1 = array(5, 3, 5, 2, 8);

var_dump(bucketSort(2,8,$arr1));


/**
 * 对大小写进行排序
 */

$arr2 = ['D','a','F','B','c','A','z'];

function sortUpandLow(&$arr)
{
    $len = count($arr);
    for ($i=0;$i<$len-1;$i++){
        if ($i ==$len-$i-1){
          break;
        } else if (ord($arr[$i])<ord($arr[$len-$i-1])){
            $temp = $arr[$len-$i-1];
            $arr[$len-$i-1] = $arr[$i];
            $arr[$i] = $temp;
        }
    }
}
var_dump($arr2);
sortUpandLow($arr2);
var_dump($arr2);