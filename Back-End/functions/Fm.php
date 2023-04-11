<?php


function Fm($m)
{
    $fm = [];
    for($i=0; $i<$m; $i++)
        $fm[] = $i;
    return $fm;
}

function FStar($m)
{
    $fsm = [];
    for($i=1; $i<$m; $i++)
        if(GCD($i,$m) == 1)
            $fsm[] = $i;
    return $fsm;
}

function phi($m)
{
    $phi = 1;
    for ($i=2; $i<$m ; $i++) {
        if(GCD($i,$m) == 1) {
            $phi++;
        }
    }
    return $phi;
}
