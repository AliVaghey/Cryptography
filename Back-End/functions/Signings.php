<?php

function RSA_sign($p, $q, $e, $D)
{
    $N = $q * $p;
    if(GCD($e , ($p-1)*($q-1)) != 1)
        return 'gcd(e,p) != 1';
    $d = inverse($e, ($p-1)*($q-1));
    $S = fastPower($D, $d, $N);
    $Sp= fastPower($S,$e, $N);
    return [
        'N' => $N,
        'D' => $D,
        'S' => $S,
        "S'"=> $Sp
    ];
}

function Elgamal_sign($p , $g , $a, $D)
{
    $A = fastPower($g, $a, $p);
    $k = rand(2, $p-1);
    while(GCD($k, $p-1) != 1) {
        $k = rand(2, $p-1);
    }
    $S1 = fastPower($g , $k, $p);
    $d = inverse($k, $p-1);
    $S2 = ($D - $a * $S1)%($p-1);
    if($S2<0)
        $S2 += $p-1;
    $S2 = ($S2 * $d) % ($p-1);

    $X = fastPower($A, $S1, $p) * fastPower($S1, $S2, $p);
    $X = $X % $p;

    $gD = fastPower($g, $D, $p);

    return [
        'A'     => $A,
        'g^D'   => $gD,
        'S1'    => $S1,
        'S2'    => $S2,
        'A^S1*S2^S1' => $X
    ];
}