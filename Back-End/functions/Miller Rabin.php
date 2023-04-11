<?php


function miller_robin($n, $a)
{
    if($n%2 == 0 || GCD($a, $n) != 1)
        return true;

    $k = $q = 0;
    $q = $n-1;
    while($q%2 == 0) {
        $q /= 2;
        $k++;
    }
    $a = fastPower($a, $q, $n);
    if($a == 1 || $a == $n-1)
        return false;
    for($i=0; $i<$k; $i++) {
        $a = fastPower($a , 2, $n);
        if($a == $n-1)
            return false;
    }
    return true;
}

function prime_test($n)
{
    $p = ceil(($n-1) * 0.25);
    $f = false;
    $c = 0;
    $a = 2;
    while (!$f && $c<$p) {
        $c++;
        $f = miller_robin($n, $a);
        $a++;
    }
    return ($f) ? false : true;
}