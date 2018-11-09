<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/5
 * Time: 22:57
 */

/**
 * Class SingleLinkedListNode
 * 单链表结点
 */
class SingleLinkedListNode{
    //节点中的数据域
    public $data;

    //结点中的指针域
    public $next;

    //初始化结点
    public function __construct($data =null)
    {
        $this->data = $data;
        $this->next = null;
    }
}
/**
 * Class SingleLinkedList
 * 有头结点的单链表
 */
class SingleLinkedList
{
    public $head;

    private $length;


    /**
     * SingleLinkedList constructor.
     * @param null $head
     * 初始化单链表
     */
    public function __construct($head=null)
    {
        if($head==null){
            $this->head = new SingleLinkedListNode();
        }else{
            $this->head = $head;
        }

        $this->length = 0;
    }

    /**
     * @return mixed
     * 获取链表长度
     */
    public function getLength(){
        return $this->length;
    }

    /**
     * @param $data
     * @return bool|SingleLinkedListNode
     * 插入数据
     */
    public function insert($data){
        return $this->insertDataAfter($this->head,$data);
    }

    /**
     * @param SingleLinkedListNode $node
     * @return bool
     * 删除结点
     */
    public function delete(SingleLinkedListNode $node)
    {
        if ($node=null){
            return false;
        }

        //获取带杀出结点的前置结点
        $preNode = $this->getPreNode($node);

        $preNode->next = $node->next;
        unset($node);

        $this->length--;
        return true;
    }

    /**
     * @param $index
     * @return null
     * 通过索引来获取结点
     */
    public function getNodeByIndex($index)
    {
        if ($index >=$this->length){
            return null;
        }

        $cur = $this->head->next;
        for ($i=0;$i<$index;++$i){
            $cur = $cur->next;
        }

        return $cur;
    }


    /**
     * @return bool
     * 打印单链表
     */
    public function printList()
    {
        if ($this->head->next==null){
            return false;
        }

        $curNode =$this->head;

        $listLength = $this->getLength();

        while($curNode->next!=null && $listLength--){
            echo $curNode->next->data.'->';
            $curNode = $curNode->next;
        }

        echo 'NULL'.PHP_EOL;

        return true;
    }


    /**
     * @param SingleLinkedListNode $originNode
     * @param $data
     * @return bool|SingleLinkedListNode
     * 在某个结点前插入结点
     */
    public function insertDataBefore(SingleLinkedListNode $originNode, $data)
    {
        if ($originNode==null){
            return false;
        }

        $preNode = $this->getPreNode($originNode);

        return $this->insertDataAfter($preNode,$data);
    }

    public function insertNodeAfter(SingleLinkedListNode $originNode, SingleLinkedListNode $node)
    {
        if ($originNode==null){
            return false;
        }

        $node->next = $originNode->next;
        $originNode->next = $node;

        $this->length++;

        return $node;

    }


    /**
     * @param SingleLinkedListNode $originNode
     * @param $data
     * @return bool|SingleLinkedListNode
     * 头插法
     */
    public function insertDataAfter(SingleLinkedListNode $originNode,$data){
        if ($originNode ==null){
            return false;
        }

        $newNode = new SingleLinkedListNode();

        $newNode->data = $data;

        $newNode->next = $originNode->next;
        $originNode->next = $newNode;

        $this->length++;

        return $newNode;
    }

    /**
     * @param SingleLinkedListNode $node
     * @return bool|null
     * 获取前置节点
     */
    public function getPreNode(SingleLinkedListNode $node)
    {
        if ($node = null){
            return false;
        }

        $curNode = $this->head;
        $preNode = $this->head;

        while($curNode!==$node && $curNode!=null){
            $preNode = $curNode;
            $curNode = $curNode->next;
        }

        return $preNode;

    }

    /**
     * 构造一个有环的链表
     */
    public function buildHasCircleList()
    {
        $data = [1, 2, 3, 4, 5, 6, 7, 8];
        $node0 = new SingleLinkedListNode($data[0]);
        $node1 = new SingleLinkedListNode($data[1]);
        $node2 = new SingleLinkedListNode($data[2]);
        $node3 = new SingleLinkedListNode($data[3]);
        $node4 = new SingleLinkedListNode($data[4]);
        $node5 = new SingleLinkedListNode($data[5]);
        $node6 = new SingleLinkedListNode($data[6]);
        $node7 = new SingleLinkedListNode($data[7]);
        $this->insertNodeAfter($this->head, $node0);
        $this->insertNodeAfter($node0, $node1);
        $this->insertNodeAfter($node1, $node2);
        $this->insertNodeAfter($node2, $node3);
        $this->insertNodeAfter($node3, $node4);
        $this->insertNodeAfter($node4, $node5);
        $this->insertNodeAfter($node5, $node6);
        $this->insertNodeAfter($node6, $node7);
        $node7->next = $node4;
    }

    /**
     * 输出单链表 当data的数据为可输出类型
     *
     * @return bool
     */
    public function printListSimple()
    {
        if (null == $this->head->next) {
            return false;
        }
        $curNode = $this->head;
        while ($curNode->next != null) {
            echo $curNode->next->data . ' -> ';
            $curNode = $curNode->next;
        }
        echo 'NULL' . PHP_EOL;
        return true;
    }
}