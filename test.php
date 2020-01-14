<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $res = [];
        if (count($nums)==0) {
            return $res;
        }
        $this->helper($nums,$res,0,[]);
        return $res;
    }

    private function helper(array $nums, array &$res, int $level, array $tmp)
    {
        //terminator
        if ($level==count($nums)) {
            array_push($res,$tmp);
            return;
        }

        $this->helper($nums,$res,$level+1,$tmp); //not pick the number
        array_push($tmp,$nums[$level]);
        $this->helper($nums,$res,$level+1,$tmp);
    }
}