<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/7
 * Time: 10:36
 */
class LoopQueue
{
    private $MaxSize;
    private $data=[];
    private $head = 0;
    private $tail = 0;

    /**
     * LoopQueue constructor.
     * @param int $size
     * 循环队列需要留出一个位置来判断队满
     */
    public function __construct($size = 10)
    {
        $this->MaxSize = ++$size;
    }

    /**
     * @param $data
     * 入队
     */
    public function enQueue($data)
    {
        //判断是否队满
        if (($this->tail+1)% $this->MaxSize == $this->head){
            return -1;
        }
        $this->data[$this->tail] = $data;
        $this->tail = (++$this->tail)%$this->MaxSize;
    }

    /**
     * @return mixed|null
     * 出队
     */
    public function deQueue()
    {
        //判断是否队空
        if ($this->head==$this->tail){
            return NULL;
        }

        $data = $this->data[$this->head];
        unset($this->data[$this->head]);

        $this->head = (++$this->head)%$this->MaxSize;
        return $data;
    }

    /**
     * @return int
     * 获取长度
     */
    public function getLength()
    {
        return ($this->tail-$this->head+$this->MaxSize)%$this->MaxSize;
    }


}
echo "----------------循环队列测试----------------------". PHP_EOL;

$queue = new LoopQueue(4);
// var_dump($queue);
$queue->enQueue(1);
$queue->enQueue(2);
$queue->enQueue(3);
$queue->enQueue(4);
// $queue->enQueue(5);
var_dump($queue->getLength());
$queue->deQueue();
$queue->deQueue();
$queue->deQueue();
$queue->deQueue();
$queue->deQueue();
var_dump($queue);

echo "----------------循环队列测试----------------------". PHP_EOL;
