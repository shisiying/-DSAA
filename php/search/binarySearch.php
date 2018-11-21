<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/13
 * Time: 14:08
 */

/**
 * 二分查找的局限性
 * 二分查找依赖的是顺序表结构
 * 二分查找针对的是有序数据
 * 数据量太小不适合二分查找
 * 数据量太大也不适合二分查找
 * 时间复杂度是O（logn）
 */

/**
 * @param $arr
 * @param $value
 * @return float|int
 * 简单非递归方式二分查找法
 */
function binarySearch($arr,$value)
{
    $len = count($arr);

    $low =0;
    $high = $len-1;

    while($low<$high){
        //普通写法
        //$mid = ($low+$high)/2;

        //防止溢出的写法
        //$min = $low+($high-$low)/2;

        //追求极致的写法,计算机处理位运算比处理除法运算要快
        $mid = $low+(($high-$low)>>1);

        if ($arr[$mid]==$value){
            return $mid;
        }else if ($arr[$mid]<$value){
            $low = $mid+1;
        }else{
            $high = $mid-1;
        }
    }
    return -1;
}

/**
 * @param $arr
 * @param $low
 * @param $high
 * @param $value
 * @return int
 * 简单递归实现二分查找
 */
function  binarySearch_recursive($arr,$low,$high,$value)
{
    if ($low>$high) return -1;
    $mid = $low + (($high - $low) >> 1);
    if ($arr[$mid]==$value){
        return $mid;
    }else if($arr[$mid]<$value){
        return binarySearch_recursive($arr,$mid+1,$high,$value);
    }else{
        return binarySearch_recursive($arr,$low,$mid+1,$value);
    }

}

/**
 * @param $num
 * 使用二分查找法求平方根，精确到小数点后6位
 */
function sqrt_num($num){
    $low = 0;
    $mid = $num/2;
    $high = $num;
    while (abs($mid**2-$num)>0.000001){
        if ($mid**2<$num){
            $low =$mid;
        }else{
            $high = $mid;

        }
        $mid =($low+$high)/2;
    }
    return $mid;
}

var_dump(sqrt_num(5));

/**
 * @param $arr
 * @param $value
 * 变体一：查找第一个值等于给定值的元素
 */
function binarySearch_first($arr,$value){
    $low =0;
    $high = count($arr)-1;

    while($low<$high){
        $mid = $low +(($high-$low)>>1);
        if ($arr[$mid]>$value){
            $high =$mid+1;
        }else if($arr[$mid]<$value){
            $low = $mid+1;
        }else{
            //如果是第一个元素或者前一个元素不等于要查找的值
            if ($mid==0 || $arr[$mid-1]!=$value){
                return $mid;
            }else{
                $high = $mid-1;
            }
        }
    }
    return -1;
}

/**
 * @param $arr
 * @param $value
 * @return int
 * 变体二：查找最后一个值等于给定值的元素
 */
function binarySearch_last($arr,$value){
    $low =0;
    $high = count($arr)-1;

    while($low<$high){
        $mid = $low +(($high-$low)>>1);
        if ($arr[$mid]>$value){
            $high =$mid+1;
        }else if($arr[$mid]<$value){
            $low = $mid+1;
        }else{
            //如果是最后一个元素或者后一个元素不等于要查找的值
            if ($mid==count($arr)-1 || $arr[$mid+1]!=$value){
                return $mid;
            }else{
                $high = $mid-1;
            }
        }
    }
    return -1;
}

/**
 * @param $arr
 * @param $value
 * @return int
 * 变体三：查找第一个大于等于给定值的元素
 */
function binarySearch_greate($arr,$value){
    $low =0;
    $high = count($arr)-1;

    while($low<=$high){
        $mid = $low +(($high-$low)>>1);

        if ($arr[$mid]>=$value){
            if ($mid==0 || $arr[$mid-1]<$value){
                return $mid;
            }else{
                $high = $mid-1;
            }
        }else{
            $low = $mid+1;
        }
    }
    return -1;
}
/**
 * @param $arr
 * @param $value
 * @return int
 * 变体三：查找第一个小于等于给定值的元素
 */
function binarySearch_less($arr,$value){
    $low =0;
    $high = count($arr)-1;

    while($low<=$high){
        $mid = $low +(($high-$low)>>1);

        if ($arr[$mid]>$value){
           $high = $mid-1;
        }else{
            if ($mid==count($arr)-1 || $arr[$mid+1] > $value){
                return $mid;
            }else{
                $low = $mid+1;
            }
        }
    }
    return -1;
}

/**
 * @param $arr
 * @param $value
 * 循环数组查找值，以单调递增的循环有序数组为例子
 */
function binarySearch_loop($arr,$value)
{
    $low = 0;
    $high =count($arr)-1;

    while ($low<=$high){
        $mid = $low +(($high-$low)>>1);
        //前半部分是有序的
        if($arr[$mid]==$value){
            return $mid;
        }else if ($arr[$low]<$arr[$mid]){
            //判断value的值是在哪个范围
            //如果在有序范围内
           if ($arr[$low]<$value && $arr[$mid]>=$value){
               $high = $high-1;
           }else{
               $low = $mid+1;
           }
            //后半部分有序的
        }else if ($arr[$low]>$arr[$mid]){
            //判断值是在哪个范围
            if ($arr[$mid]<=$value && $arr[$high]>=$value){
                $low = $mid +1;
            }else{
                $high = $mid-1;
            }
        }
    }
    return -1;
}

$arr1 = [4,5,6,1,2,3];
var_dump(binarySearch_loop($arr1,2));

