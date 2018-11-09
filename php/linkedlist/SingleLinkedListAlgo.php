<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/6
 * Time: 15:29
 * 单链表常见的相关算法
 *
 * reverse 单链表反转
 * checkCircle 链表中环的检测
 * mergeSortedList 有序列表的合并
 * deleteLastKth 删除链表倒数第n个结点
 * findMiddleNode 求链表的中间结点
 */

require "SingleLinkedList.php";
class SingleLinkedListAlgo
{
    public $list;

    /**
     * SingleLinkedListAlgo constructor.
     * @param SingleLinkedList|null $list
     * 初始化单链表
     */
    public function __construct(SingleLinkedList $list=null)
    {
        $this->list = $list;
    }

    /**
     * @param SingleLinkedList $list
     * 设置单链表
     */
    public function setList(SingleLinkedList $list)
    {
        $this->list = $list;
    }

    /**
     * 单链表反转
     * 三个指针反转来逆置单链表
     * preNode 指向前一个结点
     * curNode 指向当前结点
     * remainNode 指向当前结点的下一个节点（为了未逆序的链表，为了断开curNode的next）
     */
    public function reverse()
    {
        if (null == $this->list || null == $this->list->head || null == $this->list->head->next) {
            return false;
        }

        $preNode = null;
        $curNode = $this->list->head->next;
        $remainNode = null;

        // 保存头结点，稍后指向反转后的链表
        $headNode = $this->list->head;

        // 断开头结点的next指针
        $this->list->head->next = null;

        while ($curNode != null) {
            $remainNode = $curNode->next;
            $curNode->next = $preNode;

            $preNode = $curNode;
            $curNode = $remainNode;
        }

        // 头结点指向反转后的链表
        $headNode->next = $preNode;
        return true;
    }

    /**
     * @return bool
     * 快慢指针判断是否有环
     */
    public function checkCircle()
    {
        if (null == $this->list || null == $this->list->head || null == $this->list->head->next) {
            return false;
        }

        $slow  = $this->list->head->next;
        $fast = $this->list->head->next;

        while($fast!=null && $fast->next!=null){
            $fast = $fast->next->next;
            $slow = $slow->next;
            if ($slow===$fast){
                return true;
            }
        }
        return false;
    }


    /**
     * @param SingleLinkedList $listA
     * @param SingleLinkedList $listB
     * @return SingleLinkedList
     * 合并两个有序序列
     */
    public function mergeSortedList(SingleLinkedList $listA,SingleLinkedList $listB)
    {
        if ($listA==null){
            return $listB;
        }

        if ($listB==null){
            return $listA;
        }

        $pListA = $listA->head->next;

        $pListB = $listB->head->next;

        $newList = new SingleLinkedList();
        $newHead = $newList->head;
        $newRootNode = $newHead;

        while($pListA!=null && $pListB!=null){
            if ($pListA->data<=$pListB->data){
                $newRootNode->next = $pListA;
                $pListA = $pListA->next;
            }else{
                $newRootNode->next = $pListB;
                $pListB = $pListB->next;
            }

            $newRootNode = $newRootNode->next;
        }
        //如果第一个链表未处理完，拼接到新链表后面
        if ($pListA!=null){
            $newRootNode->next = $pListA;
        }

        //如果第一个链表未处理完，拼接到新链表后面
        if ($pListB!=null){
            $newRootNode->next =$pListB;
        }
        return $newList;
    }

    /**
     * @param $index
     * @return bool
     * 删除链表导数第n个结点
     */
    public function deleteLastKth($index)
    {
        if (null == $this->list || null == $this->list->head || null == $this->list->head->next) {
            return false;
        }
        $i = 1;
        $slow = $this->list->head;
        $fast = $this->list->head;
        while ($fast != null && $i < $index) {
            $fast = $fast->next;
            ++$i;
        }
        if ($fast == null) {
            return true;
        }
        $pre = null;
        while($fast->next != null) {
            $pre = $slow;
            $slow = $slow->next;
            $fast = $fast->next;
        }
        if (null == $pre) {
            $this->list->head->next = $slow->next;
        } else {
            $pre->next = $pre->next->next;
        }
        return true;
    }

    /**
     * @return bool
     * 寻找中间结点
     *
     * 快慢指针遍历
     */
    public function findMiddleNode()
    {
        if (null == $this->list || null == $this->list->head || null == $this->list->head->next) {
            return false;
        }
        $slow = $this->list->head->next;
        $fast = $this->list->head->next;
        while ($fast != null && $fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        return $slow;

    }

}

echo "----------------单链表反转----------------------". PHP_EOL;

$list = new SingleLinkedList();
$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(4);
$list->insert(5);
$list->insert(6);
$list->insert(7);

$listAlgo = new SingleLinkedListAlgo($list);
//逆置前
$listAlgo->list->printList();

//逆置后
$listAlgo->reverse();

$listAlgo->list->printList();
echo '--------------------------------------------------------' . PHP_EOL . PHP_EOL;

echo '---------------------- 链表中环的检测 ----------------------'. PHP_EOL . PHP_EOL;
// 链表中环的检测
$listCircle = new SingleLinkedList();
$listCircle->buildHasCircleList();
$listAlgo->setList($listCircle);
var_dump($listAlgo->checkCircle());
echo '------------------------------------------------------------' . PHP_EOL . PHP_EOL;

echo '---------------------- 两个有序的链表合并 ----------------------' . PHP_EOL . PHP_EOL;
// 两个有序的链表合并
$listA = new SingleLinkedList();
$listA->insert(9);
$listA->insert(7);
$listA->insert(5);
$listA->insert(3);
$listA->insert(1);
$listA->printList();
$listB = new SingleLinkedList();
$listB->insert(10);
$listB->insert(8);
$listB->insert(6);
$listB->insert(4);
$listB->insert(2);
$listB->printList();
$listAlgoMerge = new SingleLinkedListAlgo();
$newList = $listAlgoMerge->mergeSortedList($listA, $listB);
$newList->printListSimple();
echo '----------------------------------------------------------------'. PHP_EOL . PHP_EOL;

echo '---------------------- 删除链表倒数第n个结点 ----------------------' . PHP_EOL . PHP_EOL;
// 删除链表倒数第n个结点
$listDelete = new SingleLinkedList();
$listDelete->insert(1);
$listDelete->insert(2);
$listDelete->insert(3);
$listDelete->insert(4);
$listDelete->insert(5);
$listDelete->insert(6);
$listDelete->insert(7);
$listDelete->printList();
$listAlgo->setList($listDelete);
$listAlgo->deleteLastKth(3);
var_dump($listAlgo->list->printListSimple());
echo '------------------------------------------------------------------'. PHP_EOL . PHP_EOL;


echo '---------------------- 求链表的中间结点 ----------------------' . PHP_EOL . PHP_EOL;
$listMiddle = new SingleLinkedList();
$listMiddle->insert(1);
$listMiddle->insert(2);
$listMiddle->insert(3);
$listMiddle->insert(4);
$listMiddle->insert(5);
$listMiddle->insert(6);
$listMiddle->insert(7);
$listMiddle->printList();
// 求链表的中间结点
$listAlgo->setList($listMiddle);
$middleNode = $listAlgo->findMiddleNode();
var_dump($middleNode->data);
echo '-------------------------------------------------------------'. PHP_EOL . PHP_EOL;