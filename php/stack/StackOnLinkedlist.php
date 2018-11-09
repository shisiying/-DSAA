<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/6
 * Time: 22:57
 */
require __DIR__."/../linkedlist/SingleLinkedList.php";

class StackOnLinkedlist{

    //头指针
    public $head;

    //栈长度
    public $length;

    /**
     * StackOnLinkedlist constructor.
     * 栈初始化
     */
    public function __construct()
    {
        $this->head = new SingleLinkedListNode();
        $this->length=0;
    }

    /**
     * @return bool
     * 出栈
     */
    public function pop()
    {
        if ($this->length==0){
            return false;
        }

        $this->head->next = $this->head->next->next;
        $this->length--;

        return true;
    }

    /**
     * @param $data
     * @return bool|SingleLinkedListNode
     * 入栈
     */
    public function push($data)
    {
        $node = new SingleLinkedListNode($data);
        if ($node==null){
            return false;
        }

        $node->next = $this->head->next;
        $this->head->next = $node;

        $this->length++;
        return $node;
    }

    /**
     * @return bool|null
     * 获取栈顶元素
     */
    public function top()
    {
        if ($this->length==0){
            return false;
        }

        return $this->head->next;
    }

    /**
     * 打印栈
     */
    public function printSelf()
    {
        if ($this->length==0){
            echo 'empty stack'.PHP_EOL;
            return;
        }

        echo 'head.next -> ';
        $curNode = $this->head;
        while($curNode->next){
            echo $curNode->next->data.'->';
            $curNode = $curNode->next;
        }
        echo 'NULL'.PHP_EOL;
    }

    /**
     * @return int
     * 获取栈长度
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return bool
     * 判断是否为空
     */
    public function isEmpty()
    {
        return $this->length > 0 ? false:true;
    }
}

echo "----------------栈测试----------------------". PHP_EOL;
$stack = new StackOnLinkedlist();
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
var_dump($stack->getLength());
$stack->printSelf();

$topNode = $stack->top();
var_dump($topNode->data);

$stack->pop();
$stack->printSelf();
$stack->pop();
$stack->printSelf();

var_dump($stack->getLength());
$stack->pop();
$stack->pop();
$stack->printSelf();
echo "----------------栈测试----------------------". PHP_EOL;
