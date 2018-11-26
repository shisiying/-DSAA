<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/11/22
 * Time: 23:19
 */

/**
 * Class Node
 * 定义树的结点，链表
 */
class Node{
    private $data;
    private $left;
    private $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->right=null;
        $this->left=null;
    }
}


class BinarySearchTree
{

    private $tree;
    public function __construct($tree=null)
    {
        $this->tree = $tree;
    }

    public function find($data){
        $p = $this->tree;
        while($p!=null){
            if ($data<$p->data){
                $p =$p->left;
            }else if($data>$p->data){
                $p = $p->right;
            }else{
                return $p;
            }
        }
        return null;
    }

    /**
     * @param $data
     * 二叉查找树
     * 插入
     */
    public function insert($data){
        if ($this->tree==null){
            $this->tree = new Node($data);
            return ;
        }

        $p = $this->tree;
        while($p!=null){
            if ($data>$p->data){
                if ($p->right==null){
                    $p->right = new Node($data);
                    return;
                }
                $p = $p->right;
            }else{
                if($data<$p->data){
                    $p->left = new Node($data);
                    return ;
                }
                $p = $p->left;
            }
        }
    }

    /**
     * 查找最大值
     */
    public function findMax()
    {
        if ($this->tree==null){
            return null;
        }
        $p = $this->tree;
        while($p->right!=null){
            $p = $p->right;
        }
        return $p;
    }

    /**
     * 查找最小值
     */
    public function findMin()
    {
        if ($this->tree==null){
            return null;
        }
        $p = $this->tree;
        while($p->left!=null){
            $p = $p->left;
        }
        return $p;
    }

    /**
     * @param $data
     * 删除结点
     */
    public function delete($data)
    {
        $p = $this->tree;
        $pp = null; //要删除结点的父结点

        while($p !=null && $p->data!=$data){
            $pp = $p;
            if ($data>$p->data){
                $p = $p->right;
            }else{
                $p = $p->left;
            }
        }

        if ($p==null){
            return;
        }

        //要删除的结点有两个节点,查找右子树中最小结点
        if ($p->left!=null && $p->right!=null){
            $minP = $p->right;
            $minPP =$p;
            while ($minPP->left!=null){
                $minPP = $minP;
                $minP = $minP->left;
            }
            $p->data = $minP->data;
            $p = $minP;
            $pp = $minPP;
        }

        //删除节点是叶子节点或者仅有一个子节点
        if ($p->left!=null){
            $child = $p->left;
        }else if ($p->right!=null){
            $child = $p->right;
        }else{
            $child = null;
        }

        //删除的结点是根节点
        if ($pp==null){

            $this->tree = $child;//直接关在根节点

        }elseif ($pp->left==$p){ //如果是左结点，则挂在左结点

            $pp->left = $child;

        }else{//如果是右结点，则挂在右结点
            $pp->right = $child;
        }
    }
}