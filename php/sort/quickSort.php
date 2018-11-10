<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/10
 * Time: 16:26
 */


$a1 = [1,4,6,2,3,5,4];
$a2 = [2, 2, 2, 2];
$a3 = [4, 3, 2, 1];
$a4 = [5, -1, 9, 3, 7, 8, 3, -2, 9];
quickSort($a1);
print_r($a1);
quickSort($a2);
print_r($a2);
quickSort($a3);
print_r($a3);
quickSort($a4);
print_r($a4);

/**
 * @param $arr
 * 快速排序法
 */
function quickSort(&$arr)
{
    $len = count($arr);
    quickSort_c($arr,0,$len-1);

}

function quickSort_c(array &$arr,$left,$right)
{
    if ($left>=$right) return;

    $q = partition($arr,$left,$right);
    quickSort_c($arr,$left,$q-1);
    quickSort_c($arr,$q+1,$right);

}

//分区
function partition(&$arr,$left,$right)
{
    $privot =$arr[$right];
    $i = $left;

    for ($j=$left;$j<$right;++$j){
        if ($arr[$j]<$privot){
            $temp = $arr[$j];
            $arr[$j] = $arr[$i];
            $arr[$i] = $temp;

            ++$i;
        }
    }

    //将privot与i指的位置互换
    $temp = $arr[$right];
    $arr[$right] = $arr[$i];
    $arr[$i] = $temp;

    return $i;
}

