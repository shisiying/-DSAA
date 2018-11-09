<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/6
 * Time: 23:18
 * 用链栈实现四则运算
 */

function expression($str)
{
    $str = str_replace(' ','',$str);
    $arr = preg_split('/([\+\-\*\/\(\)])/', $str, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

    var_dump($arr);
    //存放数字
    $numStack =[];
    //存放运算符
    $operStack = [];
    $operStack[] = NULL;

    for ($i=0;$i<count($arr);$i++){
        if (ord($arr[$i])>=48 && ord($arr[$i]<=57)){
            array_push($numStack,$arr[$i]);
            continue;
        }
        switch ($arr[$i]){
            case '+':
            case '-':
                $arrLen =count($operStack);
                while($operStack[$arrLen-1]==='*' || $operStack[$arrLen-1]==='/' || $operStack[$arrLen-1] === '-'){
                    compute($numStack,$operStack);
                    $arrLen--;
                }
                array_push($operStack,$arr[$i]);
                break;
            case '*':
                $arrLen = count($operStack);
                while($operStack[$arrLen-1]==='/'){
                    compute($numStack,$operStack);
                    $arrLen--;
                }
                array_push($operStack,$arr[$i]);
                break;
            case '/':
            case '(':
                array_push($operStack,$arr[$i]);
                break;
            case ')':
                $arrLen = count($operStack);
                while ($operStack[$arrLen-1]!='('){
                    compute($numStack,$operStack);
                    $arrLen--;
                }
                array_pop($operStack);
                break;
            default:
                throw new \Exception('不支持的运算符',1);
                break;
        }
    }

    $arrLen = count($operStack);
    while ($operStack[$arrLen-1]!==null){
        compute($numStack,$operStack);
        $arrLen--;
    }
    echo array_pop($numStack);
}

function compute(&$numStack,&$operStack){
    $num = array_pop($numStack);
    switch (array_pop($operStack)){
        case '*':
            array_push($numStack,array_pop($numStack)*$num);
            break;
        case '/':
            array_push($numStack,array_pop($numStack)/$num);
            break;
        case '+':
            array_push($numStack,array_pop($numStack)+$num);
            break;
        case '-':
            array_push($numStack,array_pop($numStack)-$num);
            break;
        case '(':
            throw new \Exception('不匹配的(',2);
            break;
    }
}

expression('-1+2-(1+2*3)');
echo PHP_EOL;
eval('echo -1+2-(1+2*3);');