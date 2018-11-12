<?php

/**
 * 找出待排序的数组中最大和最小的元素；
 * 统计数组中每个值为i的元素出现的次数，存入数组C的第i项；
 * 对所有的计数累加（从C中的第一个元素开始，每一项和前一项相加）；
 * 反向填充目标数组：将每个元素i放在新数组的第C(i)项，每放一个元素就将C(i)减去1。
 */

function countSort(&$arr){
    $len = count($arr);
    $maxValue = $arr[0];

    for ($i=1;$i<$len;$i++){
        if ($arr[$i]>$maxValue){
            $maxValue = $arr[$i];
        }
    }

    //申请一个计数数组
    $counter = [];
    for ($i=0;$i<=$maxValue;$i++){
        $counter[$i]=0;
    }

    //统计每个值出现的频次
    for ($i=0;$i<$len;$i++){
        if (isset($counter[$arr[$i]])){
            $counter[$arr[$i]]++;
        }
    }

    //依次累加,可以知道每个元素的序号
    for ($i=1;$i<=$maxValue;$i++){
        $counter[$i] = $counter[$i-1]+$counter[$i];
    }

    //计数排序的关键，从后往前扫，排序后的index需要减1，因为counter的值为元素的排名
    for ($i = $len-1;$i>=0;$i--){
        $index = $counter[$arr[$i]]-1;
        $result[$index]=$arr[$i];
        $counter[$arr[$i]]--;
    }

    for ($i=0;$i<$len;$i++){
        $arr[$i] = $result[$i];
    }
}

$arr1 = array(5, 3, 5, 2, 8,4,3,12,32,34,53,1321,23);
var_dump($arr1);
countSort($arr1);
var_dump($arr1);
