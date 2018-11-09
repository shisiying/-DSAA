<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/6
 * Time: 9:41
 */

require "array.php";

/**
 * 初始化数据
 */
$myarr1 = new MyArray(20);
for ($i=0;$i<9;$i++){
    $myarr1->insert($i,$i+1);
}
$myarr1->printData();


/**
 * 正常插入数据
 */
$code = $myarr1->insert(6,999);
echo "insert at 6:code{$code}\n";
$myarr1->printData();
/**
 * 正常删除数据
 */
list($code,$value) = $myarr1->delete(6);
echo "delete at 6: code:{$code},value:{$value}\n";
$myarr1->printData();

/**
 * 越界插入数据
 */
$code = $myarr1->insert(11,999);
echo "insert at 11:code：{$code}\n";
$myarr1->printData();

/**
 * 越界删除数据
 */
list($code,$value) = $myarr1->delete(-1);
echo "delete at 6: code:{$code},value:{$value}\n";
$myarr1->printData();

/**
 * 根据索引查找数据
 */
list($code, $value) = $myarr1->find(0);
echo "find at 0: code:{$code}, value:{$value}\n";

