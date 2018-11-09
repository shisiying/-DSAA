<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/5
 * Time: 22:17
 */

/**
 * 简单数组类
 */

class MyArray
{
    //数据
    private $data;
    //容量
    private $capacity;
    //长度
    private $length;

    /**
     * MyArray constructor.
     * @param $capacity
     */
    public function __construct($capacity)
    {
        $capacity = intval($capacity);

        if ($capacity<=0){
            return null;
        }

        $this->data=array();
        $this->capacity = $capacity;
        $this->length = 0;
    }

    /**
     * @return bool
     * 检查数组是否已满
     */
    public function checkFull()
    {
        if ($this->length==$this->capacity) {
            return true;
        }

        return false;

    }

    /**
     * @param $index
     * @return bool
     * 检查是否超出数组范围
     */
    public function checkOutOfRange($index)
    {
        if($index > $this->length+1){
            return true;
        }

        return false;
    }


    /**
     * @param $index
     * @param $value
     * @return int
     * 在index位置插入值value,返回0则为插入成功
     */
    public function insert($index,$value)
    {
        $index = intval($index);

        $value = intval($value);

        if ($index<0){
            return 1;
        }

        if ($this->checkFull()){
            return 2;
        }

        if($this->checkOutOfRange($index)){
            return 3;
        }

        for ($i = $this->length-1;$i>=$index;$i--){
            $this->data[$i+1] = $this->data[$i];
        }

        $this->data[$index] = $value;
        $this->length++;
        return 0;

    }

    /**
     * @param $index
     * @return array
     * 删除结点
     */
    public function delete($index)
    {
        $value = 0;

        $index = intval($index);

        if ($index<0){
            $code =1;
            return array($code,$value);
        }

        if ($index !=$this->length+1 && $this->checkOutOfRange($index)){
            $code =2;
            return array($code,$value);
        }

        $value = $this->data[$index];

        for($i=$index;$i<$this->length-1;$i++){
            $this->data[$i] = $this->data[$i+1];
        }

        $this->length--;
        return [0,$value];

    }

    /**
     * @param $index
     * @return array
     * 查找索引的值
     */
    public function find($index)
    {
        $index = intval($index);
        $value = 0;
        if ($index<0){
            $code = 1;
            return [$code,$value];
        }

        if ($this->checkOutOfRange($index)){
            $code =2;
            return array($code,$value);
        }

        return array(0,$this->data[$index]);
    }

    /**
     * 打印数组
     */
    public function printData()
    {
        $format = '';
        for($i=0;$i<$this->length;$i++){
            $format .="|".$this->data[$i];
        }
        print($format."\n");
    }

}