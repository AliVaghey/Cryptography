<?php


function primitiveRoots($m)
{
    $fs = [];
    $primitiveRoots = [];
    foreach(fStar($m) as $x)
        $fs[$x] = 1;
    
    foreach($fs as $i => $b) {
        $temp = $fs;
        $f = true;
        for($y=1; $y<count($fs) && $f==true ; $y++) {
            $k = fastPower($i, $y, $m);
            if(array_key_exists($k , $temp))
                unset($temp[$k]);
            else
                $f = false;
        }
        if($f)
            $primitiveRoots[] = $i;
    }
    return $primitiveRoots;
}


function PrRoTest($g, $m) 
{ 
    foreach(fStar($m) as $x) {
        $fs[$x] = 1;
    }

    if(!array_key_exists($g, $fs))
        return "g dosn't exist in Fstar!";

    $f = true;
    $copy = $fs;
    for($y=1; $y<count($fs) && $f==true ; $y++) {
        $k = fastPower($g, $y, $m);
        if(array_key_exists($k ,$copy)) {
            unset($copy[$k]);
        } else {
            $f = false;
        }
    }
    return $f;
}
