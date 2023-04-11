<?php

function Elgamal($p, $g, $a, $text)
{
    $m = encode_decode($text, encode);
    
    $A = fastPower($g, $a, $p);

    $k = rand(10, $p-1);

    $c1 = fastPower($g, $k, $p);
    $c2 = '';
    
    for($i=0 ; $i<strlen($m) ; $i= $i + 3) {
        $char = (int) ($m[$i] . $m[$i+1] . $m[$i+2]);
        $char = ($char * fastPower($A, $k , $p)) % $p;
        if(strlen($char) == 1)
            $c2 .= '00' . $char;
        elseif(strlen($char) == 2)
            $c2 .= '0' . $char;
        elseif(strlen($char) == 3)
            $c2 .= $char;
    }
    
    $decyphered = '';
    $x = fastPower($c1, ($p-$a-1) , $p);
    for($i=0 ; $i<strlen($c2) ; $i+=3) {
        $char = (int) ($c2[$i] . $c2[$i+1] . $c2[$i+2]);
        $char = (string) (($char*$x) % $p);
        if(strlen($char) == 1)
            $char = '00' . $char;
        elseif(strlen($char) == 2)
            $char = '0' . $char;
        elseif(strlen($char) == 3)
            $char = $char;
        $decyphered .= $char;
    }

    $decyphered = encode_decode($decyphered, decode);

    return [
        'c1' => $c1,
        'c2' => $c2,
        'decyphered text' => $decyphered
    ];
}