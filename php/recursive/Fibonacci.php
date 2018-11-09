<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/9
 * Time: 10:45
 */

/**
 * @param $num
 * 使用递归的方式实现斐波那契数列，也叫作爬楼梯
 * 斐波那契数列: 0、1、1、2、3、5、8
 * 可以这样理解 f0 = 0; f1 = 1; fn = f(n-1) + f(n - 2) （n >= 2）
 */
function Fibonacci($num)
{
    if ($num==1 || $num==2){
        return 1;
    }else{
        return Fibonacci($num-1)+Fibonacci($num-2);
    }
}
echo '---------------------- 递归方式求斐波那契数列 ----------------------' . PHP_EOL . PHP_EOL;
var_dump(Fibonacci(5));
echo '---------------------- 递归方式求斐波那契数列 ----------------------' . PHP_EOL . PHP_EOL;

/***
 * @param $num
 * @return int
 * 使用循环的方式实现斐波那契数列
 */
function Fib($num)
{
    if ($num==1 || $num==2){
        return 1;
    }

    $sum=0;
    $f1 =0;
    $f2 =1;

    for ($i=0;$i<$num-1;$i++){
        $sum =$f1 + $f2;
        $f1 = $f2;
        $f2 = $sum;
    }
    return $sum;
}

echo '---------------------- 非递归方式求斐波那契数列 ----------------------' . PHP_EOL . PHP_EOL;
var_dump(Fib(5));
echo '---------------------- 非递归方式求斐波那契数列 ----------------------' . PHP_EOL . PHP_EOL;