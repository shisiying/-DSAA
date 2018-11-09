<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/6
 * Time: 9:56
 */

require "SingleLinkedList.php";


/**
 * 判断有头指针的单链表保存的字符串是否回文
 */

function isPalindrome(SingleLinkedList $list)
{
    if ($list->getLength() <= 1) {
        return true;
    }
    $pre = null;
    $slow = $list->head->next;
    $fast = $list->head->next;
    $remainNode = null;

    // 找单链表中点 以及 反转前半部分链表
    while ($fast != null && $fast->next != null) {
        $fast = $fast->next->next;
        // 单链表反转关键代码 三个指针
        $remainNode = $slow->next;
        $slow->next = $pre;
        $pre = $slow;
        $slow = $remainNode;
    }
    // 链表长度为偶数的情况，需要往后挪一位
    if ($fast != null) {
        $slow = $slow->next;
    }
    // 从中间开始开始逐个比较，一个往左走，一个
    while ($slow != null) {
        if ($slow->data != $pre->data) {
            return false;
        }
        $slow = $slow->next;
        $pre = $pre->next;
    }
    return true;
}

/**
 * 测试
 */
$list = new SingleLinkedList();
$list->insert('a');
$list->insert('c');
$list->insert('c');
$list->insert('c');
$list->insert('b');
$list->insert('a');

var_dump(isPalindrome($list));