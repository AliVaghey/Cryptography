<?php

function Bforce($g, $h, $p)
{
    $x = -1;
    for($i=1; $i<$p; $i++){
        if(fastPower($g, $i, $p) == $h) {
            return $i;
        }
    }
}