<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/7
 * Time: 10:19
 */
require __DIR__."/../linkedlist/SingleLinkedList.php";

class QueueOnLinkedList
{
    //队头结点
    public $head;

    //队尾结点
    public $tail;

    //队列长度
    public $length;

    //初始化队列
    public function __construct()
    {
        $this->head = new SingleLinkedListNode();
        $this->tail = $this->head;
        $this->length = 0;
    }

    /**
     * @param $data
     * 入队
     */
    public function enqueue($data)
    {
        $newNode = new SingleLinkedListNode();
        $newNode->data = $data;
        $this->tail->next = $newNode;
        $this->tail = $newNode;
        $this->length++;
    }

    /**
     * @return bool|null
     * 出队
     */
    public function dequeue()
    {
        if (0 == $this->length) {
            return false;
        }
        $node = $this->head->next;
        $this->head->next = $this->head->next->next;
        $this->length--;
        return $node;
    }

    /**
     * @return int
     * 获取队列长度
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * 打印队列
     */
    public function printSelf()
    {
        if (0 == $this->length) {
            echo 'empty queue' . PHP_EOL;
            return;
        }
        echo 'head.next -> ';
        $curNode = $this->head;
        while ($curNode->next) {
            echo $curNode->next->data . ' -> ';
            $curNode = $curNode->next;
        }
        echo 'NULL' . PHP_EOL;
    }


}
echo "----------------队列测试----------------------". PHP_EOL;

$queue = new QueueOnLinkedList();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
$queue->enqueue(4);
$queue->enqueue(5);
$queue->printSelf();
var_dump($queue->getLength());
$queue->dequeue();
$queue->printSelf();
$queue->dequeue();
$queue->dequeue();
$queue->dequeue();
$queue->printSelf();
$queue->dequeue();
$queue->printSelf();
echo "----------------队列测试----------------------". PHP_EOL;
