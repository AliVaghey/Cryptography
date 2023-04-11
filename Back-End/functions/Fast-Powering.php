<?php

function fastPower($g , $A, $n)
{
    $a = $g;
    $b = 1;
    while($A > 0) {
        if($A % 2 == 1) {
            $b = ($b * $a) % $n;
        }
        $a = ($a**2) % $n;
        $A = floor($A/2);
    }
    return $b;
}