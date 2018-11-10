<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/10
 * Time: 12:47
 */


$arr = [4, 5, 6, 1, 3, 2];
$length = count($arr);
$p = 0;
$r = $length - 1;
$result = mergeSort($arr, $p, $r);
var_dump($result);


/**
 * 归并排序
 */
function mergeSort(array $arr,$p,$r)
{
    if ($p>=$r){
        return [$arr[$r]];
    }

    $q = (int)($p+$r)/2;
    $left = mergeSort($arr,$p,$q);
    $right = mergeSort($arr,$q+1,$r);
    return merge($left,$right);

}

//合并
function merge(array $left,array $right)
{
    $tmp = [];
    $i=0;
    $j=0;
    $leftlength = count($left);
    $rightlength = count($right);

    do{
        if ($left[$i] <=$right[$j]){
            $tmp[] = $left[$i++];
        }else{
            $tmp[] = $right[$j++];
        }
    }while($i<$leftlength && $j<$rightlength);

    //将left或者right剩余的插入到tmp数组中
    $start = $i;
    $end = $leftlength;
    $copyArr = $left;

    if ($j<$rightlength){
        $start = $j;
        $end =$rightlength;
        $copyArr = $right;
    }

    for (;$start<$end;$start++){
        $tmp[] = $copyArr[$start];
    }

    return $tmp;
}