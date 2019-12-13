<?php
class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        $un = (float) $n;
        if($n<0){
            $x = 1/$x;
            $un = -$un;
        }
        return $this->fastPow($x,$un);
    }

    function fastPow($x,$n){
        if($n == 0) return 1.0;
        $half = $this->fastPow($x,floor($n/2));
        if(fmod($n,2)==0){
            return $half*$half;
        }else{
            return $half*$half*$x;
        }
    }
}

