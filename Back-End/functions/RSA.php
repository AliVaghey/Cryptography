<?php


function RSA($p, $q, $e, $text)
{
    $N = $q*$p;
    if(GCD($e , ($p-1)*($q-1)) != 1)
        return 'gcd(e,p) != 1';
    $m = encode_decode($text, encode);
    
    $c = [];
    for($i=0 ; $i<strlen($m) ; $i+=3) {
        $char = (int) ($m[$i] . $m[$i+1] . $m[$i+2]);
        $c[] = fastPower($char, $e , $N);
    }

    $deciphered = '';
    $d = inverse($e, ($p-1)*($q-1));
    foreach($c as $x) {
        $char = fastPower($x, $d, $N);
        if(strlen($char) == 1)
            $char = '00' . $char;
        elseif(strlen($char) == 2)
            $char = '0' . $char;
        elseif(strlen($char) == 3)
            $char = $char;
        $deciphered .= $char;
    }
    $decipheredN = encode_decode($deciphered, decode);

    return [
        'N' => $N,
        'c' => $c,
        'deciphered text'   => $deciphered,
        'deciphered number' => $decipheredN
    ];
}