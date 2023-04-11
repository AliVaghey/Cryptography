<?php


const encryption = 1;
const decryption = 0;


function seasar_shift_cypher(string $message, $k, $mode)
{
    if ($mode)
    {
        $encoded = encode_decode($message, encode);
        $cyphered = '';
        for ($i=0 ; $i < strlen($encoded) ; $i+=3) {
            $char = (int) ($encoded[$i] . $encoded[$i+1] . $encoded[$i+2]);
            $char = ($char + $k) % 256;
            $char = (string) $char;
            if(strlen($char) == 1)
                $cyphered .= '00' . $char;
            elseif(strlen($char) == 2)
                $cyphered .= '0' . $char;
            elseif(strlen($char) == 3)
                $cyphered .= $char;
        }
        return encode_decode($cyphered, decode);
    }
    else
    {
        $encoded = encode_decode($message, encode);
        $decyphered = '';
        for ($i=0 ; $i < strlen($encoded) ; $i+=3) {
            $char = (int) ($encoded[$i] . $encoded[$i+1] . $encoded[$i+2]);
            $char = ($char - $k) % 256;
            if($char < 0)
                $char = $char + 256;
            $char = (string) $char;
            if(strlen($char) == 1)
                $decyphered .= '00' . $char;
            elseif(strlen($char) == 2)
                $decyphered .= '0' . $char;
            elseif(strlen($char) == 3)
                $decyphered .= $char;
        }
        return encode_decode($decyphered, decode);
    }
}

