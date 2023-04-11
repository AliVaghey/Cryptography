<?php

function inverse($a , $m)
{
    if(GCD($a, $m) != 1) {
        return false;
    }

    $i = eucli_algo($a, $m, $a, $m);
    $inverse = $i['u'];

    if($inverse < 0) {
        $inverse += $m;
    }

    return $inverse;
}
