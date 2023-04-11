<?php


function Diffie_Hellman($p, $g, $a, $b)
{
//Alice :
    $A = fastPower($g, $a, $p);

//Bob :
    $B = fastPower($g, $b, $p);

//Alice :
    $AK = fastPower($B, $a, $p);

//Bob :
    $BK = fastPower($A, $b, $p);

    return [$AK, $BK];
}